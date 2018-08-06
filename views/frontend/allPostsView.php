<?php ob_start(); ?>
<?php $flash->showFlashMessage(); ?>
<?php $title = 'Liste des chapitres'; ?>

<div class="row justify-content-center">
	<?php
	foreach($posts as $data)
	{
		?>
		<div class="col-sm-6" id="chapters_list">
			<div class="card border-dark text-center">
				<div class="card-body">
					<h5 class="card-title"><?= htmlspecialchars($data['title']) ?></h5>
					<p class="card-text" id="publication_date"><em>Publié le <?= $data['creation_date_fr'] ?></em></p>
					<a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-secondary btn-sm" id="chapter_button">Lire le chapitre</a>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>

<?php $content = ob_get_clean(); ?>

<?php 
if (isset($_SESSION['pseudo'])) {
	if ($_SESSION['role'] == 'user') {
		include('views\frontend\user\templateUser.php');
	} elseif ($_SESSION['role'] == 'admin') {
		include('views\frontend\admin\templateAdmin.php');
	} 
} else {
	include('views\frontend\templatePublic.php');
}
?>