<?php
session_start();
$c = pg_connect('host=127.0.0.1 dbname=tower user=tower_admin password=admin');
$r_verif = "select score from joueur where nom like '".$_SESSION['nom']."'";
$req_verif = pg_query($r_verif);
if(pg_fetch_row($req_verif)[0] < $_GET['score']) 
	{
	$s = "update joueur set score = ".$_GET['score']." where nom like '".$_SESSION['nom']."'";
	$req = pg_query($s);
	}
?>