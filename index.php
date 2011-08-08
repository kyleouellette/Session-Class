<?php
require('class.sessions.php');

$s = new Sessions();

if($s->check()){
	echo "Still valid";
}else{
	echo "invalid";
	$s->update(2);
}
$s->doShow();