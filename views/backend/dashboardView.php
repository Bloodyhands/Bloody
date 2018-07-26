<?php session_start() ?>
<?php ob_start(); ?>
<?php $title = 'Tableau de Bord'; ?>
<div class="row justify-content-left">
	
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views\frontend\admin\templateAdmin.php'); ?>