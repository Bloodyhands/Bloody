<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<p><a href="index.php">Retour à la liste des chapitres</a></p>

<div class="row">
	<p class="text-justify">
		<?= nl2br(htmlspecialchars($post['content'])) ?>
	</p>
</div>

<div class="row justify-content-center">
	<div class="col-12">
		<h5 class="text-center">Commentaires</h5><br>
	</div>
	<div class="col-6">
		<form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post">
		<div class="form-group">
			<label for="pseudo">Pseudo</label>
			<input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Entrer le pseudo">
		</div>
		<div class="form-group">
			<label for="comment">Commentaires</label><br>
			<textarea class="textarea" id="comment" name="comment" rows="3"></textarea>
		</div>
		<button type="submit" class="btn btn-primary mb-2">Envoyer</button>
		</form>
	</div>
	<div class="col-6">
		<?php
		while ($comment = $comments->fetch())
		{
		?>
		<p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> : Ajouté le <?= $comment['comment_date_fr'] ?></p>
		<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
		<?php
		}
		?>
	</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('views\frontend\template.php'); ?>
