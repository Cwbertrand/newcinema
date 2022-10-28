<?php
//a. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur

$select = "SELECT titre_film, createAt_film, TIME_FORMAT(SEC_TO_TIME(duree_film * 60), '%H:%i'), p.nom, p.prenom AS films
            FROM film f
            INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
            INNER JOIN personne p ON p.id_personne = r.id_personne;";

//b. Liste des films dont la durée excède 2h15 classés par durée (du plus long au plus court
$plusque = "SELECT titre_film, TIME_FORMAT(SEC_TO_TIME(duree_film * 60), '%H:%i') AS duree
            FROM film f
            WHERE duree_film > 135
            ORDER BY duree";

//c. Liste des films d’un réalisateur (en précisant l’année de sortie)
$realisateur = "SELECT titre_film, createAt_film, p.nom, p.prenom
                FROM film f
                INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
                INNER JOIN personne p ON p.id_personne = r.id_personne
                WHERE f.id_realisateur = 1
                ORDER BY createAt_film DESC";

//d. Nombre de films par genre (classés dans l’ordre décroissant)
$nbfpagenre = "SELECT g.nom_genre, COUNT(id_film) AS nbFilm
                FROM genre g
                INNER JOIN asso_genre ag ON ag.id_genre = g.id_genre
                GROUP BY g.id_genre
                ORDER BY nbFilm DESC";

//e. Nombre de films par réalisateur (classés dans l’ordre décroissant
$nbfpareal = "";
