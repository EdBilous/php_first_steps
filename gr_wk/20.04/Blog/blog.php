<?php require_once 'functions.php'; ?>
<?php
	if (isset($_SESSION['access']) && !$_SESSION['access']) {
	 header('Location: /access_denied.php');
	 exit;
}
?>

<!DOCTYPE HTML>
<html>
	<head>
 	<meta charset="utf-8">
 	<title>Тег FORM</title>
	</head>

	<body>

		<div>
 			<p>Hello "<?php echo $_SESSION['login']; ?>"</p>
			<a href="/?logout">Logout</a>
		</div>

	</body>
</html>