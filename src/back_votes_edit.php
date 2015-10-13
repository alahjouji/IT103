<?php 
  include("functions.php");
  session_start();
  testAcces();
  if(isset($_GET['vote'])) {
    $reponse=reponse($_GET['vote']);
    $nbrvotes=$reponse['nbrvotes'];
    $question=$reponse['question'];
    $vote=dejavote2($question,$_SESSION['userid']);
    $reponse1id=$vote['reponse'];
    $reponse1=reponse($reponse1id);
    $nbrvotes1=$reponse1['nbrvotes'];
    supprVote($_SESSION['userid'], $reponse1['id']);
    supprVote1($reponse1['id'],$nbrvotes1);
    ajoutVote($_SESSION['userid'], $question, $_GET['vote']);
    ajoutVote1($_GET['vote'],$nbrvotes);

    header("Location: back_reponses.php?questionid=$question");
  }
?>