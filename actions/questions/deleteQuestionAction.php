<?php

session_start();
if(!isset($_SESSION['auth'])){
    header('Location : ../../login.php');
}

require('../database.php');

// Sert a verifier si la variable est declarer
if(isset($_GET['id']) && !empty($_GET['id'])){
    
    // l'id de la question en parametre
    $idOfTheQuestion = $_GET['id'];

    // Verifier si la question existe
    $checkIfQuestionExists = $bdd->prepare('SELECT id_auteur FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    if($checkIfQuestionExists->rowCount() > 0){

        // Recuperer les infos de la question
        $questionsInfos = $checkIfQuestionExists->fetch();
        if($questionsInfos['id_auteur'] == $_SESSION['id']){

            // Supprimer la question en fonction de son id rentré en paramétre
            $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
            $deleteThisQuestion->execute(array($idOfTheQuestion));

            // Rediriger l'utilisateur vers ses questions
            header('Location: ../../my-questions.php');

        } else {
            echo "Vous n'avez pas le droit de supprimer une question qui ne vous appartient pas !";
        }

    } else {
        echo "Aucune question n'a été trouvée";
    }

} else {
    echo "Aucune question n'a été trouvée";
}