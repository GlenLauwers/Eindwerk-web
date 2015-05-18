<?php

	$database_ontwikkelaar = $this->OntwikkelaarsModel->viewontwikkelaars();



?>

<div class="row col-md-12 titel">
    <h1>Ontwikkelaars</h1>
</div>

<p><a href="admin-ontwikkelaars?toevoegen">Nieuwe ontwikkelaar toevoegen</a></p>

<?php if( $this->session->flashdata('fout')): ?>
	<p class="alert alert-danger"><?php echo $this->session->flashdata('fout');?></p>
<?php endif ?>

<?php if( $this->session->flashdata('correct')): ?>
	<p class="alert alert-success"><?php echo $this->session->flashdata('correct');?></p>
<?php endif ?>

<?php if (isset($_GET['toevoegen'])): ?>
	<form action="admin/Ontwikkelaars/nieuwe_ontwikkelaar" method="POST">
		<label for="ontwikkelaar">Ontwikkelaar:</label>
			<input type="text" name="ontwikkelaar" id="ontwikkelaar">

		<input type="submit" name="ontwikkelaar_toevoegen" id="ontwikkelaar_toevoegen" value="Toevoegen">
	</form>
<?php endif ?>

<?php if (count($database_ontwikkelaar) <= 0): ?>
	Er zijn geen genres gevonden in de database.
<?php endif ?>

<?php if (count($database_ontwikkelaar) > 0): ?>
	<table class="col-md-6 admin">
		<form action="admin-ontwikkelaars" method="POST">
			<thead>
				<th>Consolenummer:</th>
				<th>Naam:</th>
				<th></th>
				<th></th>
			</thead>

			<tbody>			
				<?php foreach ($database_ontwikkelaar as $ontwikkelaar): ?>
					<tr>
						<td><?= $ontwikkelaar->id ?></td>
						<td><?= $ontwikkelaar->naam_ontwikkelaar ?></td>
						<td><button type="submit" name="wijzigen" value="<?= $ontwikkelaar->id ?>">Wijzigen</button></td>
						<td><button type="submit" name="verwijderen" value="<?= $ontwikkelaar->id ?>">Verwijderen</button></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</form>
	</table>
<?php endif ?>