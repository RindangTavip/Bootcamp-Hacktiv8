<?php 
include 'database.php';
$db = new database();
?>
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
	
	<div class="container" id="listing">
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-3">
                <h3>Manajemen Kontak</h3>
            </div>
            <div class="col-md-9" style="margin-top:15px;">
                <a href="input.php" class="btn btn-default">Tambah Kontak</a> &nbsp;
            </div>
        </div>
		<table class="table table-striped">
			<thead>
				<tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Telpon</th>
                    <th>Opsi</th>
				</tr>
			</thead>
			<tbody>
                <?php
                $no = 1;
                foreach($db->tampil_data() as $x){
                ?>
				<tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $x['name']; ?></td>
                    <td><?php echo $x['email']; ?></td>
                    <td><?php echo $x['phone']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $x['id']; ?>&aksi=edit" class="btn btn-default">Edit</a>
                        <a href="proses.php?id=<?php echo $x['id']; ?>&aksi=hapus" class="btn btn-default">Hapus</a>			
                    </td>
				</tr>
                <?php 
                }
                ?>
			</tbody>
		</table>
	</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>