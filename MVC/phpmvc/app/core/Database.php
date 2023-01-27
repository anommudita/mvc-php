<?php



// akan terhubung ke file config.php dengan file Database.php
// pertemuan 8
// menggunakan metode Private;

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    // untuk menampung koneksi databasenya
    // statement untuk menampung query
    // dbh untuk menampung koneksi database
    private $dbh;
    private $stmt;
    // get data

    // membuat konstruktornya
    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;


        // option untuk menambahkan fitur agar optimalisasi ke databasenya
        // optimalisasi ini yang dimaksud terjaga terus begitu
        $option = [
            PDO::ATTR_PERSISTENT => true,
            // jika eror
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];


        // block try jika eror maka akan di tangkap oleh catch
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (
            PDOException $e
        ) {
            die($e->getMessage());
        }
    }

    // membuat method untuk qeury secara generic, bisa select, hapus, delete dan update
    // agar lebih flexible lagi 
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // binding database, siapa tahu ada kata spesifik yang akan di binding seperti WHERE
    // tyoe berisikan data null agar yang menentukan yaitu aplikasinya.
    public function bind($param, $value, $type = null)
    {
        // jika type nya null
        if (is_null($type)) {
            // melakukan sesuatu;
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                    // selain daripada itu
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        //  bindingnya
        // sepertinya ini agar menghindari SQL Injection
        // karena query dieksekusi setelah stringnya dibersihkan terlebih dahulu
        $this->stmt->bindValue($param, $value, $type);
    }



    // membuat method  execute
    public function execute()
    {
        $this->stmt->execute();
    }

    // membuat method resultset
    // untuk mengambil semua data
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // membuat method single
    // untuk mengambil hanya satu data saja bro!
    // sama saja namaun fetch saja tidal isikata allnya
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // funtion untuk mengembalikan nilainya 
    public function rowCount()
    {

        // rowCount ini punya PDO 
        return $this->stmt->rowCount();
    }
}