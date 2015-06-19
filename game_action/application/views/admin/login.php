<h1>Admin: login</h1>

<?php if( $this->session->flashdata('fout')): ?>
	<p class="alert alert-danger"><?php echo $this->session->flashdata('fout');?></p>
<?php endif ?>

<?php if( $this->session->flashdata('correct')): ?>
	<p class="alert alert-success"><?php echo $this->session->flashdata('correct');?></p>
<?php endif ?>

<form action="admin/login/Login/validate" class="contact" method="POST">
	<label for="gebruikersnaam">Gebruikersnaam:</label>
		<input type="text" name="gebruikersnaam" id="gebruikersnaam">

	<label for="wachtwoord">Wachtwoord:</label>
		<input type="password" name="wachtwoord" id="wachtwoord">

	<input type="submit" name="inloggen" id="inloggen" value="Inloggen">
</form>