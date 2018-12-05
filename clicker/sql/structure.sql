create table joueur
	(
	id_j serial primary key,
	nom varchar(32),
	mdp varchar(32),
	score integer default 0
	);

