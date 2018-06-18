<?php ob_start(); ?>
<?php $title = 'Liste des chapitres'; ?>

<div class="row justify-content-center">
	<?php
	foreach($posts as $data)
	{
	?>
	<div class="col-5" id="chapters_list">
		<div class="card border-dark text-center">
			<div class="card-body">
				<h5 class="card-title"><?= htmlspecialchars($data['title']) ?></h5>
				<p class="card-text" id="publication_date"><em>Publié le <?= $data['creation_date_fr'] ?></em></p>
				<a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-secondary btn-sm" id="chapter_button">Lire le chapitre</a>
			</div>
		</div>
	</div>
	<?php
	}
	?>
	<!--<div class="col-12" id="pagination">
		<nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-center">
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
	</div>-->
</div>

<?php $content = ob_get_clean(); ?>
<?php require('views\frontend\templateAdmin.php'); ?>