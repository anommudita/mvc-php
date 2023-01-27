<?php

class About extends Controller
{

    // method defaultnya adalah index
    // jika tidak ada user yang memasukan nama maka akan menggunakan default
    // jika ada maka dia akan mengambil nama yang diinputkan
    public function index($nama = 'default', $pekerjaan = 'default', $umur = 'default')
    {

        // array untuk data, gunakan arraya assosiative
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        // untuk title
        $data['judul'] = 'About Me';

        //header
        $this->view('templates/header', $data);
        //echo "Halo saya $nama dan Bro.vfx adalah $brofx";
        $this->view('about/index', $data);
        //footer
        $this->view('templates/footer');
    }
    public function page()
    {
        $data['judul'] = 'Pages';
        //echo 'about/page';
        $this->view('templates/header', $data);
        $this->view('about/page', $data);
        $this->view('templates/footer');
    }
}
