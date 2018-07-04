<?php session_start() ?>
<?php ob_start(); ?>
<?php $title = 'Statistiques'; ?>

<div class="row justify-content-center">
	<?php
	foreach($nbUsers as $user)
	{
		foreach ($nbPosts as $post) 
		{
			?>
			<table class="table table-bordered">
				<tbody>
					<tr class="table">
						<th scope="row">Nombre d'utilisateurs du site</th>
						<td class="col-1"><?php echo $user['nb']; ?></td>
					</tr>
					<tr class="table">
						<th scope="row">Nombre de chapitres créés</th>
						<td class="col-1"><?php echo $post['nb']; ?></td>
					</tr>
				</tbody>
			</table>
			<?php
		}
	}
	?>

	<?php $content = ob_get_clean(); ?>

	<?php require('views\frontend\admin\templateAdmin.php'); ?>