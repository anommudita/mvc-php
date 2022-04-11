<?php

class App
{
    //property 
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        //echo 'Ini adalah class ' . __CLASS__;
        $url = $this->parseURL();

        // controller
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
            var_dump($url);
        }


        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // methiod
        if (isset($url[1])) {

            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
    }


    //Membuat method bertugas mengambil URL lalu memecahkan sesuaikan keinginan kita (ParseURL) 
    public function parseURL()
    {
        if (isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/');   // pecah menjadi array dan menghapus bagian akhir saja 
            $url = filter_var($url, FILTER_SANITIZE_URL); // keamanan supaya user tidak memasukan kode yang aneh
            $url = explode('/', $url); // memecah menjadi array dan menghapus tanda '/'
            return $url;
        }
    }
}
