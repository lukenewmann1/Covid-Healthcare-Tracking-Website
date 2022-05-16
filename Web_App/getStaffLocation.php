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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbar"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbar">
            <div class="navbar-nav">
                <a class="nav-item nav-link" id="home" href="/covid.html" style="font-size:20px">Home</a>
                <a class="nav-item nav-link" id="dashboard" href="/dashboard.html" style="font-size:20px">Dashboard</a>
            </div>
        </div>
    </nav>
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
	 <a href="/staff.php">&laquo; Back</a>
	<br>
	<div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>
					Staff Locations
				</h1>
            </div>
        </div>
    </div>
	<br>
	<div class="container">
    <div class="row">
    <div class="col text-center">
	<?php
	$clinic= $_POST["name"];
	echo "<h4> Listings For: " . $clinic . "</h4>";
	?>
	<hr>
	<table align="center" border = '1' border-collapse = 'collapse' width = '75%'>
	<tr>
	<th>Firstname</th>
	<th>Lastname</th>
	<th>Credentials</th>
	</tr>
	<?php
	$clinic= $_POST["name"];
	$query = 'SELECT Doctor.firstname, Doctor.lastname, drCredentials.Cred FROM Doctor, drCredentials, DrWorksAt WHERE (Doctor.ID=DrWorksAt.ID AND drCredentials.ID=Doctor.ID AND DrWorksAt.clinicName="' . $clinic . '")
				UNION
				SELECT Nurse.firstname, Nurse.lastname, nurseCredentials.Cred FROM Nurse, nurseCredentials, NurseWorksAt WHERE (Nurse.ID=NurseWorksAt.ID AND nurseCredentials.ID=Nurse.ID AND NurseWorksAt.clinicName="' . $clinic . '")';
	$result=$connection->query($query);
		while ($row=$result->fetch()) {
			echo "<tr>";
			echo "<td>".$row["firstname"]."</td>";
			echo "<td>".$row["lastname"]."</td>";
			echo "<td>".$row["Cred"]."</td>";
			echo "</tr>";
			}
			?>
	</table>
	</div>
    </div>
    </div>
	<?php
	$connection = NULL;
	?>
	<br>