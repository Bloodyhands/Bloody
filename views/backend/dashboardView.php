<?php session_start() ?>
<?php ob_start(); ?>
<?php $title = 'Tableau de Bord'; ?>
<div class="row justify-content-left">
	<div class="col-8">
		<div class="card">
			<div class="card-body">
				<?php
				while ($comment = $allComments->fetch())
				{
				?>
				<p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> : Ajouté le <?= $comment['comment_date_fr'] ?>&nbsp;&nbsp;&nbsp;<a class="fas fa-edit" style="color:blue" href="#" role="button"></a>&nbsp;&nbsp;&nbsp;<a class="fas fa-trash-alt" style="color:red" href="index.php?action=deleteComment&id=<?= $comment['id']?>" role="button"></a></p>
				<p><?= html_entity_decode(nl2br(htmlspecialchars($comment['comment']))) ?></p>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views\frontend\admin\templateAdmin.php'); ?>