<?php

include("KontrakPresenter.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class ProsesMahasiswa implements KontrakPresenter
{
	private $tabelmahasiswa;
	private $data = [];
	private $datafind;

	function __construct()
	{
		// Konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelmahasiswa = new TabelMahasiswa($db_host, $db_user, $db_password, $db_name); // instansi TabelMahasiswa
			$this->data = array(); // instansi list untuk data Mahasiswa
		} catch (Exception $e) {
			echo "yah error" . $e->getMessage();
		}
	}
	function prosesDataMahasiswa()
	{
		try {
			// mengambil data di tabel Mahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->getMahasiswa();

			while ($row = $this->tabelmahasiswa->getResult()) {
				// ambil hasil query
				$mahasiswa = new Mahasiswa(); // instansiasi objek mahasiswa untuk setiap data mahasiswa
				$mahasiswa->setId($row['id']); // mengisi id
				$mahasiswa->setNim($row['nim']); // mengisi nim
				$mahasiswa->setNama($row['nama']); // mengisi nama
				$mahasiswa->setTempat($row['tempat']); // mengisi tempat
				$mahasiswa->setTl($row['tl']); // mengisi tl
				$mahasiswa->setGender($row['gender']); // mengisi gender
				$mahasiswa->setEmail($row['email']); // mengisi gender
				$mahasiswa->setTelpon($row['telp']); // mengisi gender

				$this->data[] = $mahasiswa; // tambahkan data mahasiswa ke dalam list
			}
			// Tutup koneksi
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 2" . $e->getMessage();
		}
	}
	function getDataMahasiswaId($id) {
		try {
			// mengambil data di tabel Mahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->getMahasiswaById($id);

			if ($row = $this->tabelmahasiswa->getResult()) {
				$mahasiswa = new Mahasiswa();
				$mahasiswa->setId($row['id']);
				$mahasiswa->setNim($row['nim']);
				$mahasiswa->setNama($row['nama']);
				$mahasiswa->setTempat($row['tempat']);
				$mahasiswa->setTl($row['tl']);
				$mahasiswa->setEmail($row['email']);
				$mahasiswa->setTelpon($row['telp']);

				$this->datafind = $mahasiswa; // simpan ke datafind
			} else {
				throw new Exception("Data tidak ditemukan");
			}

			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			echo "Error: " . $e->getMessage();
		}
	}
	function UpdateDataMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp) {
		try {
			$data = [
				'nim'     => $nim,
				'nama'    => $nama,
				'tempat'  => $tempat,
				'tl'      => $tl,
				'gender'  => $gender,
				'email'   => $email,
				'telp'    => $telp,
			];
			// mengambil data di tabel Mahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->updateMahasiswa($id, $data);
			
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			echo "Error: " . $e->getMessage();
		}
	}
	function AddDataMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp) {
		try {
			$data = [
				'nim'     => $nim,
				'nama'    => $nama,
				'tempat'  => $tempat,
				'tl'      => $tl,
				'gender'  => $gender,
				'email'   => $email,
				'telp'    => $telp,
			];
			// mengambil data di tabel Mahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->insertMahasiswa($data);
			
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			echo "Error: " . $e->getMessage();
		}
	}
	function DeleteDataMahasiswa($id) {
		try {
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->deleteMahasiswa($id);
			
			$this->tabelmahasiswa->close();
		} catch (Exception $e) {
			echo "Error: " . $e->getMessage();
		}
	}
	function getId($i)
	{
		// mengembalikan id mahasiswa dengan indeks ke i
		return $this->data[$i]->id;
	}
	function getNim($i)
	{
		// mengembalikan nim mahasiswa dengan indeks ke i
		return $this->data[$i]->nim;
	}
	function getNama($i)
	{
		// mengembalikan nama mahasiswa dengan indeks ke i
		return $this->data[$i]->nama;
	}
	function getTempat($i)
	{
		// mengembalikan tempat mahasiswa dengan indeks ke i
		return $this->data[$i]->tempat;
	}
	function getTl($i)
	{
		// mengembalikan tanggal lahir(TL) mahasiswa dengan indeks ke i
		return $this->data[$i]->tl;
	}
	function getGender($i)
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->data[$i]->gender;
	}
	function getEmail($i)
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->data[$i]->email;
	}
	function getTelpon($i)
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->data[$i]->telpon;
	}
	function getSize()
	{
		return sizeof($this->data);
	}
	function getSoloId()
	{
		// mengembalikan id mahasiswa dengan indeks ke i
		return $this->datafind->id;
	}
	function getSoloNim()
	{
		// mengembalikan nim mahasiswa dengan indeks ke i
		return $this->datafind->nim;
	}
	function getSoloNama()
	{
		// mengembalikan nama mahasiswa dengan indeks ke i
		return $this->datafind->nama;
	}
	function getSoloTempat()
	{
		// mengembalikan tempat mahasiswa dengan indeks ke i
		return $this->datafind->tempat;
	}
	function getSoloTl()
	{
		// mengembalikan tanggal lahir(TL) mahasiswa dengan indeks ke i
		return $this->datafind->tl;
	}
	function getSoloEmail()
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->datafind->email;
	}
	function getSoloTelpon()
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->datafind->telpon;
	}
}
