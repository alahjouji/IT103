<?php 
  include("functions.php");
  session_start();
  testAcces();
  if (isset($_POST['contenu'])) {
   if (isset($_POST['edite'])) {
      $reponse=reponse($_POST['edite']);
      if($_SESSION['userid']!=$reponse['auteur']){
        die("Accès interdit.");
      }
      $questionid=$reponse['question'];
      supprVote2($reponse['id']);
      editeReponse($_POST['edite'], $_POST['contenu']);
      header("Location: back_reponses.php?questionid=$questionid");
      die();
    }else {
      if ($_POST['contenu']=="") {
        $msg="Veuillez remplir le champ ci-dessous";
      }else{
      $questionid=$_GET['ajout'];
      $auteur=$_SESSION['userid'];
      ajoutReponse($questionid,$auteur,$_POST['contenu']);
      header("Location: back_reponses.php?questionid=$questionid");
      }
    }
  }elseif(isset($_GET['edite'])) { 
    $reponse = reponse($_GET['edite']);
    if ($reponse == null) die("Reponse invalide.");
    $id = $reponse['id'];
    $contenu = $reponse['contenu'];
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
    <form name='reponse' method='post' id='f'>
      <label id='c' for='contenu'>
        <strong  >Contenu</strong>: 
      </label>
      <?php
         echo "<div>
                <textarea name='contenu' id='v'>";
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