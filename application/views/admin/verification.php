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
            <div class="col">

                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

                <?= $this->session->flashdata('message'); ?>

                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewSubmenu">
                    Add New Submenu
                </button>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($AllUser as $au) : ?>
                            <?php if ($au['email'] == $user['email']) : ?>
                                <?php continue; ?>
                            <?php endif; ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $au['username'] ?></td>
                                <td><?= $au['email'] ?></td>
                                <td>
                                    <a href="#" class="badge badge-pill badge-success">Edit</a>
                                    <a href="<?= base_url('admin/delete/') ?><?= $au['id_user'] ?>" class="badge badge-pill badge-danger" onclick="return confirm('yakin?')">Delete</a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        </form>

    </div>
</div>