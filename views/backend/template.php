<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Billet simple pour l'Alaska</title>
  </head>
  <body>
    <!----------------HEADER---------------->
    <header class="container-fluid">
        <div class="row">
          <div class="col-6">
            <h1 class="text-center">Billet simple pour l'Alaska</h1>
            <h3 class="text-center">Par Jean Forteroche</h3>
          </div>
          <div class="col-6">
            <nav class="nav justify-content-center">
              <a class="nav-link" href="index.php?page=addPost">Gestion des Chapitres</a>
              <a class="nav-link" href="index.php?page=adminComment">Gestion des Commentaires</a>
            </nav>
          </div>
        </div>
    </header>

     <section>
      <div class="container">
        <div class="row justify-content-center" id="page_title">
          <?= $title ?>
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