<?php
	if (!isset($_COOKIE['authenticated'])) 
	{
		redirect('admin-login');
	}
?>

<h1>Admin</h1>

<?php if( $this->session->flashdata('fout')): ?>
	<p class="alert alert-danger"><?php echo $this->session->flashdata('fout');?></p>
<?php endif ?>

<?php if( $this->session->flashdata('correct')): ?>
	<p class="alert alert-success"><?php echo $this->session->flashdata('correct');?></p>
<?php endif ?>

<div class="admin col-md-12 row">
	<ul>
		<li><a href="admin-console">Consoles</a></li>
		<li><a href="admin-genres">Genres</a></li>
		<li><a href="admin-ontwikkelaars">Ontwikkelaars</a></li>
		<li><a href="admin-artikels">Artikels</a></li>
		<li><a href="admin-console">Bestellingen</a></li>
	</ul>
</div>