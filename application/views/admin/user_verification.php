<!--*******************
        Preloader start
    ********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
        Preloader end
    ********************-->

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <?php if ($this->session->flashdata('message')) : ?>
        <div class="col-lg-3 mx-auto mt-4">
            <?= $this->session->flashdata('message') ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-3 ml-3">
                <h2 class="text-warning font-weight-light">Verifikasi User</h2>
                <div class="mt-4">Mohon untuk mengecek data data yang telah dikirimkan user untuk diverifikasi agar tidak terjadi kecurangan</div>
                <img src="<?= base_url('assets/img/dashboard/verifikasi.png') ?>" class="img-fluid">
            </div>
            <div class="col-lg-6 mt-4 ml-5">
                <div class="form-group row mt-5">
                    <div class="col-sm-4">Kartu Identitas</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-9">
                                <div>
                                    <img src="<?= base_url('assets/img/verifikasi/') ?><?= $user['ktp'] ?>" class="img-fluid img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <a href="" data-toggle="modal" data-target="#exampleModal"><u>Tampilkan contoh</u></a>

                <div class="form-group row mt-5">
                    <div class="col-sm-4">Foto Identifikasi</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-9">
                                <div>
                                    <img src="<?= base_url('assets/img/verifikasi/') ?><?= $user['data_diri'] ?>" class="img-fluid img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row ml-1">
                    <a href="" data-toggle="modal" data-target="#exampleModal2"><u>Tampilkan contoh</u></a>
                </div>
                <div class="row mt-4 float-right">
                    <a href="<?= base_url('admin/user_verification/') ?><?= $user['id_user']; ?>">
                        <button class="btn btn-warning" type="submit" onclick="return confirm('Apakah anda ingin menyetujui user ini untuk di verifikasi?')">Konfirmasi</button>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi KTP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="<?= base_url('assets/img/dashboard') ?>/verifikasi-ktp.jpg" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal2Label">Verifikasi Data Diri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="<?= base_url('assets/img/dashboard') ?>/verifikasi-data-diri.jpg" class="img-fluid">
                </div>
            </div>
        </div>
    </div>