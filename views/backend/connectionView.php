<?php ob_start(); ?>
<?php $title = 'Connexion'; ?>

<div class="alert alert-success" role="alert">
  	<?= $_SESSION['success']; ?>
</div>

<form action="index.php?action=connection" method="post">
	<div class="form-row justify-content-center">
		<div class="form-group col-8">
			<label for="Title">Pseudo</label>
			<input type="text" class="form-control" id="pseudo" name="pseudo">
		</div>
		<div class="form-group col-8">
			<label for="Title">Mot de passe</label>
			<input type="text" class="form-control" id="password" name="password">
		</div>
	</div>
	<div id="connexion" class="text-center">
		<button type="submit" class="btn btn-primary mb-2">Connexion</button>
	</div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('views\frontend\templatePublic.php'); ?>