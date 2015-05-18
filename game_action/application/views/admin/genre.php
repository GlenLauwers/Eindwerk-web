<?php
	$database_genre = $this->GenreModel->viewgenres();

	$database_wijzigen = $this->GenreModel->wijzigenGenre();

	$database_verwijderen = $this->GenreModel->verwijderGenre();
?>

<div class="row col-md-12 titel">
    <h1>Genres</h1>
</div>

<p><a href="admin-genres?toevoegen">Nieuw genre toevoegen</a></p>

<?php if( $this->session->flashdata('fout')): ?>
	<p class="alert alert-danger"><?php echo $this->session->flashdata('fout');?></p>
<?php endif ?>

<?php if( $this->session->flashdata('correct')): ?>
	<p class="alert alert-success"><?php echo $this->session->flashdata('correct');?></p>
<?php endif ?>

<?php if (isset($_GET['toevoegen'])): ?>
	<form action="Genre/nieuw_genre" method="POST">
		<label for="genre">Genre:</label>
			<input type="text" name="genre" id="genre">

		<input type="submit" name="genre_toevoegen" id="genre_toevoegen" value="Toevoegen">
	</form>
<?php endif ?>

<?php if (isset($_POST['wijzigen'])): ?>
	<?php foreach ($database_wijzigen as $genre): ?>
		<h2>Console wijzigen: <?= $genre->genre ?></h2>

		<form action="Genre/wijzigen" method="POST">
			<input type="hidden" name="id" value="<?= $genre->id ?>">
			
			<label for="genre">Genre:</label>
			<input type="text" name="genre" id="genre" value="<?= $genre->genre ?>">

			<input type="submit" name="genre_wijzigen" id="console_toevoegen" value="Wijzigen">
		</form>
	<?php endforeach ?>
<?php endif ?>

<?php if (isset($_POST['verwijderen'])): ?>
	<?php foreach ($database_verwijderen as $genre): ?>
		<p>Bent u zeker dat u '<?= $genre->genre ?>' wilt verwijderen?</p>

		<form action="Genre/verwijderen" method="POST">
			<input type="hidden" name="id" value="<?= $genre->id ?>">
			<input type="hidden" name="genre" value="<?= $genre->genre ?>">
			<button type="submit" name="verwijderen_ja" value="ja">Ja</button>
			<button type="submit" name="verwijderen_neen" value="neen">Neen</button>
		</form>
	<?php endforeach ?>
<?php endif ?>

<?php if (count($database_genre) <= 0): ?>
	Er zijn geen genres gevonden in de database.
<?php endif ?>

<?php if (count($database_genre) > 0): ?>
	<table class="col-md-6 admin">
		<form action="admin-genres" method="POST">
			<thead>
				<th>Consolenummer:</th>
				<th>Naam:</th>
				<th></th>
				<th></th>
			</thead>

			<tbody>			
				<?php foreach ($database_genre as $genre): ?>
					<tr>
						<td><?= $genre->id ?></td>
						<td><?= $genre->genre ?></td>
						<td><button type="submit" name="wijzigen" value="<?= $genre->id ?>">Wijzigen</button></td>
						<td><button type="submit" name="verwijderen" value="<?= $genre->id ?>">Verwijderen</button></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</form>
	</table>
<?php endif ?>