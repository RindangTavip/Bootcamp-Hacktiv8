<?php 
class connection {
    function connect(){
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "dblatihanoop";

        $this->mysqli = new mysqli($hostname, $username, $password, $database);

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        return true;            
    }
}

class database extends connection{

	function __construct(){
		parent::connect();
	}
 
	function tampil_data(){
		$data = $this->mysqli->query("SELECT * FROM contacts");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
 
	}
 
	function input($nama,$email,$telp){
		$this->mysqli->query("INSERT INTO contacts VALUES('','$nama','$email','$telp')");
	}
 
	function hapus($id){
		$this->mysqli->query("DELETE FROM contacts WHERE id='$id'");
	}
 
	function edit($id){
		$data = $this->mysqli->query("SELECT * FROM contacts WHERE id='$id'");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}
 
	function update($id,$nama,$email,$telp){
		$this->mysqli->query("UPDATE contacts SET name='$nama', email='$email', phone='$telp' WHERE id='$id'");
	}
 
} 
 
?>