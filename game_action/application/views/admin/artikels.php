<?php
	$database_genre = $this->GenreModel->viewgenres();
	if (!isset($_COOKIE['authenticated'])) 
	{
		redirect('admin-login');
	}
?>

<h1>Artikels</h1>

<p><a href="admin-artikels?toevoegen">Nieuw artikel toevoegen</a></p>

<?php if (isset($_GET['toevoegen'])): ?>
	<form action="admin/Artikels/nieuw_artikel" method="POST">
		<label for="naam">Naam artikel:</label>
			<input type="text" name="naam" id="naam">

		<label for="prijs">Prijs:</label>
			<input type="text" name="prijs" id="prijs">

		<label for="genre">Genre:</label>
			<input type="text" name="genre" id="genre">
			
		<label for="prijs">Prijs:</label>
			<input type="text" name="prijs" id="prijs">


		<input type="submit" name="artikel_toevoegen" id="artikel_toevoegen" value="Toevoegen">
	</form>
<?php endif ?>