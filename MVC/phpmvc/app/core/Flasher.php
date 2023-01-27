<?php



class Flasher
{

    // method static, agar tidak perlu lagi instasiasi classh Flasher ini!

    // $pesan = berisikan gagal atau berhasil
    // $aksi = berisikian tambah, ubah , hapus
    // $tipe = berisikan bootstrap sesuai dengan tipe warnanyaq
    public static function setFlash($pesan, $aksi, $tipe)
    {
        // set session
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">Data Mahasiswa
                    <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }

        // Hapus Session, karena berlaku sekali saja jika ada perubahan dari feature crud
        unset($_SESSION['flash']);
    }
}