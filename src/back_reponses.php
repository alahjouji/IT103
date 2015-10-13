<?php 
  include("functions.php");
  session_start();
  testAcces();
  if (isset($_GET['suppr'])) {
    $reponse=reponse($_GET['suppr']);
    if($_SESSION['userid']!=$reponse['auteur']){
        die("Accès interdit.");
      }
    $questionid=$reponse['question'];
    supprVote2($_GET['suppr']);
    supprReponse($_GET['suppr']);
    header("Location: back_reponses.php?questionid=$questionid");
  }
  if(isset($_GET['questionid'])){  
    $id=$_GET['questionid'];
    $question=question($id); 
    if ($question == null) die("question invalide.");
  }
?>
<html lang='fr'>
  <head>
    <meta charset='utf8'>
    <link href="./bootstrap.css" rel="stylesheet">
    <link href="./offcanvas.css" rel="stylesheet">
    <link href="./grid.css" rel="stylesheet">
    <title><?php echo blogTitle(); ?></title>
    <style type='text/css'>
      #li{margin-left:400px;} 
      #p{color: blue; font-size:25px;}     
      #m{font-size: 20px;}     
      #c{font-size: 20px; margin-left:1000px;}
      #a{color: blue; font-size:14px;}
      #b{color: red; font-size:14px;}   
    </style>
  </head>
  <body>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <p class="navbar-brand">AskAround</p>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><?php $id=$_GET['questionid'];echo "<a href='back_reponses_form.php?ajout=$id'>Nouvelle Réponse</a>";?></li>
            <li id='li'><a href="home.php">Accueil</a></li>
            <li><a href="back_questions.php">Toutes les questions</a></li>
            <li><a href="index.php?deconnecte=">Déconnexion</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <?php 
        $id=$_GET['questionid'];
        $question=question($id); 
        if ($question == null) die("question invalide.");
        $contenu=$question['contenu'];
        $user=userfromid($question['auteur']);
        $pseudo=$user['pseudo'];
        echo "<div class='well'>
                <p id='p'> $pseudo: </p><p id='m'> $contenu</p>";
        if($question['auteur']==$_SESSION['userid']){
          echo "<a id='c' href='back_questions_form.php?edite=$id'>éditer</a>";
        }echo "</div>";
      ?>
        <?php 
          echo "<h1>Liste des réponses:</h1>";
          $reponses = reponses($_GET['questionid']);
          foreach ($reponses as $reponse) {
            $contenu = $reponse['contenu'];
            $id = $reponse['id'];
            $user=userfromid($reponse['auteur']);
            $pseudo=$user['pseudo'];
            $vote=$reponse['nbrvotes'];
            echo "<div class='row'>
            <div class='col-md-1' >$pseudo</div>
            <div class='col-md-8'>$contenu</div>
            <div class='col-md-1'>+$vote</div>"; 
            if($reponse['auteur']==$_SESSION['userid']){
              echo"<div class='col-md-2'>
                     <a class='a' id='a' href='back_reponses_form.php?edite=$id'>éditer</a>
                     <a class='a' id='b' href='?suppr=$id'>supprimer</a>
                   </div>";
            }else{
              echo "<div class='col-md-2'>
                     <a href='back_votes.php?vote=$id'>voter</a>
                    </div>";
            }echo"</div>";
          }
        ?>
    </div>
  </body>
</html>