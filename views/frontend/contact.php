<?php session_start(); ?>
<?php ob_start(); ?>
<?php $title = 'Contact'; ?>

<div class="col-12" id="contact_name">
	<h5>Jean Forteroche</h5>
</div>
<div class="col-12" id="contact_bio">
	<p>Proin ullamcorper eleifend porta. Maecenas euismod in diam vitae euismod. Duis ante mi, condimentum malesuada sapien nec, condimentum mattis urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin et lacus felis. Aenean at pellentesque urna, vitae tempor risus. Duis vel arcu in augue semper sodales. Nunc dictum commodo lectus, eu consequat dui. Nulla convallis orci nec lorem gravida, eget aliquet eros consequat. Nulla at mauris vitae metus dictum fermentum id id magna. Nulla interdum porta augue, sagittis venenatis urna iaculis vel. Ut ut ultricies elit. Duis finibus odio odio, ac malesuada elit egestas ac. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sed elit nec ipsum accumsan rhoncus. </p>
</div>
<div class="row justify-content-center">
<div class="col-12">
	<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title text-center">Contact</h5>
      <p class="card-text">Jean Forteroche</p>
      <p class="card-text">4 avenue du maréchal Juin</p>
      <p class="card-text">39100 Dole</p>
      <p class="card-text">+33 782534156</p>
      <a href="#" class="card-link">adressmail@mail.com</a>
    </div>
  </div>
  </div>
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