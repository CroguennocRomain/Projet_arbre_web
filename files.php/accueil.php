<!DOCTYPE html>
<html lang="fr">
 <head>
   <meta charset="utf-8">
   <title> Accueil </title>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Kaisei+Tokumin:wght@400;700&display=swap" rel="stylesheet">
   <link href="../files.css/accueil.css" rel="stylesheet">
 </head>
 <body>
    <header class="header mb-4">
      <a href="accueil.php"><button class="btn btn-accueil btn-actual">Accueil</button></a>
    </header>    
    <div class="container-fluid px-5">
      <div class="row mb-4">
        <div class="col-md-7">
          <div class="content-area">
            <h2>Description du projet</h2>
            <p>
              Ce projet nous a permis de nous rendre compte de la relation entre la partie base de données, IA et web et a poussé nos compétences vers l'avant en les mettant en pratique ce qui nous a permis de nous tester.
            </p>
          </div>
        </div>
        <div class="col-md-5">
          <a href="visual_arbre_BDD.php">
            <button class="action-button">Visualiser mes arbres</button>
          </a>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-7">
          <img src="../image_test.jpg" alt="image_site" class="image img-fluid">
        </div>
        <div class="col-md-5">
          <a href="ajout_arbre.php" class="lien">
            <button class="action-button add-arbre">Ajouter un arbre</button>
          </a>
        </div>
      </div>
    </div>
    
  
      <footer class="footer">
        <div class="container-fluid px-0">
          <div class="row">
            <div class="col-md-11">
              <div class="footer-text">
                <span>Emma Naulet</span>
                <span>Ryan Collobert</span>
                <span>Romain Croguennoc</span>
              </div>
            </div>
            <div class="col-md-1">
              <div class="footer-links">
                <i class="bi bi-linkedin footer-icon"></i>
              </div>
            </div>
          </div>
        </div>
      </footer>

    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </body>
</html>