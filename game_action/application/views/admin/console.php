<?php

	$database_console = $this->ConsoleModel->viewConsoles();

	$database_wijzigen = $this->ConsoleModel->wijzigenConsoles();

	$database_verwijderen = $this->ConsoleModel->verwijderConsoles();

	if (!isset($_COOKIE['authenticated'])) 
	{
		redirect('admin-login');
	}

?>

<h1>Console</h1>

<p><a href="admin-console?toevoegen">Nieuwe console toevoegen</a></p>

<?php if( $this->session->flashdata('fout')): ?>
	<p class="alert alert-danger"><?php echo $this->session->flashdata('fout');?></p>
<?php endif ?>

<?php if( $this->session->flashdata('correct')): ?>
	<p class="alert alert-success"><?php echo $this->session->flashdata('correct');?></p>
<?php endif ?>

<?php if (isset($_GET['toevoegen'])): ?>
	<form action="admin/Console/nieuwe_console" method="POST">
		<label for="console">Console:</label>
			<input type="text" name="console" id="console">

		<input type="submit" name="console_toevoegen" id="console_toevoegen" value="Toevoegen">
	</form>
<?php endif ?>

<?php if (isset($_POST['wijzigen'])): ?>
	<?php foreach ($database_wijzigen as $console): ?>
		<h2>Console wijzigen: <?= $console->naam_console ?></h2>

		<form action="admin/Console/wijzigen" method="POST">
			<input type="hidden" name="id" value="<?= $console->id ?>">
			
			<label for="console">Console:</label>
			<input type="text" name="console" id="console" value="<?= $console->naam_console ?>">

			<input type="submit" name="console_wijzigen" id="console_toevoegen" value="Wijzigen">
		</form>
	<?php endforeach ?>
<?php endif ?>

<?php if (isset($_POST['verwijderen'])): ?>
	<?php foreach ($database_verwijderen as $console): ?>
		<p>Bent u zeker dat u '<?= $console->naam_console ?>' wilt verwijderen?</p>

		<form action="admin/Console/verwijderen" method="POST">
			<input type="hidden" name="id" value="<?= $console->id ?>">
			<button type="submit" name="verwijderen_ja" value="ja">Ja</button>
			<button type="submit" name="verwijderen_neen" value="neen">Neen</button>
		</form>
	<?php endforeach ?>
<?php endif ?>

<?php if (count($database_console) <= 0): ?>
	Er zijn geen controllers gevonden in de database.
<?php endif ?>

<?php if (count($database_console) > 0): ?>
	<table class="col-md-6 admin">
		<form action="admin-console" method="POST">
			<thead>
				<th>Consolenummer:</th>
				<th>Naam:</th>
				<th></th>
				<th></th>
			</thead>

			<tbody>			
				<?php foreach ($database_console as $console): ?>
					<tr>
						<td><?= $console->id ?></td>
						<td><?= $console->naam_console ?></td>
						<td><button type="submit" name="wijzigen" value="<?= $console->id ?>">Wijzigen</button></td>
						<td><button type="submit" name="verwijderen" value="<?= $console->id ?>">Verwijderen</button></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</form>
	</table>
<?php endif ?>