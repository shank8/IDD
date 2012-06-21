<!DOCTYPE html>
<?php
		
		$atpNumber = $_POST['atpInput'];
		
		$connection = mysql_connect("localhost", "root", ""); //Get connection to SQL server
		if(!$connection)
		{
			die("Cannot connect " . mysql_error());
		}
		
		$db = mysql_select_db('test', $connection); //Get connection to Database
		if(!$db)
		{
			die("Cannot connect to database " . mysql_error());
		}
		
		$query = " CREATE TABLE IF NOT EXISTS `$atpNumber` ( serialNum VARCHAR(45) NOT NULL,custName VARCHAR(45) NOT NULL,custPN VARCHAR(45) NOT NULL,iddPN VARCHAR(45) NOT NULL,opID VARCHAR(45) NOT NULL,".
							"testDate VARCHAR(45) NOT NULL,snRange VARCHAR(64) NOT NULL,workOrd VARCHAR(45) NOT NULL,lightLab VARCHAR(45) NOT NULL, ";
		$insert = "(serialNum, custName, custPN, iddPN, opID, testDate, snRange, workOrd, lightLab";
//Now the hard part. Determine input of form and develop sql query based on results

if(isset($_POST['submit']))
{
		//Check what main requirements are checked
		
		//Check for brightness req
		if(!empty($_POST['brightness']))
		{
				$query .= "pnlHiWhere VARCHAR(45), pnlHiR1 VARCHAR (10), pnlHiR2 VARCHAR (10), pnlHiR3 VARCHAR(10), pnlHiAvg VARCHAR(10), pnlHiVolt VARCHAR(10), pnlHiLowLim VARCHAR(10), pnlHiHighLim VARCHAR (10), ".
									"pnlLoWhere VARCHAR(45), pnlLoR1 VARCHAR (10), pnlLoR2 VARCHAR (10), pnlLoR3 VARCHAR(10), pnlLoAvg VARCHAR(10), pnlLoVolt VARCHAR(10), pnlLoLowLim VARCHAR(10), pnlLoHighLim VARCHAR (10),";
									
				$insert .=  ",pnlHiWhere, pnlHiR1, pnlHiR2, pnlHiR3, pnlHiAvg, pnlHiVolt, pnlHiLowLim, pnlHiHighLim, pnlLoWhere, pnlLoR1, pnlLoR2, pnlLoR3, pnlLoAvg, pnlLoVolt, pnlLoLowLim, pnlLoHighLim";
				//Check for greenband req
				if(!empty($_POST['greenband']))
				{
						$query .= "grnBandWhere VARCHAR(10), grnBandR1 VARCHAR(10), grnBandVolt VARCHAR(10), grnBandLowLim VARCHAR(10),";
						$insert .= ",grnBandWhere, grnBandR1, grnBandVolt, grnBandLowLim";
				}
		}
		
		//Check for contrast req
		if(!empty($_POST['contrast']))
		{
				$query .= "conWhere VARCHAR(45), legendR1 VARCHAR(10), legendR2 VARCHAR(10), legendR3 VARCHAR(10), legendAvg VARCHAR(10), bgR1 VARCHAR(10), bgR2 VARCHAR(10), bgR3 VARCHAR(10),".
									"bgAvg VARCHAR(10), contrast VARCHAR(45), conReq VARCHAR(10), ";
				$insert .=", conWhere, legendR1, legendR2, legendR3, legendAvg, bgR1, bgR2, bgR3, bgAvg, contrast, conReq";
		}
		
		//Check for cromaticity req
		if(!empty($_POST['color']))
		{
				//Check what device was used
				if($_POST['device'] == 'spectro')
				{
				$query .= "colorWhere VARCHAR(45), colorX VARCHAR(10), colorY VARCHAR(10), ";
				$insert .=",colorWhere, colorX, colorY";
				}else{
				
				}
		}
		
		
		
		
		
		//When all reqs have been met, end the query with a PK
		$query .= "CONSTRAINT serialPK PRIMARY KEY (serialNum) );";
		$insert .=") ";
		
	
		$result = mysql_query($query);
		
?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Create a new Part</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<link rel="stylesheet" type="text/css" href="normalize.css" />
		<link rel="stylesheet" type="text/css" href="myCss.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
		
		<script type="text/javascript">
		
		</script>
	</head>
	
	<body>
		<div id="container">
				<!-- Query results returned here -->
				<h2>Results:</h2>
				<span>Query: </span><br />
				<p><?php echo $query."<br /><br /> Insert string: ".$insert; ?><p>
		</div>
		
		
	</body>
</html>

<?php

}else{
echo "<h1>The form was not submitted..Please try again</h1>";
}

mysql_close($connection);
?>