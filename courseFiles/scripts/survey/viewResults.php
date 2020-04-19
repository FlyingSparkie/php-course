<?PHP
require '../../configure.php';
$question = '';
$answerA = '';
$answerB = '';
$answerC = '';

$imgTagA = '';
$imgWidthA = '0';

$imgTagB = '';
$imgWidthB = '0';

$imgTagC = '';
$imgWidthC = '0';

$imgHeight = '10';
$totalP = '';
$percentA = '0';
$percentB = '0';
$percentC = '0';

$qA = '';
$qB = '';
$qC = '';

if (isset($_GET['Submit2']) && isset($_GET['h1'])) {

	$qNum = $_GET['h1'];

	$user_name = "root";
	$password = "";
	$database = "survey";
	$server = "127.0.0.1";

	$db_found = new mysqli(DB_SERVER, DB_USER, DB_PASS, $database );

	if ($db_found) {

		$SQL = $db_found->prepare('SELECT * FROM tblsurvey WHERE ID = ?');
		if ($SQL) {
			$SQL->bind_param('i', $qNum);
			$SQL->execute();

			$result = $SQL->get_result();

			if ($result->num_rows > 0) {
				$db_field = $result->fetch_assoc();

				$question = $db_field['Question'];
				$answerA = $db_field['OptionA'];
				$answerB = $db_field['OptionB'];
				$answerC = $db_field['OptionC'];

				$qA = $db_field['VotedA'];
				$qB = $db_field['VotedB'];
				$qC = $db_field['VotedC'];

				$totalP = $qA + $qB + $qC;

				$percentA = (($qA * 100) / $totalP);
				$percentA = floor($percentA);

				$percentB = (($qB * 100) / $totalP);
				$percentB = floor($percentB);

				$percentC = (($qC * 100) / $totalP);
				$percentC = floor($percentC);

				$imgWidthA = $percentA * 2;
				$imgWidthB = $percentB * 2;
				$imgWidthC = $percentC * 2;

				$imgTagA = "<IMG SRC = 'red.jpg' Height = " . $imgHeight . " WIDTH = " . $imgWidthA. ">";
				$imgTagB = "<IMG SRC = 'red.jpg' Height = " . $imgHeight . " WIDTH = " . $imgWidthB . ">";
				$imgTagC = "<IMG SRC = 'red.jpg' Height = " . $imgHeight . " WIDTH = " . $imgWidthC . ">";
			}
			else {
				print "ROW ERROR";
			}
		}
	}
	else {
		print "database error";
	}


}
else {
	print "no results to display";
}
?>

<html>
<head>
<title>Survey Results</title>
</head>



<body>

<?PHP
print $question . "<BR>";
print $answerA . " " . $imgTagA . " " . $percentA . "% " . $qA . "<BR>";
print $answerB . " " .$imgTagB . " " . $percentB . "% " . $qB . "<BR>";
print $answerC . " " .$imgTagC . " " . $percentC . "% " . $qC . "<BR>";

?>
</body>
</html>