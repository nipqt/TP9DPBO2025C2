<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa
{
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampil()
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGender($i) . "</td>
			<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTelpon($i) . "</td>
			<td>
				<a href='index.php?id_edit=" . $this->prosesmahasiswa->getNim($i) . "' class='btn btn-warning'>Edit</a>
				<a href='index.php?id_hapus=" . $this->prosesmahasiswa->getNim($i) . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
			</td>
			</tr>";
			
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function edit($id)
	{
		$this->prosesmahasiswa->getDataMahasiswaId($id);

		// Membaca template edit.html
		$this->tpl = new Template("templates/edit.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("{{ID}}", $this->prosesmahasiswa->getSoloId());
		$this->tpl->replace("{{NIM}}", $this->prosesmahasiswa->getSoloNim());
		$this->tpl->replace("{{NAMA}}", $this->prosesmahasiswa->getSoloNama());
		$this->tpl->replace("{{TEMPAT}}", $this->prosesmahasiswa->getSoloTempat());
		$this->tpl->replace("{{TL}}", $this->prosesmahasiswa->getSoloTl());
		$this->tpl->replace("{{EMAIL}}", $this->prosesmahasiswa->getSoloEmail());
		$this->tpl->replace("{{TELPON}}", $this->prosesmahasiswa->getSoloTelpon());
		
		// Menampilkan ke layar
		$this->tpl->write();
	}

	function add()
	{
		// Membaca template edit.html
		$this->tpl = new Template("templates/edit.html");
		
		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("Edit Data Mahasiswa", "Tambah Data Mahasiswa");
		$this->tpl->replace("{{ID}}", "");
		$this->tpl->replace("{{NIM}}", "");
		$this->tpl->replace("{{NAMA}}", "");
		$this->tpl->replace("{{TEMPAT}}", "");
		$this->tpl->replace("{{TL}}", "");
		$this->tpl->replace("{{EMAIL}}", "");
		$this->tpl->replace("{{TELPON}}", "");
		$this->tpl->replace("Update", "Add");
		$this->tpl->replace("update", "submit");
		
		// Menampilkan ke layar
		$this->tpl->write();
		
		// $this->prosesmahasiswa->getDataMahasiswaId($id);
	}

	function update($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		$this->prosesmahasiswa->UpdateDataMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
		header("location:index.php");
	}

	function submit($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		$this->prosesmahasiswa->AddDataMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
		header("location:index.php");
	}
	
	function delete($id)
	{
		$this->prosesmahasiswa->DeleteDataMahasiswa($id);
		header("location:index.php");
	}
}
