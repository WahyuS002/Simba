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

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message') ?>
            </div>
        </div>

        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="card-img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['username'] ?></h5>
                        <p class="card-text"><?= $user['email'] ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!--**********************************
            Content body end
        ***********************************-->