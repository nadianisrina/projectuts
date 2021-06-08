<?php

class data{

	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "mcdnadia";
	var $con;

	function __construct(){
		$this->con=mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
		mysqli_select_db($this->con,$this->db);
	}

    function viewuser(){
        $query = mysqli_query($this->con,"SELECT * FROM admin");
        while($row = mysqli_fetch_array($query)){
            $see[] = $row;

        }
        return $see;
    }
    function vieworder(){
        $query = mysqli_query($this->con,"SELECT * FROM pesanan ");
        while($row = mysqli_fetch_array($query)){
            $see[] = $row;

        }
        return $see;
    }
    function insert_mcd($nama, $note, $jumlah, $alamat){
        mysqli_query($this->con, "insert into pesanan values ('','$nama', '$note', '$jumlah', '$alamat')");
    }
    function delete_user($nomor){
        mysqli_query($this->con, "DELETE FROM admin WHERE nomor = '$nomor'");
    }
    function delete_order($no){
        mysqli_query($this->con, "DELETE FROM pesanan WHERE no= '$no'");
    }
    function add_user($nomor){
        $query = mysqli_query($this->con,"SELECT * FROM admin WHERE nomor = '$nomor'");
        while($row = mysqli_fetch_array($query)){
            $see[] = $row;

        }
        return $see;
    }
    function add_order($no){
        $query = mysqli_query($this->con,"SELECT * FROM pesanan WHERE no = '$no'");
        while($row = mysqli_fetch_array($query)){
            $see[] = $row;

        }
        return $see;
    }
    function update_user($nomor, $nama, $password){
        mysqli_query($this->con, "UPDATE admin SET nama='$nama', password='$password' WHERE nomor = '$nomor'");
    }
    function update_order($no, $nama, $note, $jumlah, $alamat){
        mysqli_query($this->con, "UPDATE pesanan SET nama='$nama', note='$note', jumlah='$jumlah', alamat='$alamat'  WHERE no = '$no'");
    }
}

    ?>