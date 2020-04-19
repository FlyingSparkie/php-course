<?PHP
$uname = "";
$pword = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require '../../configure.php';

	$uname = $_POST['username'];
	$pword = $_POST['password'];

	$database = "login";

	$db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );

	if ($db_found) {		
		$SQL = $db_found->prepare('SELECT * FROM login WHERE L1 = ?');
		$SQL->bind_param('s', $uname);
		$SQL->execute();
		$result = $SQL->get_result();

		if ($result->num_rows > 0) {
			$errorMessage = "Username already taken";
		}
		else {
			$phash = password_hash($pword, PASSWORD_DEFAULT);
			$SQL = $db_found->prepare("INSERT INTO login (L1, L2) VALUES (?, ?)");
			$SQL->bind_param('ss', $uname, $phash);
			$SQL->execute();

			header ("Location: login.php");
		}
	}
	else {
		$errorMessage = "Database Not Found";
	}
}
?>

	<html>
	<head>
	<title>Basic Signup Script</title>


	</head>
	<body>


<FORM NAME ="form1" METHOD ="POST" ACTION ="signup.php">

Username: <INPUT TYPE = 'TEXT' Name ='username'  value="<?PHP print $uname;?>" >
Password: <INPUT TYPE = 'TEXT' Name ='password'  value="<?PHP print $pword;?>" >

<P>
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Register">


</FORM>
<P>

<?PHP print $errorMessage;?>

	</body>
	</html>
