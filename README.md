# ForumPHP-MYSQL

Need localhost like wamp for use

Make database on phpmyadmin name: forum

Make 3 tables: questions, answers, users

Answers need : 
id (with auto_increment)
id_auteur
pseudo_auteur
id_question
contenu

Questions need: 
id (with auto_increment)
titre
description
contenu
id_auteur
pseudo_auteur
date_publication

Users need :
id (with auto_increment)
pseudo
nom
prenom
mdp

Link database like that : $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', '(put your name)', '(put your mdp');
