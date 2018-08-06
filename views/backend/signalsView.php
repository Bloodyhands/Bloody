<?php ob_start(); ?>
<?php $title = 'Commentaires et signalements'; ?>

<div class="row justify-content-left">
	<table class="table table-bordered">
		<tbody>
			<?php
			foreach ($allComments as $comment)
			{
				echo (in_array($comment['id'], $signals) ? '<tr class="bg-warning">' : '<tr>');
				?>
				<td class="col-sm-4"><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> : Ajouté le <?= $comment['comment_date_fr'] ?></td>
				<td class="col-sm-7"><?= html_entity_decode(nl2br(htmlspecialchars($comment['comment']))) ?></td>
				<td class="col-sm-1 text-center"><a class="fas fa-trash-alt" style="color:red" href="index.php?action=deleteComment&id=<?= $comment['id']?>" role="button"></a></td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views\frontend\admin\templateAdmin.php'); ?>