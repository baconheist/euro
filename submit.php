<?php
require_once('conn.php');
echo "<html><head><link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\"><title>Eurovision 2013 Country Picker</title></head><body><h1>Eurovision 2013 Country Picker</h1>";


$user = mysqli_real_escape_string($con, $_POST["user"]);
$cat =  mysqli_real_escape_string($con, $_POST["cat"]);

$result = mysqli_query($con,"SELECT * FROM country WHERE  owner= '".$user."'");

$row_cnt = $result->num_rows;
//printf("Result set has %d rows.<br>\n", $row_cnt);

if($row_cnt!=0)
{
	echo "you already have a country, you crazy horse <br>";
	while($row = mysqli_fetch_array($result))
	{
		echo "You've been assigned " . $row['Country'];
  	}

}
else
{

	$result = mysqli_query($con,"SELECT * FROM country WHERE category = ".$cat." AND owner=''");
	    
	$row_cnt = $result->num_rows;
	//printf("Result set has %d rows.<br>\n", $row_cnt);	
	if($row_cnt!=0)
	{

		$rand=rand(0, $row_cnt-1);
		//echo "rand:" . $rand;
		echo "<br>";
		for ($i = 0; $row = mysqli_fetch_array($result); ++$i)
		{
			if($i==$rand)
			{

				$Country=$row['Country'];
				echo "you've been assigned ".$Country;
				echo "<br>";
			}
		}
		mysqli_query($con, "UPDATE country SET owner = '".$user."' WHERE Country = '".$Country."'"); 
	}
	else
	{
		echo "No more countries available in that category. Go pick somewhere shittier.";
	}
}

mysqli_close($con);
?>