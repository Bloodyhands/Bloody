<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="public/css/style.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

  <!-- TinyMCE -->
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

  <title>Billet simple pour l'Alaska</title>
</head>
<body>
  <!----------------HEADER---------------->
  <header class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="text-center">Billet simple pour l'Alaska</h1>
        <h3 class="text-center">Par Jean Forteroche</h3>
      </div>
    </div>
    <div class="row justify-content-between">
      <div class="col-sm-5 text-center">
        <input id="menu-checkbox" type="checkbox" class="menu-checkbox"/>
        <label for="menu-checkbox" class="menu-toogle"><i class="fas fa-bars"></i>&nbsp;Menu</label>
        <nav class="nav justify-content-center">
          <a class="nav-link" href="index.php">Chapitres</a>
          <a class="nav-link" href="index.php?action=contact">Contact</a>
          <a class="nav-link" href="index.php?action=connection">Connexion</a>
          <a class="nav-link" href="index.php?action=registration">Inscription</a>
        </nav>
      </div>
    </div>
    <div class="row justify-content-center">
      <img src="public/images/alaska_banniere.jpg">
    </div>
  </header>

  <!---------------Section--------------->
  <section>
    <div class="container">
      <div class="row justify-content-center" id="page_title">
        <div class ="card border-dark text-center">
          <div class="card-body">
            <?= $title ?>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <?= $content ?>
      </div>
    </div>
  </section>
  <!----------------FOOTER---------------->
  <footer class="container-fluid">
    <div class="row">
      <div class="col-12">
        <p class="text-center">2017-2018 Company Name</p>
      </div>
      <div class="col-12 text-center">
        <a href="#">Mentions légales</a>
      </div>
    </div>
  </footer>
</body>
</html>