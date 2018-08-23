<?php 
error_reporting(E_ALL);
include_once 'koneksi.php';
$title= 'Tambah';
if (isset($_POST['submit'])) {
	$judul=$_POST['title'];
	$content=$_POST['content'];
	$tanggal=$_POST['tanggal'];

	$sql='INSERT INTO artikel (title, content, tanggal)';
	$sql .="VALUE ('{$judul}', '{$content}', '{$tanggal}')";
	$result=mysqli_query($conn, $sql);
	if ( !$result) {
	 	die(mysqli_error($conn));
	 } 
	 header('location: artikel.php');
}
?>

<link rel="stylesheet" href="css/style2.css">
<body>
	<div class="container">>
		<header>
			<h1>Informasi Kontak</h1>
		</header>
		<nav>
			<a href="index.php">Home</a>
			<a href="profile.php">Profile</a>
		</nav>
		<div class="wrap">
			<div class="side">
				
			</div>
			<div class="content">

<h2>Tambah Artikel</h2>
<form method="post" action="tambah.php" enctype="multipart/form-data">
	<div class="field">
		<label for="">Title</label>
		<input type="text" name="title" placeholder="Judul Artikel " />
	</div>
	<div class=field>
		<label for="">Content</label>
		<textarea name="content" cols="50" rows="10" placeholder="Isi Artikel"></textarea> 
	</div>
	<div class="field">
		<label for="">Tanggal</label>
		<input type="date" name="tanggal">
	</div>
	<div class="field submit">
		<input type="submit" class="btn btn-large "name="submit" value="Simpan" />
	</div>
</form>
</div>
<footer>
	<p> Alensia Eka Saputra, Wordpress</p>
</footer>	
</body>