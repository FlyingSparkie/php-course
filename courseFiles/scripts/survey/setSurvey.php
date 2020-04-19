<?PHP
require '../../configure.php';
	$qID = '';
	$dropdown = '';
	$startSelect = "<SELECT NAME=drop1>";
	$endSelect = "</SELECT>";
	$wholeHTML = "";
	$getDropdownID = "";
	$hidTag = "";

	if (isset($_GET['Submit1'])) {

		$getDropdownID = $_GET['drop1'];

		header ("Location: survey.php?h1=" . $getDropdownID);
	}

	$database = "survey";

	$db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );

	if ($db_found) {

		$stmt = $db_found->prepare("SELECT ID, Question FROM tblsurvey");

		if ($stmt) {

			$stmt->execute();
			$res = $stmt->get_result();

			if ($res->num_rows > 0) {

				while ( $row = $res->fetch_assoc() ) {

					$qID = $row['ID'];
					$question = $row['Question'];
					$dropdown = $dropdown . "<OPTION VALUE='" . $qID . "'>" . $question . "</OPTION>" . "<BR>";


				}

				$wholeHTML = $startSelect . $dropdown . $endSelect;
			}
			else {
				print "Error - No rows";
			}
	}
	else {
		print "Error - DB ERROR";
	}


	}
	else {
		print "Error getting Survey";
	}
?>
<html>
<head>
<title>Set a Survey Question</title>
</head>

<body>
<FORM NAME ="form1" METHOD ="GET" ACTION ="setSurvey.php">
<?PHP print $wholeHTML; ?>
<P><INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Set a Question"></P>

</FORM>
</body>
</html>











