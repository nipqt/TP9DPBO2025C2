<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Mahasiswa.class.php");
include("model/TabelMahasiswa.class.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Interface atau gambaran dari presenter akan seperti apa
interface KontrakPresenter
{
	public function prosesDataMahasiswa();
	public function getDataMahasiswaId($id);
	public function UpdateDataMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
	public function AddDataMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
	public function DeleteDataMahasiswa($id);
	public function getId($i);
	public function getNim($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelpon($i);
	public function getSize();
	public function getSoloId();
	public function getSoloNim();
	public function getSoloNama();
	public function getSoloTempat();
	public function getSoloTl();
	public function getSoloEmail();
	public function getSoloTelpon();
}