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

<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a href="<?= base_url('home') ?>"><img src="<?= base_url('assets/img/home.png') ?>" alt="" style="width:30px"></a>
                            <a class="text-center" href="<?= base_url('auth') ?>">
                                <h4>Login</h4>
                                <?= $this->session->flashdata('message') ?>
                            </a>

                            <form class="mt-5 mb-5 login-input" method="post" action="<?= base_url('auth') ?>">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email') ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                </div>
                                <button class="btn login-form__btn submit w-100" type="submit">Sign In</button>
                            </form>
                            <p class="mt-5 login-form__footer">Dont have account? <a href="<?= base_url('auth/registration') ?>" class="text-primary">Sign Up</a> now</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>