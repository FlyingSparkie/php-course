<html>
<head>
<title>A BASIC HTML FORM</title>
<?PHP
	$username = $_POST['username'];
	print $username;
?>
</head>
<body>

<FORM NAME ="form1" METHOD ="POST" ACTION = "basicForm.php">

<INPUT TYPE = "TEXT" NAME= "username" VALUE ="username">
<INPUT TYPE = "Submit" Name = "Submit1" VALUE = "Login">

</FORM>
</body>
</html>
