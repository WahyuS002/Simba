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

                            <a class="text-center" href="<?= base_url('auth') ?>">
                                <h4>Register</h4>
                            </a>

                            <form class="mt-5 mb-5 login-input" method="post" action="<?= base_url('auth/registration') ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" id="username" name="username" value="<?= set_value('username') ?>">
                                    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?= set_value('email') ?>">
                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" id="password1" name="password1">
                                    <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Retype Password" id="password2" name="password2">
                                    <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <button class="btn login-form__btn submit w-100" type="submit">Sign Up</button>
                            </form>
                            <p class="mt-5 login-form__footer">Have account <a href="<?= base_url('auth') ?>" class="text-primary">Login </a> now</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>