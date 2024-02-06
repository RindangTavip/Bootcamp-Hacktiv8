<!doctype html><html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<title>Tugas Kontak OOP</title>
	
	<style>
	.inline-80 {
		display: inline-block; 
		width: 80px;
	}
    .center {
        text-align: center;
    }
	</style>
</head>
<body>
	<div class="container">
		<h1 class="center">Tugas Kontak OOP</h1>
	</div>
	
	<div>
		&nbsp;
	</div>
	
	<div class="container" id="new-entry">
		<h3>Tambah Kontak</h3>
		<form action="proses.php?aksi=tambah" method="post">
			<div class="form-group">
				<label class="inline-80">Nama</label> &nbsp;
				<input type="text" name="nama" required/>
			</div>
			<div class="form-group">
				<label class="inline-80">Email</label> &nbsp;
				<input type="email" name="email" required/>
			</div>
			<div class="form-group">
				<label class="inline-80">Telp</label> &nbsp;
				<input type="text" name="telp" required/>
			</div>
			<div class="form-group">
				<input type="submit" value="Simpan" class="btn btn-primary" />
				<a href="index.php" class="btn btn-danger">Kembali</a>
			</div>
		</form>
	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>