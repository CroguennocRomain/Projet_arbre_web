<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Visualisation_arbre_BDD</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Tokumin:wght@400;700&display=swap" rel="stylesheet">
    <link href="../files.css/arbre_BDD.css" rel="stylesheet">
  </head>
  <body>
    <header class="header mb-4">
      <a href="accueil.php"><button class="btn btn-accueil">Accueil</button></a>
      <a href="visual_arbre_BDD.php"><button class="btn btn-arbre btn-actual">Mes arbres</button></a>
      <a href="ajout_arbre.php"><button class="btn btn-ajouter">Ajouter</button></a>
    </header>
    <div class="row"> 
      <div class="col text-center">
        <h2>Mes arbres<h2>
      </div>
    </div>
    <div class="container-fluid px-5 table-container">
      <button class="filter-button">Filtrage</button>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th> </th>
            <th>latitude</th>
            <th>longitude</th>
            <th>cle_secteur</th>
            <th>haut_tot</th>
            <th>haut_tronc</th>
            <th>fk_revetement</th>
            <th>tronc_diam</th>
            <th>stade_dev</th>
            <th>fk_nomtech</th>
            <th>fk_port</th>
            <th>feuillage</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>2</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>3</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>4</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <img src="../image_test.jpg" alt="Map" class="img-fluid">
        </div>

      
        <div class="col">
          <div class="container action-buttons ">
            <div class="row">
              <div class="col-md-6">
                <div class="selection-container custom-bg-color ">
                  <label for="line-number">Sélectionner un arbre :</label>
                  <input type="text" id="line-number" placeholder="Entrez le numéro de ligne">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <a href="taille_arbre.php" class="lien">
                  <button>Prédire le cluster</button>
                </a>
              </div>
              <div class="col-md-6">
                <a href="age_arbre.php" class="lien">
                  <button>Prédire âge</button>
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <a href="tempete_arbre.php" class="lien">
                  <button>Prédire déracinement</button>
                </a>
              </div>
            </div>
          </div>
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
