<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Create a new ATP Table</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<link rel="stylesheet" type="text/css" href="normalize.css" />
		<link rel="stylesheet" type="text/css" href="myCss.css" />
		<link rel="stylesheet" type="text/css" href="livevalidation.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
		<script type="text/javascript" src="javascript/livevalidation.js"></script>
		
		<script type="text/javascript">
		var hasColor = false;
		$(document).ready(function(){
				
				$('#brightcon').hide();
				$('#colorcon').hide();
				$('#contrastcon').hide();
				$('#knobcon').hide();
				
				$('#bright').click(function(){
					$('#brightcon').slideToggle('slow');
				});
				$('#color').click(function(){
					$('#colorcon').slideToggle('slow');
				});
				$('#contrast').click(function(){
					$('#contrastcon').slideToggle('slow');
				});
				$('#knob').click(function(){
					$('#knobcon').slideToggle('slow');
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
		
		<h1>Light Lab Table Creation</h1>
		
		<div id="inForm">
			<form method="POST" action="results.php">
			  <!-- These are inputs for the ATP and Part Number -->
				<label>
				<span>&nbsp;ATP #</span>
				<input id="atpInput" type="text" name="atpInput" >
				<script type="text/javascript">
				var atpNum = new LiveValidation('atpInput', { validMessage: "Valid"});
				atpNum.add(Validate.Presence,  { failureMessage: "*Required field"});
				</script>
				</label>
							
				<hr>
				
			   <!-- These are the checkboxes for the attributes -->
			   <table class="formTable">
				<tr>
					<td><input type="checkbox"  id='bright' name="brightness" value="brightness"> Brightness/Luminance</td>
					<td><input type="checkbox" id='color' name="color" value="color"> Cromaticity/Color</td>
					<td><input type="checkbox" id='contrast' name="contrast" value="contrast"> Contrast</td>
					<td><input type="checkbox" id='knob' name="knob" value="knob"> Knob Lighting</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="req" value="Requirement"> Something else</td>
					<td><input type="checkbox" name="req" value="Requirement"> Different</td>
					<td><input type="checkbox" name="req" value="Requirement"> More reqs</td>
					<td><input type="checkbox" name="req" value="Requirement"> Something else</td>
				</tr>
				
			   </table>
			   
			   <!-- These are the div containers that hold the additional requirements -->
			   <div id="brightcon">
						<fieldset>
						<legend><strong>Add. Requirements</strong></legend>
						<table class="conTable">
							<tr>
								<td><input type="radio" name="voltage" > 5 Volts</td>
								<td><input type="radio" name="voltage" > 3.2 Volts</td>
							<tr>
							<tr>
								<td><input type="checkbox" name="greenyellow" > Green/Yellow </td>
								<td><input type="checkbox" name="flowline" > Flowline Deviation </td>
								<td><input type="checkbox" name="greenband" > Green Band Areas </td>
						</table>
						</fieldset>
			   </div>
			   <div id="colorcon">
							<fieldset>
						<legend><strong>Add. Requirements</strong></legend>
						<table class="conTable">
							<tr>
								<td><input type="radio" id="device" name="device" value="spectro"> Spectroradiometer</td>
								<td><input type="radio" name="device" value="photo"> Photometer</td>
								<span style="color:red;">* Required</span>
							<tr>
						</table>
						</fieldset>
			   </div>
			   <div id="contrastcon">
							<fieldset>
						<legend><strong>Add. Requirements</strong></legend>
						<table class="conTable">
							<tr>
								<td><input type="checkbox" name="8kfc" > 8KFC @ 45 </td>
								<td><input type="checkbox" name="50kfc" > 50KFC @ 45</td>
							<tr>
						</table>
						</fieldset>
			   </div>
			   <div id="knobcon">
							<fieldset>
						<legend><strong>Add. Requirements</strong></legend>
						<table class="conTable">
							<tr>
								<td><input type="checkbox" name="device" > Deviation Contrast</td>
								<td><input type="checkbox" name="device" > </td>
							<tr>
						</table>
						</fieldset>
			   </div>
			   
			   <!-- This is the submit button for the form -->
			
				<input class="btn" type="submit" name="submit" value="Submit">
				
				
				
				
			</form>
		</div>
		</div>
		
		
	</body>
</html>