<?php

class Mahasiswa_model
{

    // data banyak array didalam array
    // private $mhs = [

    //     [
    //         "nama" => "Ida Bagus Anom Mudita",
    //         "nim" => "2015051038",
    //         "email" => "bagus.anom@undiksha.ac.id",
    //         "jurusan" => "Teknik Informatika"

    //     ],

    //     [
    //         "nama" => "Gede Yuda Aditya",
    //         "nim" => "2015051003",
    //         "email" => "yuda.aditya@undiksha.ac.id",
    //         "jurusan" => "Teknik Informatika"
    //     ],

    //     [
    //         "nama" => "Gusmang Ananda",
    //         "nim" => "2015051032",
    //         "email" => "gusmang.ananda@undiksha.ac.id",
    //         "jurusan" => "Teknik Industri"
    //     ],
    // ];


    // // Connect to database dengan metode PDO driver dari php
    // private $dbh; // database handler
    // private $stmt; // statement


    // // untuk username dan password taruh difile lain agar lebih aman
    // public function __construct()
    // {
    //     // data source name
    //     $dsn = 'mysql:host=localhost;dbname=phpmvc';

    //     // block try jika eror maka akan di tangkap oleh catch
    //     try {
    //         $this->dbh = new PDO($dsn, 'root', '');
    //     } catch (
    //         PDOException $e
    //     ) {
    //         die($e->getMessage());
    //     }
    // }

    // public function getAllMahasiswa()
    // {
    //     // query select all untuk tabel mahasiswa
    //     $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
    //     $this->stmt->execute();

    //     // ambil semua data dari tabel mahasiswa
    //     return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    // }


    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // membuat method getAllMahasiswa
    // memnangil langsung class databasenya
    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    // method function getMahasiswaById
    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        //  WHERE id=:id untuk mengamankan id-nya biar tidak bisa di inject sql heheh

        // sesuai dengan parameter yang dibutuhkan oleh method bind()
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // method tambah data Mahasiswa
    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES ('', :nama, :nim, :email, :jurusan)";

        // perintah kirim
        $this->db->query($query);

        // binding
        // akan menuju ke parameter data dan nilai tersebut merujuk ke name htmlnya 
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);


        // eksekusi
        $this->db->execute();

        //wrapper
        return $this->db->rowCount();
    }


    // method hapus data Mahasiswa
    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);


        // eksekusi
        $this->db->execute();


        //wrapper
        return $this->db->rowCount();
    }




    // method ubah data Mahasiswa
    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET 
            nama = :nama,
            nim = :nim,
            email = :email,  
            jurusan = :jurusan
            WHERE id = :id";

        // perintah kirim
        $this->db->query($query);

        // binding
        // akan menuju ke parameter data dan nilai tersebut merujuk ke name htmlnya 
        $this->db->bind(
            'nama',
            $data['nama']
        );
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);


        // eksekusi
        $this->db->execute();

        //wrapper
        return $this->db->rowCount();
    }


    // method cari data Mahasiswa
    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query(
            $query
        );

        // binding
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}