<?php ob_start(); ?>
<?php $title = 'Liste des chapitres'; ?>
<?php
foreach($recentPosts as $data)
{
?>
<div class="col-5" id="chapters_list">
	<h5 class="text-center"><?= htmlspecialchars($data['title']) ?></h5>
	<p class="text-center"><em>Publié le <?= $data['creation_date_fr'] ?></em></p><br>
	<a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary" id="chapter_button">Lire le chapitre</a>
</div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>
<?php require('views\frontend\template.php'); ?>


