// mengecek apakah sudah masuk
// console.log('ok');

// $ = artinya jquery ya
// document = artinya html

// menggantikan document.ready 
// apakah document sudah siap?
$(function(){

    // ketika mengklik button tambah data
    $('.tombolTambahData').on('click', function(){
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        // tipe submit diubah menjadi tambah data
        $('.modal-footer button[type=submit]').html('Tambah Data');

        // menghapus value dari inputan, data menjadi kosong di form dengan cara kita timpa dengan string kosong
        $('#nama').val('');
                $('#nim').val('');
                $('#email').val('');
                $('#jurusan').val('');
                $('#id').val('');
    });


    // ketika mengklik button ubah data
    $('.tampilModalUbah').on('click', function(){



        // console.log('ok');
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        // tipe submit diubah menjadi ubah data
        $('.modal-footer button[type=submit]').html('Ubah Data');



        
        // mengubah form actionnya menjadi ubah data
        $('.modal-body form').attr('action', 'http://localhost/mvc-php/MVC/phpmvc/public/mahasiswa/ubah');


        // mengambil data dari button ubah dengan jquery where id
        // this = tombol ini yang di klik didalam kondisi ini!
        const id = $(this).data('id');
        // console.log(id);

        // query ajak = $.ajax
        // parameter ketuker tidak masalah bro!
        $.ajax({

            // url yang akan diakses method getubah
            url: 'http://localhost/mvc-php/MVC/phpmvc/public/mahasiswa/getubah',

            // datanya berupa object javascript dengan key id diatas
            data: {id : id},
            // datanya dikirimkan lewat method post
            // akan ditangkap menggunakan $_POST
            method: 'post',
            
            // data yang dikirimkan berupa json
            dataType: 'json',

            // jika berhasil apa yang dilakukan
            // data diminta melalui url diatas lalu akan dikembalikan ke $data
            success: function(data){
                // data bertipe json
                console.log(data);
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }

        });

    });



});