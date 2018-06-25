<?php ob_start(); ?>
<?php $title = 'Ajout de chapitre'; ?>

<!--<div class="alert alert-success" role="alert">
	<?= $_SESSION['success']?>
</div>-->

<form action="index.php?action=addPost" method="post">
	<div class="form-row">
		<div class="form-group col-12 text-center">
			<label for="Title">Titre</label>
			<input type="text" class="form-control" id="title" name="title" placeholder="Entrer le titre">
		</div>
		<div class="form-group col-12 text-center">
			<label for="content">Contenu</label><br>
			<textarea class="form-control" id="textarea" name="content" rows="4" placeholder="Entrer le contenu"></textarea>
		</div>
	</div>
	<div id="addPost" class="text-center">
		<button type="submit" class="btn btn-primary mb-2">Ajouter</button>
	</div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('views\frontend\admin\templateAdmin.php'); ?>