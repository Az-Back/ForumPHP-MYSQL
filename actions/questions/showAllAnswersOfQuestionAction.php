<?php

require('actions/database.php');

$getAllAnswersOfThisQuestion = $bdd->prepare('SELECT id_auteur, pseudo_auteur, id_question, contenu FROM answers WHERE id_question = ?');
$getAllAnswersOfThisQuestion->execute(array($idOfTheQuestion));
