<?php



class Home extends Controller
{

    public function index()
    {

        //echo 'home/index';
        // method view akan disimpan di dalam class Controller yang ada di dalam folder core
        // paramter string dan menuju ke halaman yang ditujunya yaitu Folder views.
        // untuk title
        $data['judul'] = 'Home';

        // data $data['nama'] akan diambil dari model yang ada di dalam folder models
        // memanggil class model dengan nama User_model dan methodnya
        $data['nama'] = $this->model('User_model')->getUser();

        // templates header
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        // templates footer
        $this->view('templates/footer');
    }
}