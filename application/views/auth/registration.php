<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?= base_url('assets/img/') ?>img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post" action="<?= base_url(); ?>auth/registration">
                <span class="login100-form-title">
                    Register
                </span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="username" placeholder="Username" id="username" value="<?= set_value('username') ?>">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="email" placeholder="Email" id="email" value="<?= set_value('email') ?>">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" name="password1" placeholder="Password" id="password1">
                    <span class=" focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" name="password2" placeholder="Re-password" id="password2">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Register
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="<?= base_url('auth'); ?>">
                        Already have account? Log in here
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>