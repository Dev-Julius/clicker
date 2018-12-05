<?php
session_start();
error_reporting(0);
$bdd = new PDO('mysql:host=127.0.0.1;dbname=clicker;port=8889;charset=utf8', 'root', 'root');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Clicker.exe</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
		<meta http-equiv="content-style-type" content="text/css">
		<meta http-equiv="expires" content="0">
		<link rel="stylesheet" type="text/css" href="./css/jeu_jf.css">
		<script type="text/javascript" src="clicker.js"></script>
	</head>
	<body>
		<div id="back">
		<img src="image/logout.png" onclick="window.location='deco.php';" id="deco">
		<h1>JF Clicker</h1>
		<?php
		if(!isset($_SESSION['login']))
			{
			echo("Vous êtes connecté sans être authentifié !");
			}
		else
			{
		?>
			<p><b>Bienvenue <?php echo $_SESSION['login']; ?></b></p><?php
			}
		?>
		<button>Jean Francois</button>
		<button>Jean Claude</button>
			
		<form method="POST">
			<input type="submit"  value="" src="../mp3/" name="click" style="margin-left: 40%;" id="bg" onclick="afficher('clicker.php','body');">
			<?php
			if (isset($_REQUEST["click"])) 
				{
				$bdd->query("update joueur set score = score + 1 where nom='".$_SESSION['login']."'");
				}
			?>
		</form>
		<?php
		$requete = $bdd->query("select * from joueur");
		?>

		<?php
		$c = $bdd->query('host=127.0.0.1 dbname=clicker user=root password=root');
		$requete = $bdd->query("select score from joueur where nom='".$_SESSION['login']."'");
		?>
        <?php
        //On affiche les lignes du tableau une à une à l'aide d'une boucle for
        while($donnees = $requete->fetch())
        	{
        ?>
       	 	<br>
        	<br>
			<div id="phrase_score">Votre score est de : <?php echo $donnees['score'];?></div>
			<?php
			}
			?>
		<?php
		$reqT = $bdd->query("select sum(score) as sum from joueur;");
		?>
        <?php
        //On affiche les lignes du tableau une à une à l'aide d'une boucle for
        while($donnees2 = $reqT->fetch())
        	{
        ?>
       	 	<br>
        	<br>
			<div id="phrase_score" style="margin-top: 2%;">Le nombre total de clic est de : <?php echo $donnees2['sum'];?></div>
			<?php
			}
			?>
		<div id="tableau_score">
			Top 10 Mondial :
			<table>
				<tr>
					<th>Nom:</th>
					<th>Score:</th>
				</tr>
				<?php
					error_reporting(0);
					$req =$bdd->query('select nom, score from joueur order by score desc');
					$r= $req->fetchAll();
					for($i=0;$i <=10;$i++)
						{
						if($r[$i] != NULL) 
							{
							echo('<tr>');
							echo('<th>'.$r[$i]['nom'].'</th>');
							echo('<th>'.$r[$i]['score'].'</th>');
							echo('</tr>');
							}
						}
					?>
			</table>
		</div>
	</div>
</div>
	</body>
</html>