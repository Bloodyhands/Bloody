<?php ob_start(); ?>
<?php $title = 'Liste des chapitres'; ?>
<div class="row justify-content-center">
<?php
foreach($posts as $data)
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
</div>
<div class="row justify-content-center" id="pagination">
	<nav aria-label="Page navigation example">
	  <ul class="pagination">
	    <li class="page-item">
	      <a class="page-link" href="#" aria-label="Previous">
	        <span aria-hidden="true">&laquo;</span>
	        <span class="sr-only">Previous</span>
	      </a>
	    </li>
	    <li class="page-item"><a class="page-link" href="#">1</a></li>
	    <li class="page-item"><a class="page-link" href="#">2</a></li>
	    <li class="page-item"><a class="page-link" href="#">3</a></li>
	    <li class="page-item">
	      <a class="page-link" href="#" aria-label="Next">
	        <span aria-hidden="true">&raquo;</span>
	        <span class="sr-only">Next</span>
	      </a>
	    </li>
	  </ul>
	</nav>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('views\frontend\template.php'); ?>


