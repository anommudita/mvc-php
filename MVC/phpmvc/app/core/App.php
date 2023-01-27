<?php

class App
{

    // pertemuan 4
    // membuat properti
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];


    public function __construct()
    {

        $url = $this->parseURL();

        // mengecek isinya
        //var_dump($url);

        // controller
        // mengecek apakah ada file yang sesuai dengan url yang diinputkan
        // kita berada diindex.php harus menuju ke folder app/controllers
        // ambil index 0 untuk home
        // file_exists untuk mengecek apakah ada file yang sesuai dengan url yang diinputkan
        if ($url != null) {
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];

                // menghapus index 0   
                // maka home itu akan hilang sudah termasuk ke dalam controller 
                unset($url[0]);
                //var_dump($url);
            }
        } else {
            $this->controller = 'Home';
        }

        // memanggil file controller baru
        require_once '../app/controllers/' . $this->controller . '.php';

        // objek
        // instansiasi atau membuat objek baru
        // agar bisa memanggil method yang ada di dalamnya
        $this->controller = new $this->controller;



        // method-nya

        if (isset($url[1])) {

            // mengecek apakah method ada di dalam controller
            // method_exists untuk mengecek apakah ada method yang sesuai dengan url yang diinputkan
            if (method_exists($this->controller, $url[1])) {

                $this->method = $url[1];
                // maka index dihapus dan sudah termasuk ke dalam method
                unset($url[1]);

                //var_dump($url);
            }
        }

        // Parameters
        // mengelola parameter-nya
        // empty untuk mengecek apakah array kosong atau tidak
        if (!empty($url)) {

            // mengambil semua isi data atau params-nya
            // array_values untuk mengambil semua isi data atau params-nya
            $this->params = array_values($url);
        }


        // jalankan controller dan method serta kirimkan params jika ada
        // ini akan menggunakan function call_user_func_array
        // call user func array untuk memanggil function yang ada di dalam controller
        call_user_func_array([$this->controller, $this->method], $this->params);
    }


    // Pertemuan 3
    // parsing data untuk mengambil url lalu memecahkan sesuai dengan keinginan kita
    public function parseURL()
    {

        // mengambil nilai url saja / index.php?url=anomganteng ==> sebagai contoh
        if (isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/'); // menghapus bagian akhir saja
            $url = filter_var($url, FILTER_SANITIZE_URL); // keamanan supaya user tidak memasukan kode yang aneh di url kita 
            $url = explode('/', $url); // memecah menjadi array dan menghapus tanda atau berdasarkan '/'
            return $url;
        }
    }
}