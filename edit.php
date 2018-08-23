<?php
include_once 'koneksi.php';
//include('login_session.php');
error_reporting(E_ALL);
$title = 'edit artikel';
if (isset($_POST['submit'])){
	$id=$_POST['id'];
	$judul=$_POST['title'];
	$content=$_POST['content'];
	$tanggal=$_POST['tanggal'];


	$sql = "UPDATE artikel  SET title='$judul' ,content='$content' ,tanggal='$tanggal' where id='$id' " ; 
	$result = mysqli_query ($conn, $sql);
	if (!$result) {
		die(mysqli_error($conn));
	}


	header('location:artikel.php');
}

 $sql = "SELECT * FROM artikel where id = '$_GET[id]'";
 $result = mysqli_query($conn, $sql);

 if (!$result) die('error : data tidak tersedia');
 $data = mysqli_fetch_array($result);

function is_select($var, $val){
	if ($var == $val) return 'selected = "selected"' ;
		return false;
	}

	//include ('header.php');
	//include('nav.php');
	//include('sidebar.php');

?>
<link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="css/style2.css">
<body>
	<div class="container">>
		<header>
			<h1></h1>
		</header>
		<nav>
			<a href="index.php">Home</a>
			<a href="profile.php">Profile</a>
		</nav>
		<div class="wrap">
			<div class="side">
				
			</div>
			<div class="content">
<div class="content_a">
	<div class="daftar">
		<div class="field">
			<h2>Edit Artikel</h2>
			<form action="edit.php" method="POST">
				<div class="field">
					<label for="">Nama Artikel</label>
					<input type="text" name="title" value="<?php echo $data['title'];?>"></input>
				</div>
				<div class="field">
					<label>Content</label>
					<textarea name="content" cols="50" row="10"><?php echo $data['content'] ;?></textarea>
				</div>
				<div class=field">
					<label>Tanggal</label>
					<input type="date" name="tanggal" value="<?php echo date("Y-m-d", strtotime($data['tanggal'])) ;?>" />
				</div>
				<div class="field submit">
					<input type="hidden" name="id" value="<?php echo $data['id'];?>"></input>
					<input type="submit" class="btn btn-large" name="submit" value="Simpan"></input>
				</div>
			</form>
		</div>
	</div>
	</div>
	</div>
   <footer>
	<p> Alensia Eka Saputra, Wordpress</p>
</footer>
   </div>	
  </div>
  </body>	
<?php
//include('footer.php');
?>