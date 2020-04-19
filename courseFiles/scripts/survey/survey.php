<?PHP
require '../../configure.php';
	if (isset($_GET['h1'])) {
		$qID = $_GET['h1'];
	} else {
		$qID = 1;
	}

	$question = 'Question not set';
	$answerA = 'unchecked';
	$answerB = 'unchecked';
	$answerC = 'unchecked';

	$A = "";
	$B = "";
	$C = "";

	$database = "survey";

	$db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );

	if ($db_found) {

		$stmt = $db_found->prepare("SELECT ID, Question, OptionA, OptionB, OptionC FROM tblsurvey WHERE ID = ?");

		if ($stmt) {
			$stmt->bind_param('i', $qID);
			$stmt->execute();
			$res = $stmt->get_result();

			if ($res->num_rows > 0) {

				$row = $res->fetch_assoc();

				$qID = $row['ID'];
				$question = $row['Question'];
				$A = $row['OptionA'];
				$B = $row['OptionB'];
				$C = $row['OptionC'];

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
<title>Survey</title>
</head>


<body>

<FORM NAME ="form1" METHOD ="GET" ACTION ="process.php">

<P>
<?PHP print $question; ?>
<P>
<INPUT TYPE = 'Radio' Name ='q'  value= 'A' <?PHP print $answerA; ?>><?PHP print $A; ?>
<P>
<INPUT TYPE = 'Radio' Name ='q'  value= 'B' <?PHP print $answerB; ?>><?PHP print $B; ?>
<P>
<INPUT TYPE = 'Radio' Name ='q'  value= 'C' <?PHP print $answerC; ?>><?PHP print $C; ?>
<P>

<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Click here to vote">
<INPUT TYPE = "Hidden" Name = "h1"  VALUE = <?PHP print $qID; ?>>
</FORM>


<FORM NAME ="form2" METHOD ="GET" ACTION ="viewResults.php">

<INPUT TYPE = "Submit" Name = "Submit2"  VALUE = "View results">
<INPUT TYPE = "Hidden" Name = "h1"  VALUE = <?PHP print $qID; ?>>
</FORM>
</body>
</html>











