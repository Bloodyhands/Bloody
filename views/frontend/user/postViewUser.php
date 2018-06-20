<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<div class="row justify-content-center" id="subtitle_post">
	<div class="col-4">
		<div id="chapter_return" class="text-center"><a class="btn btn-secondary btn-sm" href="index.php" role="button">Retour à la liste des chapitres</a></div>
	</div>
	<div class="col-4">
		<div id="chapter_update" class="text-center"><a class="btn btn-primary btn-sm" href="index.php?action=updatePost&id=<?= $post['id']?>" role="button">Modifier le chapitre</a></div>
	</div>
	<div class="col-4">
		<div id="chapter_delete" class="text-center"><a class="btn btn-danger btn-sm" href="index.php?action=deletePost&id=<?= $post['id']?>" role="button">Supprimer le chapitre</a></div>
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
		<form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post">
			<div class="form-group text-center">
				<label for="pseudo">Pseudo</label>
				<input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Entrer le pseudo">
			</div>
			<div class="form-group text-center">
				<label for="comment">Commentaires</label><br>
				<textarea class="textarea" id="comment" name="comment" rows="4"></textarea>
			</div>
			<div id="send" class="text-center">
				<button type="submit" class="btn btn-primary btn-sm">Envoyer</button>
			</div>
		</form>
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
