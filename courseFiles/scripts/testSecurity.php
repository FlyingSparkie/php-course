<html>
 <head>
  <title>Test Attack</title>
<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$first_name = $_POST['first_name'];

//$first_name = htmlspecialchars($first_name);
$first_name = strip_tags($first_name, "<B>");
//$first_name = htmlentities($first_name);

	echo $first_name;
}
?>


 </head>
 <body>


</body>

<Form Method = "Post" action ="testSecurity.php">
<input type = "text" name = "first_name" value ="test name">
<input type="submit" name="Submit" value="Submit">
</Form>


<P>

</html>
