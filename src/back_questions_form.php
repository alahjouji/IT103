<?php 
  include("functions.php");
  session_start();
  testAcces();
  if (isset($_POST['contenu'])) {
   if (isset($_POST['edite'])) {
      $questionid=$_POST['edite'];
      $question=question($_POST['edite']);
      if($_SESSION['userid']!=$question['auteur']){
        die("Accès interdit.");
      }
      editeQuestion($_POST['edite'], $_POST['contenu']);
      $reponses = reponses($questionid);
      foreach ($reponses as $reponse) {
        supprVote2($reponse['id']);
        supprReponse($reponse['id']);
      }
      header("Location: back_reponses.php?questionid=$questionid");     
      die();
   }else{
    if ($_POST['contenu']=="") {
      $msg="Veuillez remplir le champ ci-dessous";
    }else{
      $auteur=$_SESSION['userid'];
      ajoutQuestion($auteur,$_POST['contenu']);
      header("Location: back_questions.php");
     }
   }
  }elseif(isset($_GET['edite'])) { 
    $question = question($_GET['edite']);
    if ($question == null) die("question invalide.");
    $id = $question['id'];
    $contenu = $question['contenu'];
  }
?>
<html lang='fr'>
  <head>
    <meta charset='utf8'>
    <link href="./bootstrap.css" rel="stylesheet">
    <link href="./offcanvas.css" rel="stylesheet">
    <title><?php echo blogTitle(); ?></title>
    <style type='text/css'>
      #li{margin-left:800px;}      
      #c{color: black; font-size: 20px;}   
      #f{text-align: center;margin-top:80px;}   
      #v{width: 30%; height: 20%;}
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
            <li id='li'><a href="home.php">Accueil</a></li>
            <li><a href="index.php?deconnecte=">Déconnexion</a></li>
          </ul>
        </div>
      </div>
    </div>
    <?php if (isset($msg)) echo "<p>$msg</p>"; ?>
    <form name='question' method='post' id='f'>
      <label id='c' for='contenu'>
        <strong  >Contenu</strong>: 
      </label>
          <?php
             echo "<div>
                     <textarea id='v' name='contenu'>";
            if (isset($contenu)) echo $contenu; 
            echo "</textarea>
            </div>";
            if (isset($id)) {
              echo "<input type='hidden' name='edite' value='$id'>";
            }
          ?>
       <input type='submit' name='envoyer'>
    </form>
  </body>
</html>