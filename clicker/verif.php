<?php

session_start();
	$auth= false;
	$login=$_GET['login'];
	$mdp=$_GET['mdp'];
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=clicker;port=8889;charset=utf8', 'root', 'root');
	$requete = $bdd->query("select count(*) from joueur where nom ='".$_GET['login']."' and mdp ='".$_GET['mdp']."'");
	$resultat = $requete->fetch();
	if ($resultat[0]['count']==1)
		{
		$auth = true;
		}
	if ($auth) 
		{
		$_SESSION['login'] = $login;
		header('Location:./clicker.php');
		}
	else
		{

		session_destroy();
		require('../Clicker/index.html');
		echo "<script>alert(\"Login ou mot de passe incorrect\")</script>";
		}
?> 