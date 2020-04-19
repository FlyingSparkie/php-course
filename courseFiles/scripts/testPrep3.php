<html>
<head>
<title>UPDATE - Prepared Statement</title>

<?PHP
$email = "";
$passW = "";
$uName = "";

if (isset($_POST['Submit1'])) {
	require '../configure.php';
	
	$uName = $_POST['user'];
	$passW = $_POST['pass'];
	$email = $_POST['email'];

	$database = "membertest";

	$db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );

	if ($db_found) {

		$SQL = $db_found->prepare("UPDATE members SET username=?, password=? WHERE email=?");

		$SQL->bind_param('sss',  $uName, $passW, $email);
		$SQL->execute();

		$SQL->close();
		$db_found->close();

	print "Row updated";
	}
	else {
		print "Database NOT Found ";
	}
}
?>

</head>
<body>

<FORM NAME ="form1" METHOD ="POST" ACTION ="testPrep3.php">

User <INPUT TYPE = 'TEXT' Name ='user' value="testfive"> <BR>
Pass <INPUT TYPE = 'TEXT' Name ='pass'  value="testfive"> <BR>
email address <INPUT TYPE = 'TEXT' Name ='email'  value="<?PHP print $email ; ?>">


<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Login">
</FORM>


</body>
</html>

