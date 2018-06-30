<?php session_start() ?>
<?php ob_start(); ?>
<?php $title = 'Tableau de Bord'; ?>
<div class="row justify-content-left">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<?php
				if (isset($_SESSION['pseudo'])) {
					if ($_SESSION['role'] == 'admin') {
						while ($comment = $allComments->fetch())
						{
						?>
						<p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> : Ajouté le <?= $comment['comment_date_fr'] ?>&nbsp;&nbsp;&nbsp;<a class="fas fa-edit" style="color:blue" href="#" role="button"></a>&nbsp;&nbsp;&nbsp;<a class="fas fa-trash-alt" style="color:red" href="index.php?action=deleteComment&id=<?= $comment['id']?>" role="button"></a></p>
						<p><?= html_entity_decode(nl2br(htmlspecialchars($comment['comment']))) ?></p>
						<?php
						}
					} elseif ($_SESSION['role'] == 'user') {
						?>
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
						  	</div>
						  	<div class="form-group">
						    	<label for="age">Age</label>
						    	<input type="text" class="form-control" id="age" value="<?php echo $_SESSION['age'] .' '. 'ans' ?>">
						  	</div>
						  	<div class="form-group">
						    	<label for="creationDate">Date d'inscription</label>
						    	<input type="text" class="form-control" id="creationDate" value="<?php echo $_SESSION['creation_date_fr'] ?>">
						  	</div>	
						</form>
					<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views\frontend\admin\templateAdmin.php'); ?>