<?php

// menghubungkan ke core backend ya
// pertemuan 7 membuat model
class Mahasiswa extends Controller
{
    public function index()

    {
        $data['judul'] = 'Data Mahasiswa';

        // mengirimkan model
        // memiliki data[mhs] berisikan data model mahasiswa yaitu semua mahasaiswa
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    // membuat detail mahasiswa
    // ambil parametr id
    public function detail($id)

    {
        $data['judul'] = 'Detail Mahasiswa';

        // mengirimkan model
        // memiliki data[mhs] berisikan data model mahasiswa yaitu semua mahasaiswa
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }


    //method tambah data mahaisiswa
    public function tambah()
    {
        // Mengecek apakah data yang tuliskan sudah masuk atau belum 
        // var_dump($_POST);

        // jka lebih dari 0 berati data sudah ada karena diinputkan, lalu dilembarkan method tambahDataMahasiswa() di Model_Mahasiswa.php
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {

            // Flash Message jika berhasil
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            // Flash Message jika gagal
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }



    //method hapus data mahaisiswa
    public function hapus($id)
    {
        // Mengecek apakah data yang tuliskan sudah masuk atau belum 
        // var_dump($_POST);

        // jka lebih dari 0 berati data sudah ada karena diinputkan, lalu dilembarkan method tambahDataMahasiswa() di Model_Mahasiswa.php
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {

            // Flash Message jika berhasil
            Flasher::setFlash('berhasil', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            // Flash Message jika gagal
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }


    //method get data mahaisiswa
    public function getubah()
    {
        // echo $_POST['id'];
        // Mengecek apakah data yang tuliskan sudah masuk atau belum 
        // var_dump($_POST);

        // jka lebih dari 0 berati data sudah ada karena diinputkan (pasti 1 hasilnya), 
        // lalu dilemparkan method tambahDataMahasiswa() di Model_Mahasiswa.php
        // jscon_encode untuk mengubah data array assosiative menjadi json
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }


    //method ubah data mahaisiswa
    // mirip seperti tambah
    public function ubah()
    {


        // jka lebih dari 0 berati data sudah ada karena diinputkan, lalu dilembarkan method tambahDataMahasiswa() di Model_Mahasiswa.php
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {

            // Flash Message jika berhasil
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            // Flash Message jika gagal
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }


    // method cari data mahasiswa
    public function cari()
    {
        $data['judul'] = 'Data Mahasiswa';

        // mengirimkan model
        // memiliki data[mhs] berisikan data model mahasiswa yaitu semua mahasaiswa
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}