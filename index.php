<?php
require_once('conn.php');
echo "<html><head><link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\"><title>Eurovision 2013 Country Picker</title></head><body>";
echo "<h1>Eurovision 2013 Country Picker</h1>Welcome to Argus and Elysia's Eurovision 2013 party Country Picker!<br>Please pick your name and a prefered 'genre' of country below!<br><br>";

$result = mysqli_query($con,"SELECT * FROM guest");
if (!$result) {
    printf("Errormessage: %s\n", $con->error);
  }
//var_dump($result);

echo "<form action=\"submit.php\" method=\"post\">My name is: <select name=\"user\">";
while($row = mysqli_fetch_array($result))
  {
  echo "<option value=\"" . $row['Name'] . "\">" . $row['Name'];
  echo "</option> ";
  }
  echo "</select>, and I want the following type of country: <select name=\"cat\">";

 $result = mysqli_query($con,"SELECT * FROM category");

while($row = mysqli_fetch_array($result))
  {
  echo "<option value=\"" . $row['ID'] . "\">" . $row['Category'];
  echo "</option>";
  }
  echo "</select><input type=\"submit\"></form>";
mysqli_close($con);

echo "<br>Please note: At Argus' request I left out any sort of verification - please don't be a dick and pick countries for anyone else - it won't be hilarious. Also, please don't try to hack my app.<br>Love Steve. "

?>
