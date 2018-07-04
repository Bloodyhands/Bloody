<?php session_start() ?>
<?php ob_start(); ?>
<?php $title = 'Profil'; ?>
<div class="row">
	<?php if(isset($_SESSION['pseudo'])) {
		?>
		<div class="card">
			<div class="card-body">
				<form>
					<div class="form-row">
						<div class="form-group col-12">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" value="<?php echo $_SESSION['email'] ?>">
						</div>
						<div class="form-group col-6">
							<label for="firstname">Prénom</label>
							<input type="firstname" class="form-control" id="firstname" value="<?php echo $_SESSION['firstname'] ?>">
						</div>
						<div class="form-group col-6">
							<label for="name">Nom</label>
							<input type="name" class="form-control" id="name" value="<?php echo $_SESSION['name'] ?>">
						</div>
						<div class="form-group">
							<label for="age">Age</label>
							<input type="text" class="form-control" id="age" value="<?php echo $_SESSION['age'] .' '. 'ans' ?>">
						</div>
						<div class="form-group">
							<label for="creationDate">Date d'inscription</label>
							<input type="text" class="form-control" id="creationDate" value="<?php echo $_SESSION['creation_date_fr'] ?>">
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php
	}
	?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views\frontend\user\templateUser.php'); ?>