<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      crossorigin="anonymous"
    />
	<link rel="stylesheet" href="/styles.css?v=<?php echo time(); ?>">
</head>
<body>
	<?php
	include 'connectdb.php';
	?>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
	<br>
	<div class="container">
        <div class="row">
            <div class="col text-center">
			<b>Enter patient details below to add patient to database.</b>
			<br>
			<br>
			<form action="addPatientDB.php" method="post">
			<label for="dob">DOB (yyyy-mm-dd):</label><br>
			<input type="text" id="dob" name="dob"><br><br>
			<label for="ohip">OHIP #:</label><br>
			<input type="text" id="ohip" name="ohip"><br><br>
			<label for="firstname">First Name:</label><br>
			<input type="text" id="firstname" name="firstname"><br><br>
			<label for="lastname">Last Name:</label><br>
			<input type="text" id="lastname" name="lastname"><br><br>
			<input type="submit" value="Add">
			</form>
			
			</div>
		</div>
	</div>
</body>
</html>