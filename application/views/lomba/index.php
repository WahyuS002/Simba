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
    <div class="container">

        <div class="mt-3">
            <?= $this->session->flashdata('message') ?>
        </div>

        <?php if ($user['role_id'] == 1) : ?>
            <div class="row">
                <?php foreach ($lomba as $l) : ?>
                    <div class="col-sm">
                        <div class="col-lg-9 col-md-12 col-sm-12 text-center">
                            <div class="card-body" style="width: 18rem;">
                                <a href="<?= base_url('home/detail/') ?><?= $l['id_lomba'] ?>">
                                    <img src="<?= base_url() ?>/assets/img/lomba/<?= $l['gambar'] ?>" class="card-img-top" alt="gambar2" style=" height:350px;">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $l['judul_lomba'] ?></h5>
                                    <p class="card-text"><?= $l['deskripsi'] ?></p>
                                </div>
                                <a href="<?= base_url('lomba/edit_lomba/') ?><?= $l['id_lomba'] ?>"><span class="badge badge-success">Edit</span></a>
                                <a href="<?= base_url('lomba/delete_lomba/') ?><?= $l['id_lomba'] ?>"><span class="badge badge-danger">Delete</span></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="row">
                <?php foreach ($lomba_user as $l) : ?>
                    <div class="col-sm">
                        <div class="col-lg-9 col-md-12 col-sm-12 text-center">
                            <div class="card-body" style="width: 18rem;">
                                <a href="<?= base_url('home/detail/') ?><?= $l['id_lomba'] ?>">
                                    <img src="<?= base_url() ?>/assets/img/lomba/<?= $l['gambar'] ?>" class="card-img-top" alt="gambar2" style=" height:350px;">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $l['judul_lomba'] ?></h5>
                                    <p class="card-text"><?= $l['deskripsi'] ?></p>
                                </div>
                                <a href="<?= base_url('lomba/edit_lomba/') ?><?= $l['id_lomba'] ?>"><span class="badge badge-success">Edit</span></a>
                                <a href="<?= base_url('lomba/delete_lomba/') ?><?= $l['id_lomba'] ?>"><span class="badge badge-danger">Delete</span></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<!--**********************************
            Content body end
        ***********************************-->