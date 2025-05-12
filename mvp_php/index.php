<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("view/TampilMahasiswa.php");

$tp = new TampilMahasiswa();

if (isset($_POST['add'])) {
    // Lengkapi bagian untuk mengambil post data
    $tp->add();
} else if (!empty($_GET['id_hapus'])) {
    // Lengkapi bagian untuk menghapus data
    $id = $_GET['id_hapus'];
    $tp->delete($id);
    header("location:index.php");
} else if (!empty($_GET['id_edit'])) {
    // Lengkapi bagian untuk mengedit status data
    $id = $_GET['id_edit'];
    $tp->edit($id);
} else if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tl = $_POST['tl'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $tp->update($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
} else if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tl = $_POST['tl'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $tp->submit($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
} else {
    $tp->tampil();
}