<?php

class Controller
{
    // membuat method view
    // nilai pamaeter $view adalah nama file yang akan di tampilkan (Folder views)
    // $data adalah data yang akan di tampilkan jika tidak maka kosong (array kosong)

    public function view($view, $data = [])
    {
        // dari file yang ada didalam folder views
        require_once '../app/views/' . $view . '.php';
    }


    // pertemuan 7 membuat model
    public function model($model)
    {
        // sama seperti views
        require_once '../app/models/' . $model . '.php';

        // memanggil class model lalu sekalian di instansiasi atau membuat objeknya
        return new $model;
    }
}