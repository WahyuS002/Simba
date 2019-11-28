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

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Lomba</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $lomba ?></h2>
                            <p class="text-white mb-0"><?= date('Y M d') ?></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">User</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $user_register ?></h2>
                            <p class="text-white mb-0"><?= date('Y M d') ?></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">User Terverifikasi</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $user_verify - 1 ?></h2>
                            <p class="text-white mb-0"><?= date('Y M d') ?></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->