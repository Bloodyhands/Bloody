<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<div class="row justify-content-center" id="subtitle_post">
	<div class="col-4">
		<div id="chapter_return" class="text-center"><a class="btn btn-secondary btn-sm" href="index.php" role="button">Retour à la liste des chapitres</a></div>
	</div>
	<div class="col-12 text-justify" id="content_post">
		<?= html_entity_decode(nl2br(htmlspecialchars($post['content']))) ?>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-12">
		<h5 class="text-center" id="comment_post_title">Commentaires</h5><br>
	</div>
	<div class="col-6">
		<p><a href="index.php?action=connection" title="Page de connexion'">Connectez-vous</a> ou <a href="index.php?action=registration" title="Page d'inscription">inscrivez-vous</a> pour ajouter un commentaire.</p>
	</div>
	<div class="col-6">
		<div class="card">
			<div class="card-body">
				<?php
				while ($comment = $comments->fetch())
				{
				?>
				<p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> : Ajouté le <?= $comment['comment_date_fr'] ?></p>
				<p><?= html_entity_decode(nl2br(htmlspecialchars($comment['comment']))) ?></p>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('views\frontend\templateAdmin.php'); ?>
