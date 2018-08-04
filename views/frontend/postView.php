<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<div class="row justify-content-center" id="subtitle_post">
	<div class="col-4">
		<div id="chapter_return" class="text-center"><a class="btn btn-secondary btn-sm" href="index.php" role="button">Retour à la liste des chapitres</a></div>
	</div>
	<div class="col-4">
		<?php if (isset($_SESSION['pseudo'])) { if ($_SESSION['role'] == 'admin') { ?><div id="chapter_update" class="text-center"><a class="btn btn-primary btn-sm" href="index.php?action=updatePost&id=<?= $post['id']?>" role="button">Modifier le chapitre</a></div><?php }} ?>
	</div>
	<div class="col-4">
		<?php if (isset($_SESSION['pseudo'])) { if ($_SESSION['role'] == 'admin') { ?><div id="chapter_delete" class="text-center"><a class="btn btn-danger btn-sm" href="index.php?action=deletePost&id=<?= $post['id']?>" role="button">Supprimer le chapitre</a></div><?php }} ?>
	</div>
	<div class="col-12 text-justify" id="content_post">
		<?= html_entity_decode(nl2br(htmlspecialchars($post['content']))) ?>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-12">
		<h5 class="text-center" id="comment_post_title">Commentaires</h5><br>
	</div>
	<?php if(isset($_SESSION['pseudo'])) { 
		if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'user') { ?>
			<div class="col-6">
				<form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post">
					<div class="form-group text-center">
						<label for="staticPseudo" class="col-sm-2 col-form-label">Pseudo</label>
						<input type="text" readonly class="form-control" id="pseudo" name="pseudo" value="<?php echo $_SESSION['pseudo'] ?>">
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
							<p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> : Ajouté le <?= $comment['comment_date_fr'] ?>&nbsp;&nbsp;&nbsp;<a class="fas fa-exclamation-circle" style="color:#f4a341" href="index.php?action=report&id=<?= $comment['id'] ?>&post_id=<?= $post['id'] ?>" role="button"></a></p>
							<p><?= html_entity_decode(nl2br(htmlspecialchars($comment['comment']))) ?></p>
							<?php
						}
						?>
					</div>
				</div>
			</div>
			<?php $flash->showFlashMessage(); ?>
		<?php }
	} else {
		echo 'Pour lire les commentaires et commenter les articles vous pouvez vous &nbsp;<a href="index.php?action=connection">connecter</a>&nbsp; ou vous &nbsp;<a href="index.php?action=registration">inscrire</a>';
	} ?>
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