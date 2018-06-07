<?php

require('controllers\commentsController.php');
require('controllers\postsController.php');
require('controllers\contactController.php');
require('controllers\registrationController.php');

try
{
  if (isset($_GET['action'])) {
    //accès à la page de tous les chapitres//
    if ($_GET['action'] == 'allPosts') {
      posts();
    }
    //accès à un chapitre en particulier//
    elseif ($_GET['action'] == 'post') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        post();
      } else {
        $_SESSION['error'] = 'Aucun identifiant de chapitre envoyé';
      }
    }
    //formulaire d'ajout de commentaires//
    elseif ($_GET['action'] == 'addComment') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        if (!empty($_POST['pseudo']) && !empty($_POST['comment'])) {
          addComment($_GET['id'], $_POST['pseudo'], $_POST['comment']);
        } else {
          $_SESSION['error'] = 'Tous les champs ne sont pas remplis';
        }
      } else {
        $_SESSION['error'] = 'Aucun identifiant de chapitre envoyé'; 
      }
    }
    //formulaire d'ajout de chapitre//
    elseif ($_GET['action'] == 'addPost') {
      if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
          addPost($_POST['title'], $_POST['content']);
        }
      } else {
        addPost();
      }
    }
    //accès à la modification de chapitre//
    elseif ($_GET['action'] == 'updatePost') {
      if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
        if (!empty($_GET['id']) && !empty($_POST['title']) && !empty($_POST['content'])) {
          updatePost($_GET['id'], $_POST['title'], $_POST['content']);
        }
      } else {
        updatePost($_GET['id']);
      }
    }
    //suppression des chapitres//
    elseif ($_GET['action'] == 'deletePost') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        deletePost($_GET['id']);
      } else {
        $_SESSION['error'] = 'Le chapitre n\'a pas pu être supprimé';
      }
    }
    //page inscription//
    elseif ($_GET['action'] == 'registration') {
      if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
        if (!empty($_POST['pseudo']) && !empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['age']) && !empty($_POST['email']) && !empty($_POST['password'])) {
          registration($_POST['pseudo'], $_POST['name'], $_POST['firstname'], $_POST['age'], $_POST['email'], $_POST['password']);
        }
      } else {
        registration();
      }
    }
    //page contact//
    elseif ($_GET['action'] == 'contact') {
      contact();
    }
  } else {
    allPosts();
  }
}
catch(Exception $e)
{
  $errorMessage = $e->getMessage();
  require('views\errorView.php');
}