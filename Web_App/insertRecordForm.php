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
	<br>
	<div class="container">
        <div class="row">
            <div class="col text-center">
			<br>
			<br>
			<form action="insertRecordDB.php" method="post">
			<?php
			$result = $connection->query("select distinct * from vaccineClinic");
			echo "<ol>";
			while ($row = $result->fetch()) {
				echo '<input type="radio" name="name" value="';
				echo $row["name"];
				echo '">' . $row["name"]."<br>";
			}
			echo "</ol>";
			?>
			<?php
			$connection = NULL;
			?>
			<label for="lot">Lot Number:</label><br>
			<input type="text" id="lot" name="lot"><br><br>
			<label for="ohip">OHIP #:</label><br>
			<input type="text" id="ohip" name="ohip"><br><br>
			<label for="date">Date & Time Administered:</label><br>
			<input type="text" id="date" name="date" value="YYYY-MM-DD hh:mm:ss"><br><br>
			<input type="submit" value="Add">
			</form>
			<br>
			<br>
			<b>Previous Vaccinations</b>
			</div>
		</div>
	</div>
</body>
</html>