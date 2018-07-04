<?php session_start() ?>
<?php ob_start(); ?>
<?php $title = 'Commentaires et signalement'; ?>
<div class="row justify-content-left">
	<?php
	foreach ($allComments as $comment)
	{
		?>
		<table class="table">
			<tbody>
				<?php
				if (in_array($comment['id'], $signals)) {
					?>
					<tr class="table-warning">
						<td class="col-4"><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> : Ajouté le <?= $comment['comment_date_fr'] ?></td>
						<td class="col-7"><?= html_entity_decode(nl2br(htmlspecialchars($comment['comment']))) ?></td>
						<td class="col-1 text-center"><a class="fas fa-edit" style="color:blue" href="#" role="button"></a>&nbsp;&nbsp;<a class="fas fa-trash-alt" style="color:red" href="index.php?action=deleteComment&id=<?= $comment['id']?>" role="button"></a></td>
					</tr>
					<?php
				} else {
					?>
					<tr class="table">
						<td class="col-4"><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> : Ajouté le <?= $comment['comment_date_fr'] ?></td>
						<td class="col-7"><?= html_entity_decode(nl2br(htmlspecialchars($comment['comment']))) ?></td>
						<td class="col-1 text-center"><a class="fas fa-edit" style="color:blue" href="#" role="button"></a>&nbsp;&nbsp;<a class="fas fa-trash-alt" style="color:red" href="index.php?action=deleteComment&id=<?= $comment['id']?>" role="button"></a></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
		<?php
	}
	?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views\frontend\admin\templateAdmin.php'); ?>