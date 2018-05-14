<?php ob_start(); ?>
<?php $title = 'Ajout de chapitre'; ?>

<form action="index.php?action=addPost" method="post">
	<div class="form-group">
		<label for="Title">Titre</label>
		<input type="text" class="form-control" id="title" placeholder="Entrer le titre">
	</div>
	<div class="form-group">
		<label for="content">Contenu</label><br>
		<textarea class="form-control" id="textarea" rows="3"></textarea>
	</div>
	<button type="submit" class="btn btn-primary mb-2">Publier</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('views\backend\template.php'); ?>