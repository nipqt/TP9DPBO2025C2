# Janji

Saya Hanif Ahmad Syauqi dengan NIM 2304330 mengerjakan soal Tugas Praktikum 9 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program

Program Ini dibuat dengan Model MVP (Model - View - Presenter) yang dimana detailnya sebagai berikut:
1. Model
   - DB.class.php: Mengelola database dan query
   - Mahasiswa.class.php: Kelas mahasiswa yang berisi atribut, setter dan getter
   - TabelMahasiswa.class.php: Kelas untuk mengedit tabel dengan query SQL
   - Template.class.php: Untuk Template yang ingin di tampilkan
2. View
   - TampilMahasiswa.php: Implementasi view ke user untuk menampilkan, mengedit dan update, dan menghapus data
3. Presenter
   - KontrakView.php: Interface presenter (seperti .h di bahasa C yang isinya hanya fungsi yang digunakan)
   - ProsesMahasiswa.php: Berisi fungsi dari KontrakView yang di detilkan isi fungsinya

Adapun tambahannya sebagai berikut:
- Templates: Template html yang nanti akan ditampilkan
- index.php: Berisi routing POST dan GET yang disambungkan ke view

# Alur Program
- Ditampilkan data mahasiswa yang berisi NIM, Nama, Tempat Lahir, Tanggal Lahir, Jenis Kelamin, Email, Nomor Telepon
- Untuk menambah data, klik tombol "Tambah Data" dan diarahkan untuk mengisi form data
- Pilih "Edit" untuk melakukan revisi terhadap data yang tersedia
- Pilih "Delete" untuk melakukan penghapusan data yang dimana akan ada konfirmasi saat ingin melakukan penghapusan
- Untuk "Edit" dan "Delete" ada pada setiap list data

# Dokumentasi
![](https://github.com/nipqt/TP9DPBO2025C2/blob/main/Dokumentasi/1.jpeg)
![](https://github.com/nipqt/TP9DPBO2025C2/blob/main/Dokumentasi/2.jpeg)
![](https://github.com/nipqt/TP9DPBO2025C2/blob/main/Dokumentasi/3.jpeg)
![](https://github.com/nipqt/TP9DPBO2025C2/blob/main/Dokumentasi/4.jpeg)
![](https://github.com/nipqt/TP9DPBO2025C2/blob/main/Dokumentasi/5.jpeg)
![](https://github.com/nipqt/TP9DPBO2025C2/blob/main/Dokumentasi/6.jpeg)
