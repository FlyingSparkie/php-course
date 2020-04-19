<?PHP
require '../../configure.php';
$voteMessage = "";
session_start();
if ((isset($_SESSION['hasVoted']))) {
	if ($_SESSION['hasVoted'] = '1') {
		$voteMessage = "You've already voted";
	}
}
else {
	if (isset($_GET['Submit1']) && isset($_GET['q'])) {

		$selected_radio = $_GET['q'];
		$idNumber = $_GET['h1'];

		$database = "survey";

		$db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );

		if ($db_found) {

			if($selected_radio == "A") {
				$votedSQL = "UPDATE tblsurvey SET VotedA = VotedA + 1 WHERE ID = ?";
				$voteMessage = insert_vote($db_found, $votedSQL, $idNumber);
			}
			else if($selected_radio == "B"){
				$votedSQL = "UPDATE tblsurvey SET VotedB = VotedB + 1 WHERE ID = ?";
				$voteMessage = insert_vote($db_found, $votedSQL, $idNumber);
			}
			else if($selected_radio == "C"){
				$votedSQL = "UPDATE tblsurvey SET VotedC = VotedC + 1 WHERE ID = ?";
				$voteMessage = insert_vote($db_found, $votedSQL, $idNumber);
			}
			else {
				print "Error - could not record vote";
			}	
		}
	}
	else {
		print "You didn't select a voting option!";
	}
}

function insert_vote($db, $sql, $id) {

	$stmt = $db->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();

	//$_SESSION['hasVoted'] = '1';
	return "Thanks for voting!";
}

?>

<html>
<head>
<title>Process Survey</title>
</head>



<body>
<?PHP print $voteMessage . "<BR>"; ?>
</body>
</html>

