<?PHP
$email = "";

if (isset($_POST['Submit1'])) {
	require '../configure.php';
	$email = $_POST['email'];

	$database = "membertest";

	$db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );

	if ($db_found) {

		$SQL = $db_found->prepare('SELECT * FROM members WHERE email = ?');

		$SQL->bind_param('s', $email);
		$SQL->execute();

		$result = $SQL->get_result();

		if ($result->num_rows > 0) {

			while ( $db_field = $result->fetch_assoc() ) {

				print $db_field['ID'] . "<BR>";
				print $db_field['username'] . "<BR>";
				print $db_field['password'] . "<BR>";
				print $db_field['email'] . "<BR>";
			}

		}
		else {
			print "No records found";
		
		}
		$SQL->close();
		$db_found->close();

	}
	else {
		print "Database NOT Found ";
	}

}

?>
<html>
<head>
<title>A BASIC HTML FORM</title>
</head>
<body>

<FORM NAME ="form1" METHOD ="POST" ACTION ="testPrep.php">

email address <INPUT TYPE = 'TEXT' Name ='email'  value="<?PHP print $email ; ?>">


<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Login">
</FORM>

test1@test1.com
</body>
</html>

