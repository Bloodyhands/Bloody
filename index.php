<?php

require('controllers\frontend.php');

try
{
  if (isset($_GET['action'])) 
  {
    if ($_GET['action'] == 'allPosts') 
    {
      posts();
    }
    elseif ($_GET['action'] == 'post') 
    {
      if (isset($_GET['id']) && $_GET['id'] > 0) 
      {
        post();
      }
      else
      {
        throw new Exception('Aucun identifiant de billet envoyé');
      }
    }
    elseif ($_GET['action'] == 'addComment') 
    {
      if (isset($_GET['id']) && $_GET['id'] > 0) 
      {
        if (!empty($_POST['pseudo']) && !empty($_POST['comment'])) 
        {
          addComment($_GET['id'], $_POST['pseudo'], $_POST['comment']);
        }
        else
        {
          throw new Exception('Tous les champs ne sont pas remplis');
        }
      }
      else
      {
        throw new Exception('Aucun identifiant de billet envoyé');  
      }
    }
  }
  else
  {
    allPosts();
  }
}
catch(Exception $e)
{
  $errorMessage = $e->getMessage();
  require('views\errorView.php');
}