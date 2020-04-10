
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>Job profile</title>
	<style type="text/css">
		body{
			background: url('./sai.jpg') repeat;
			width: 100%;
			height: 100%;
		}
		.form-container{
			height: 100%;
			border: 1px solid #ffff;
			padding: 35px 60px;
			margin-top: 150px;
			text-align: center;
		}
		.result{
			color: white;
		}
	</style>
</head>
<body>

	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
			
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<form class="form-container" action="" method="post">
					<select class="btn-block" name="course" selected>
						<option value="c++">c++</option>
						<option value="MYSQL">MYSQL</option>
						<option value="HTML">HTML</option>
						<option value="MONGODB">MONGODB</option>
						<option value="ANGULAR">ANGULAR</option>
						<option value="PHP">PHP</option>
						<option value="NODEJS">NODEJS</option>
						<option value="LINUX">LINUX</option>
						<option value="NETWORKING">NETWORKING</option>
						<option value="ASP.NET">ASP.NET</option>
						<option value="R">R</option>
					</select><br>
					<button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
					<div class="result">
						<?php
							if ($_SERVER["REQUEST_METHOD"] == "POST")
							{
								if (isset($_POST['submit'])) {
									# code...
									$host = "localhost";
									$user = "root";
									$password = "";
									$database = "r";
									$course = $_POST['course'];
									$conn = mysqli_connect($host,$user,$password,$database);
									if (!$conn) {
										# code...
										die("Connection failed: " . mysqli_connect_error());
									}

									$sql = "SELECT * from profile where course='$course'";
									$result = mysqli_query($conn,$sql);
									if (mysqli_num_rows($result) > 0) {
									    // output data of each row
									    while($row = mysqli_fetch_assoc($result)) {
									        echo "<h3>Course: " . $row["course"]. "<br>Job: " . $row["job"]."<br></h3>";
									    }
									} else {
									    echo "0 results";
									}
									mysqli_close($conn);
								}
							}
							
						?>
					</div>
				</form>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				
			</div>
		</div>
		
	</div>
	

	
	

</body>
</html>