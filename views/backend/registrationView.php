<?php ob_start(); ?>
<?php $title = 'Inscription'; ?>

<div class="alert alert-success" role="alert">
  	<?= $_SESSION['success']; ?>
</div>

<form action="index.php?action=registration" method="post">
	<div class="form-row justify-content-center">
		<div class="form-group col-8">
			<label for="Title">Pseudo</label>
			<input type="text" class="form-control" id="pseudo" name="pseudo">
		</div>
		<div class="form-group col-8">
			<label for="Title">Nom</label>
			<input type="text" class="form-control" id="name" name="name">
		</div>
		<div class="form-group col-8">
			<label for="Title">Prénom</label>
			<input type="text" class="form-control" id="firstname" name="firstname">
		</div>
		<div class="form-group col-8">
			<label for="Title">Age</label>
			<input type="text" class="form-control" id="age" name="age">
		</div>
		<div class="form-group col-8">
			<label for="Title">Email</label>
			<input type="text" class="form-control" id="email" name="email">
		</div>
		<div class="form-group col-8">
			<label for="Title">Mot de passe</label>
			<input type="text" class="form-control" id="password" name="password">
		</div>
	</div>
	<div id="registration" class="text-center">
		<button type="submit" class="btn btn-primary mb-2">S'inscrire</button>
	</div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('views\frontend\templatePublic.php'); ?>