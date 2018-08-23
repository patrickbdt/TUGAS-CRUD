<!DOCTYPE html>
<html>
<head>
	<title>Kontak</title>
	<link rel="stylesheet" href="css/style2.css">
	<script src="js/main.js"></script>
</head>
<body>
	<div class="container">>
		<header>
			<h1></h1>
		</header>
		<nav>
			<a href="index.php">Home</a>
			<a href="profile.php">Profile</a>
			<a href="artikel.php">Artikel</a>
		</nav>
		<div class="wrap">
			<div class="side">
				
			</div>
			<div class="content">

				<h1>Kontak Form</h1>
				<form action="" method="post" onsubmit="return validForm();">
					
					<div class="field">
						<label for="">Nama</label>
						<input type="text" name="nama">
					</div>

					<div class="field">
						<label for="">Email</label>
						<input type="text" name="email">
					</div>

					<div class="field">
						<label for="">Website</label>
						<input type="text" name="website">
					</div>

					<div class="field">
						<label for="">Pesan</label>
						<textarea name="pesan" id="" cols="30" rows="5"></textarea>
					</div>

					<div class="field submit">
						<input type="submit" class="btn btn-primary" value="Kirim">
					</div>

				</form>

			</div>
		</div>
		<footer>
			<p>Patrick Budianto, Wordpress</p>
		</footer>			
</body>
</html>