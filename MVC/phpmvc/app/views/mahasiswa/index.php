<div class="container mt-4">


    <!-- Flash Message -->

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
        </div>
    </div>

    <!-- End Flash Message -->

    <!-- Start Button Tambah -->

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>

    <!-- End Button Tambah -->

    <!-- Start Searching -->

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="cari mahasiswa.." name="keyword" id="keyword"
                        autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Searching -->

    <div class="row mb-3">
        <div class="col-lg-6">
            <h3>Daftar Mahasiswa</h3>
            <?php foreach ($data['mhs'] as $mhs) : ?>
            <!-- <ul>
                <li><?= $mhs['nama']; ?></li>
                <li><?= $mhs['nim']; ?></li>
                <li><?= $mhs['email']; ?></li>
                <li><?= $mhs['jurusan']; ?></li>
            </ul> -->

            <ul class="list-group">
                <li class="list-group-item"><?= $mhs['nama']; ?>
                    <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" <span
                        class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?');"></span>hapus</a>
                    <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" <span
                        class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal"
                        data-target="#formModal" data-id="<?= $mhs['id']; ?>"></span>ubah</a>
                    <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" <span
                        class="badge badge-primary float-right ml-1"></span>detail</a>
                </li>
            </ul>


            <?php endforeach; ?>
        </div>
    </div>


    <!-- Modal Box -->
    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- konten Form -->
                    <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">

                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>

                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="number" class="form-control" id="nim" name="nim">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <!-- Combo Box -->
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" id="jurusan" name="jurusan">
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Teknik Industri">Teknik Industri</option>
                                <option value="Teknik Mesin"> Teknik Mesin</option>
                                <option value="Teknik ELektro">Teknik Elektro</option>
                            </select>
                        </div>

                        <!-- End Combo Box  -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                    <!-- end konten Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->