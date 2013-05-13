<?php
require_once('conn.php');
echo "<html><head><link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\"><title>Eurovision 2013 Country Picker</title></head><body><h1>Eurovision 2013 Country Picker</h1>";


$result = mysqli_query($con,"SELECT * FROM country");
echo "<table><tr><th>Guest</th><th>Assigned Country</th></tr>";
while($row = mysqli_fetch_array($result))
  {
  echo "<tr><td>" . $row['Owner'] . "</td><td>". $row['Country'] ."</td></tr>";

  }
  echo "</table>";

mysqli_close($con);
?>
