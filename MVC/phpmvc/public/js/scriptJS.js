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
    });


    // ketika mengklik button ubah data
    $('.tampilModalUbah').on('click', function(){
        // console.log('ok');
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        // tipe submit diubah menjadi ubah data
        $('.modal-footer button[type=submit]').html('Ubah Data');


        // $('modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

        // mengambil data dari button ubah dengan jquery where id
        // this = tombol ini yang di klik didalam kondisi ini!
        const id = $(this).data('id');
        // console.log(id);

        // query ajak = $.ajax
        // parameter ketuker tidak masalah bro!
        $.ajax({

            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            // datanya berupa object javascript dengan key id diatas
            data: {id : id},
            // datanya dikirimkan lewat method post
            // akan ditangkap menggunakan $_POST
            method: 'POST',
            // data yang dikirimkan berupa json
            // dataType: 'json',
            // jika berhasil apa yang dilakukan
            // data diminta melalui url diatas lalu akan dikembalikan ke $data
            success: function(data){
                console.log(data);
                // $('#nama').val(data.nama);
                // $('#nrp').val(data.nrp);
                // $('#email').val(data.email);
                // $('#jurusan').val(data.jurusan);
                // $('#id').val(data.id);
            }

        });

    });



});