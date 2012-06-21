<?php

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
		
		
		if(isset($_POST['submit']))
		{
			
			$partNumber = $_POST['partInput'];
			$serialNumber = $_POST['serialInput'];
			$atpNumber = $_POST['atpInput'];
			
			if(!empty($_POST['useDate'])) //If the By Date Checkbox is checked
			{
			//Format from date
			$useDate = true;
			$fromDate = $_POST['fyear'] . "-" . $_POST['fmonth'] . "-" . $_POST['fday'];
			$toDate = $_POST['tyear'] . "-" . $_POST['tmonth'] . "-" . $_POST['tday'];
			}

							if($_POST['searchType'] == "specific")//Show specific rows from all tables
							{
								$checkboxes = $_POST['data'];//Used for extracting checkbox names
								
								print_r ($checkboxes);
								$availableFields = mysql_query("SHOW COLUMNS FROM `$atpNumber`");//Get the rows of all the fields
							
												$i = 0;
												$fields = array();
												while($fieldRow = mysql_fetch_array($availableFields))//Place all fields in an array
												{
													$fields[$i] = $fieldRow[0];
													$i++;
												}
											
													$current = 0;
													foreach ($checkboxes as $check)//Nested loop to check for fields
													{
															$found = false;
															foreach ($fields as $field)
															{
																if(strcmp(strtolower($check), strtolower($field)) == 0)
																{
																	$found = true;
																}
															}
															if($found == false)
															{
																//The field was not found, throw error
																echo "<h3>ERROR, the ".$check." field could not found</h3><br />";
																unset($checkboxes[$current]);//Unset the element so the query still works
															}
															$current++;
													}
													
													$checkboxes = implode(",", $checkboxes);
													
													
									if($serialNumber == "" && $partNumber == "")	//Run search along all tables
										{		
											$query = "SELECT $checkboxes FROM `$atpNumber`";
										}else if($serialNumber == "")//Run search on IDD Part Number
										{
											$query = "SELECT $checkboxes FROM `$atpNumber` WHERE iddPN = '$partNumber'";
										}else if($partNumber == "")//Run search on Serial Number
										{
											$query = "SELECT $checkboxes FROM `$atpNumber` WHERE serialNum = '$serialNumber'";
										}else{ // Run search on particular Part and Serial Number
											$query = "SELECT $checkboxes FROM `$atpNumber` WHERE iddPN = '$partNumber' AND serialNum = '$serialNumber'";
										}
							
							}else{ // Search all fields
							
										if($serialNumber == "" && $partNumber == "")	//Run search along all tables
										{		
											$query = "SELECT * FROM `$atpNumber`";
										}else if($serialNumber == "")//Run search on IDD Part Number
										{
											$query = "SELECT * FROM `$atpNumber` WHERE iddPN = '$partNumber'";
										}else if($partNumber == "") //Run search on Serial Number
										{
											$query = "SELECT * FROM `$atpNumber` WHERE serialNum = '$serialNumber'";
										}else{ // Run search on particular Part and Serial Number
											$query = "SELECT * FROM `$atpNumber` WHERE iddPN = '$partNumber' AND serialNum = '$serialNumber'";
										}
							
					
							}
					if($useDate == true)
					{
						if(strpos($query, "WHERE") == false)
						{
							$query .= " WHERE testDate BETWEEN '$fromDate' AND '$toDate'";
						}else{
							$query .= " AND testDate BETWEEN '$fromDate' AND '$toDate'";
						}
					}
					echo "<h4 style=\"text-decoration:none;\">Query: ".$query."</h4>";
					$result = mysql_query($query);
		
		
		
?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Search Results</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<link rel="stylesheet" type="text/css" href="normalize.css" />
		<link rel="stylesheet" type="text/css" href="query.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
		
		<script type="text/javascript">
		
		</script>
	</head>
	
	<body>
	
		<div id="container">
				<!-- Query results returned here -->
				<?php
							if($result && mysql_num_rows($result) > 0)
						{
							echo "<table id=\"dataTable\" >";
							
							echo "<tr>";
							$count = 0;
							$num = mysql_num_fields($result);
							while($count < $num)
							{
								$name = mysql_field_name($result, $count);
								echo "<th>".$name."</th>";
								$count++;
							}
							echo "</tr>";
							$numRows = 0;
							while($row = mysql_fetch_array($result))
							{
								
								$count=0;
								$isAlt = ($numRows % 2 == 0 ? true : false);//Used to find alternating rows for color scheme
								if($isAlt == true)
								{
								echo "<tr class=\"alt\">";
								}else{
								echo "<tr>";
								}
								while($count < $num)
								{
									echo "<td>". $row[$count] ."</td>";
									$count++;
								}
								echo "</tr>";
								$numRows++;
							}
							echo "</table>";
						}else{
							echo "<h2>No results found...</h2>";
						}
					}else{
					echo "<h1>Please re-submit form</h1>";
					}
				?>
		</div>
		
		
	</body>
</html>