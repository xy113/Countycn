<?php
error_reporting(0);
$tid = intval($_GET['id']);
$cid = intval($_GET['catid']);
if ($tid){
	include 'thread.php';
}elseif ($cid){
	include 'list.php';
}
?>