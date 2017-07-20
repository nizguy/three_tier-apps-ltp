<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "runner_log";

	$conn = new mysqli($servername, $username, $password);

	if($conn->connect_error)
	{
		die("Connection failed: " . $$conn->connect_error);
	}
	else
	{
		// echo "Connected Successfuly";
	}
	mysqli_select_db($conn,$db_name);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Run Tracker1</title>
	</head>
	<style>
		
		Table, tr, th, td
		{
			border: solid black 1px;
			color: black;
		}
		
		Table
		{
			border-collapse: collapse;
		}
		
		.odd
		{
			background-color: aqua;
			
		}
		.even
		{
			background-color:coral
			color: black
		}
	</style>
	<body>
		<h1>Run History</h1>
		<?php
			$odd = false;
			$query = "SELECT * FROM runs";
			$result = $conn->query($query);
			$out = "<table>";
			$out .= "<tr class='odd'><th>Date</th><th>Distance</th><th>Notes</th></tr>";
			while($row = $result->fetch_assoc())
			{
				if($odd){
					$out .= "<tr class='odd'>";
				}else
				{
					$out .= "<tr class='even'>";
				}
				$out .= "<td>";
				$out .= $row['RunDate'] . "</td><td>" . $row['RunDistance'] . "</td><td>" . $row['RunComment'] . "</td></tr>";
				$odd = !$odd;
			}
			$out .= "</table>";
			echo $out;
		?>
	</body>
</html>