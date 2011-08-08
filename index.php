<?php
require('class.sessions.php');
$s = new Sessions();

if($_POST['submit']){
	extract($_POST);
	if($username == "kyle" && $password == 'password'){
		$s->update(1);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP SESSION CLASS &bull; Kyle Ouellette</title>
</head>
<body>
<?php
if($s->check()):
	echo "Still valid";
	$s->update(1);
	$s->doShow();
else: ?>
	<form method="post" action=''>
		<input type='text' name='username' />
		<input type="password" name="password" />
		<input type="submit" value="submit" name="submit" />
	</form>
<?php
endif;
?>
</body>
</html>