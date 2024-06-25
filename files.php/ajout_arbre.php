<!DOCTYPE html>
<html lang="fr">
 <head>
   <meta charset="utf-8">
   <title> Ajout_arbre </title>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Kaisei+Tokumin:wght@400;700&display=swap" rel="stylesheet">
   <link href="../files.css/ajout_arbre.css" rel="stylesheet">
 </head>
 <body>
 <header class="header">
    <div class="container-fluid px-0">
      <div class="row mb-4 header-row">
        <div class="col-md-1">
          <a href="accueil.php"><button class="btn btn-accueil">Accueil</button></a>
        </div>
        <div class="col-md-2">
          <a href="visual_arbre_BDD.php"><button class="btn btn-arbre">Mes arbres</button></a>
        </div>
        <div class="col-md-1">
          <a href="ajout_arbre.php"><button class="btn btn-ajouter ">Ajouter</button></a>
        </div>
      </div>
    </div>  
    </header>
  
  <div class="container-fluid px-5">
    <div class="row mb-5">
      <div class="col-md-7">
        <button class="action-button">Importation données initiales
          <i class="bi bi-box-arrow-in-down"></i>
        </button>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-md-12 text-center">
        <h2>Ajouter un arbre</h2>
      </div>
    </div>
    <div class="formulaire">
      <form action="traitement.php" method="post">
        <div class="row mb-3">
          <div class="col-md-2 text-center">
            <div class="custom-textbox">
              <h3>Hauteur totale</h3>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="custom-textbox">
              <h3>Hauteur tronc</h3>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="custom-textbox">
              <h3>Diamètre tronc</h3>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="custom-textbox">
              <h3>Nom</h3>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="custom-textbox">
              <h3>Feuillage</h3>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="custom-textbox">
              <h3>Stade de dev</h3>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-2 text-center">
            <div class="form-group">
              <textarea class="form-control" id="haut_tot" name="haut_tot" rows="1"></textarea>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="form-group">
              <textarea class="form-control" id="haut_tronc" name="haut_tronc" rows="1"></textarea>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="form-group">
              <textarea class="form-control" id="tronc_diam" name="tronc_diam" rows="1"></textarea>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="form-group">
              <textarea class="form-control" id="fk_nomtech" name="fk_nomtech" rows="1"></textarea>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="form-group">
              <select class="custom-select" id="feuillage" name="feuillage">
                <option value="Feuillu">Feuillu</option>
                <option value="Conifère">Conifère</option>
              </select>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="form-group">
              <select class="custom-select" id="fk_stadedev" name="fk_stadedev">
                <option value="Jeune">Jeune</option>
                <option value="Adulte">Adulte</option>
                <option value="Vieux">Vieux</option>
                <option value="Senescent">Senescent</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-2 text-center">
            <div class="custom-textbox">
              <h3>Latitude</h3>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="custom-textbox">
              <h3>Longitude</h3>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="custom-textbox">
              <h3>Secteur</h3>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="custom-textbox">
              <h3>Port</h3>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="custom-textbox">
              <h3>Revêtement</h3>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-2 text-center">
            <div class="form-group">
              <textarea class="form-control" id="latitude" name="latitude" rows="1"></textarea>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="form-group">
              <textarea class="form-control" id="longitude" name="longitude" rows="1"></textarea>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="form-group">
              <textarea class="form-control" id="clc_secteur" name="clc_secteur" rows="1"></textarea>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="form-group">
              <textarea class="form-control" id="fk_port" name="fk_port" rows="1"></textarea>
            </div>
          </div>
          <div class="col-md-2 text-center">
            <div class="form-group">
              <select class="custom-select" id="fk_revetement" name="fk_revetement">
                <option value="Oui">Oui</option>
                <option value="Non">Non</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row mb">
          <button id="btn_add_tree" type="submit" class="btn btn-submit ml-auto mr-3">Valider <i class="bi bi-check-all"></i>
          </button>
        </div>
        
      </form>
    </div>
  </div>

  <div class="test">
    
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