<?php

require('controllers/commentsController.php');
require('controllers/postsController.php');
require('controllers/contactController.php');
require('controllers/registrationController.php');
require('controllers/connectionController.php');
require('controllers/deconnectionController.php');
require('controllers/userController.php');
require('controllers/statisticController.php');

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
            }
        }
    //formulaire d'ajout de commentaires//
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                addComment($_GET['id'], $_POST['pseudo'], $_POST['comment']);
            }
        }
    //signalement de commentaires//
        elseif ($_GET['action'] == 'report') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                report($_GET['id'], $_GET['post_id']);
            }
        }
        //accès au tableau de bord pour les commentaires//
        elseif ($_GET['action'] == 'allComments') {
            allComments();
        }
        //accès au tableau de bord pour les statistiques//
        elseif ($_GET['action'] == 'statistics') {
            statistics();
        }
        //suppression des commentaires//
        elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteComment($_GET['id']);
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
            }
        }
        //page inscription//
        elseif ($_GET['action'] == 'registration') {
            if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
                if (!empty($_POST['pseudo']) && !empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['age']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                    registration($_POST['pseudo'], $_POST['name'], $_POST['firstname'], $_POST['age'], $_POST['email'] = htmlspecialchars($_POST['email']), $_POST['password']);
                }
            } else {
                registration();
            }
        }
        //page connexion//
        elseif ($_GET['action'] == 'connection') {
            if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
                if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                    connection();
                }
            }
            else {
                connection();
            }
        }
        //lien de  deconnection//
        elseif ($_GET['action'] == 'deconnection') {
            deconnection();
        }
        //page profil des utilisateurs//
        elseif ($_GET['action'] == 'showProfil') {
            showProfil();
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
    require('views/errorView.php');
}