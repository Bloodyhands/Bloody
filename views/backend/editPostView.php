<?php ob_start(); ?>
<?php $title = 'Edition de chapitre'; ?>

<div class="alert alert-success" role="alert">
  <?= $_SESSION['success']; ?>
</div>

<form action="index.php?action=updatePost" method="post">
	<div class="form-row">
	<div class="form-group col-12">
		<label for="Title">Titre</label>
		<input type="text" class="form-control" id="title" name="title" placeholder="Entrer le titre">
	</div>
	<div class="form-group col-12">
		<label for="content">Contenu</label><br>
		<textarea class="form-control" id="textarea" name="content" rows="4" placeholder="Entrer le contenu"></textarea>
	</div>
</div>
	<button type="submit" class="btn btn-primary mb-2">Publier</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('views\frontend\template.php'); ?>