<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Create a new Part</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<link rel="stylesheet" type="text/css" href="normalize.css" />
		<link rel="stylesheet" type="text/css" href="myCss.css" />
		<link rel="stylesheet" type="text/css" href="livevalidation.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
		<script type="text/javascript" src="javascript/livevalidation.js"></script>
		
		<script type="text/javascript">
		$(document).ready(function(){
				$('#fieldList').hide();
			    $('#dateInput').hide();
				
				$('#radioSpec').click(function(){
					$('#fieldList').slideDown('slow');
				});
				
				$('#radioAll').click(function(){
					$('#fieldList').slideUp('slow');
				});
				
				$('#useDate').click(function(){
					$('#dateInput').slideToggle('slow');
				});
		});
		
		</script>
	</head>
	
	<body>
		<div id="container">
				<div id="menu">
							<ul id="menuList">
								<li><a href="create.php">Create Table</a></li>
								<li><a href="search.php">Run Search</a></li>
							</ul>
					</div>
		<h1>Light Lab Data Query</h1>
		
		<div id="inForm">
			<form method="POST" action="query.php">
			  <!-- These are inputs for the Part Number AND/OR Serial Number  -->
				<div id="textInput">
							<label>
							<span>ATP/ATR #</span>
							<input id="atpInput" type="text" name="atpInput" >
							<script type="text/javascript">
							var atpNum = new LiveValidation('atpInput', { validMessage: "Valid"});
							atpNum.add(Validate.Presence,  { failureMessage: "*Required field"});
							atpNum.add(Validate.Length, { minimum: 10});
							
							</script>
							</label>
							
							<label>
							<span>Part #</span>
							<input type="text" name="partInput" >
							</label>
							
							<label>
							<span>Serial #</span>
							<input type="text" name="serialInput" >
							</label>
				</div>
				
				<div id="dateInput">
							<label>
							<span>From:&nbsp;</span>
							<select name="fmonth">
							<option value="0">Month</option>
							<option value="01">Jan</option>
							<option value="02">Feb</option>
							<option value="03">Mar</option>
							<option value="04">Apr</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">Aug</option>
							<option value="09">Sept</option>
							<option value="10">Oct</option>
							<option value="11">Nov</option>
							<option value="12">Dec</option>
							</select>
							
							<select name="fday">
							<option value="0">Day</option>
							<option value="01">1</option>
							<option value="02">2</option>
							<option value="03">3</option>
							<option value="04">4</option>
							<option value="05">5</option>
							<option value="06">6</option>
							<option value="07">7</option>
							<option value="08">8</option>
							<option value="09">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
							</select>
							
							<select name="fyear">
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							</select>
							</label>
							
							<label>
							<span>To: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
							<select name="tmonth">
							<option value="0">Month</option>
							<option value="01">Jan</option>
							<option value="02">Feb</option>
							<option value="03">Mar</option>
							<option value="04">Apr</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">Aug</option>
							<option value="09">Sept</option>
							<option value="10">Oct</option>
							<option value="11">Nov</option>
							<option value="12">Dec</option>
							</select>
							
							<select name="tday">
							<option value="0">Day</option>
							<option value="01">1</option>
							<option value="02">2</option>
							<option value="03">3</option>
							<option value="04">4</option>
							<option value="05">5</option>
							<option value="06">6</option>
							<option value="07">7</option>
							<option value="08">8</option>
							<option value="09">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
							</select>
							
							<select name="tyear">
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							</select>
							</label>
				</div>
				
			
				<label>
				<span>Search Type: </span>
				</label>
				<input type="radio" id="radioAll" name="searchType" value="all" checked="checked">&nbsp; All &nbsp;
				<input type="radio" id="radioSpec" name="searchType" value="specific"> &nbsp;Specific Fields&nbsp;&nbsp;
				<input type="checkbox" id="useDate" name="useDate" value="useDate"> &nbsp;By Date
			
				<!-- List of all fields for individual selection -->
				<div id="fieldList">
					<table class="searchTable">
						<!-- Brightness specs -->
				<tr>
					<td><h3>Brightness: </h3></td>
					<td><input type="checkbox" name="data[]" value="pnlHiWhere"> PNL High Where</td>
					<td><input type="checkbox" name="data[]" value="pnlHiR1"> R1 High</td>
					<td><input type="checkbox" name="data[]" value="pnlHiR2"> R2 High</td>
					<td><input type="checkbox" name="data[]" value="pnlHiR3"> R3 High</td>
					<td><input type="checkbox" name="data[]" value="pnlHiAvg"> Avg High</td>
					<td><input type="checkbox" name="data[]" value="pnlHiVolt"> Voltage High</td>
					<td><input type="checkbox" name="data[]" value="pnlHiLowLim"> High fL. Low Limit</td>
					<td><input type="checkbox" name="data[]" value="pnlHiHighLim"> High fL. High Limit</td>
				</tr>
				
				<tr>
					<td></td>
					<td><input type="checkbox" name="data[]" value="pnlLoWhere"> PNL Low Where</td>
					<td><input type="checkbox" name="data[]" value="pnlLoR1"> R1 Low</td>
					<td><input type="checkbox" name="data[]" value="pnlLoR2"> R2 Low</td>
					<td><input type="checkbox" name="data[]" value="pnlLoR3"> R3 Low</td>
					<td><input type="checkbox" name="data[]" value="pnlLoAvg"> Avg Low</td>
					<td><input type="checkbox" name="data[]" value="pnlLoVolt"> Voltage Low</td>
					<td><input type="checkbox" name="data[]" value="pnlLoLowLim"> Low fL. Low Limit</td>
					<td><input type="checkbox" name="data[]" value="pnlLoHighLim"> Low fL. High Limit</td>
				</tr>
				<!-- Additional requirements for brightness -->
				<tr>
					<td>Add. Requirements</td>
					<td><input type="checkbox" name="data[]" value="grnBandWhere"> Grn Bands Where</td>
					<td><input type="checkbox" name="data[]" value="grnBandR1"> Grn Band R1</td>
					<td><input type="checkbox" name="data[]" value="grnBandVolt"> Grn Band Voltage</td>
					<td><input type="checkbox" name="data[]" value="grnBandLowLim"> Grn fL. Low Limit</td>
				</tr>
				
				<tr>
					<td></td>
					<td><input type="checkbox" name="data[]" value="flowWhere"> Flowline Where</td>
				</tr>
				
				<tr><td  style="padding:15px;"></td></tr>
				<!-- Contrast Specs -->
				<tr>
					<td><h3>Contrast: </h3></td>
					<td><input type="checkbox" name="data[]" value="conWhere"> Where tested</td>
					<td><input type="checkbox" name="data[]" value="legendR1"> Legend R1</td>
					<td><input type="checkbox" name="data[]" value="legendR2"> Legend R2</td>
					<td><input type="checkbox" name="data[]" value="legendR3"> Legend R3</td>
					<td><input type="checkbox" name="data[]" value="bgR1"> Background R1</td>
					<td><input type="checkbox" name="data[]" value="bgR2"> Background R2</td>
					<td><input type="checkbox" name="data[]" value="bgR3"> Background R3</td>
					<td><input type="checkbox" name="data[]" value="contrast"> Contrast</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="checkbox" name="data[]" value="conReq"> Contrast Req.</td>
				</tr>
				
				<tr><td  style="padding:15px;"></td></tr>
				<!-- Chromaticity Specs -->
				<tr>
					<td><h3>Chromaticity: </h3></td>
					<td><input type="checkbox" name="data[]" value="colorWhere"> Where tested</td>
					<td><input type="checkbox" name="data[]" value="colorX"> Color X-cord</td>
					<td><input type="checkbox" name="data[]" value="colorY"> Color Y-cord</td>
					
				</tr>
				
			   </table>
				</div>
				
				<hr>
				
		
			   <!-- This is the submit button for the form -->
				
				<input class="btn" type="submit" name="submit" value="Submit">
				
				
				
				
			</form>
		</div>
		</div>
		
		
	</body>
</html>