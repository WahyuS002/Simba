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

        <div class="row">
            <div class="col-lg-6">


                <?= form_open_multipart('user/edit') ?>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="name" class="form-control" id="name" name="name" value="<?= $user['username'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">Picture</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/profile/') ?><?= $user['image'] ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="form-group row justify-content-end">
            <div class="col-sm-11">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>

        </form>

    </div>
</div>