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
	<a href="/record.php">&laquo; Back</a>
	<br>
	<div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>
					Record A Patient Vaccination
				</h1>
            </div>
        </div>
    </div>
	<br>
	<div class="container">
    <div class="row">
    <div class="col text-center">
	<hr>
	<table align="center" border = '1' border-collapse = 'collapse' width = '75%'>
	<tr>
	<th>OHIP #</th>
	<th>Date Administered</th>
	<th>Type</th>
	</tr>
	<?php
	$OHIP= $_POST["OHIP"];
	echo "<h4> Listings For: " . $OHIP . " </h4>";
	$query = 'SELECT OHIP FROM Patient WHERE OHIP LIKE "' . $OHIP . '"';
	$result=$connection->query($query);
	$row=$result->fetch();
	if ($row==0){
		echo "<b> Patient does not exists, please add them to the database below before recording a vaccination. </b>";
		include 'addPatient.php';
			 
	}
	else{
		echo "<b> Patient exists in database. Please add vaccination record below. </b>";
		include 'insertRecordForm.php';
		$query2 = 'SELECT patient.OHIP, vaccination.date, vaccine.producedBy FROM patient, vaccination, vaccine WHERE (patient.OHIP=vaccination.patientOHIP AND vaccination.vaccineLot=vaccine.lot AND patient.OHIP="' . $OHIP . '")';
		$con = new PDO('mysql:host=localhost;dbname=coviddb', "root", "");
		$result2=$con->query($query2);
		while ($row2=$result2->fetch()) {
			echo "<tr>";
			echo "<td>".$row2["OHIP"]."</td>";
			echo "<td>".$row2["date"]."</td>";
			echo "<td>".$row2["producedBy"]."</td>";
			echo "</tr>";
		}
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
</body>
</html>