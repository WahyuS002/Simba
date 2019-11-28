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

        <?= form_open_multipart('lomba/upload_lomba') ?>
        <div class="row">
            <div class="col-lg-3 mt-4 ml-3">
                <div class="form-group text-center" style="position: relative;">
                    <span class="img-div">
                        <div class="text-center img-placeholder" onClick="triggerClick()">
                            <h4></h4>
                        </div>
                        <img src="<?= base_url('assets/img/placeholder') ?>/placeholder-img.jpg" onClick="triggerClick()" id="profileDisplay" class="img-fluid">
                    </span>
                    <input type="file" name="gambar" onChange="displayImage(this)" id="gambar" class="form-control" style="display: none;">
                    <label class="mt-2">Gambar Lomba</label>
                    <br>
                    <label class="mt-2"><?= form_error('gambar', '<small class="text-danger">', '</small>') ?></label>
                </div>
            </div>
            <div class="col-lg-4 mt-4 ml-3">
                <div class="form-group">
                    <input type="text" class="form-control" id="judul" name="judul" aria-describedby="emailHelp" placeholder="Judul Lomba" value="<?= set_value('judul') ?>">
                    <?= form_error('judul', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <select class="form-control" id="kategori" name="kategori">
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($kategori as $k) : ?>
                            <?php if ($k['id_kategori'] == 1) : ?>
                                <?php continue; ?>
                            <?php endif; ?>
                            <option value="<?= $k['id_kategori']; ?>"><?= $k['kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('kategori', '<small class="text-danger">', '</small>') ?>
                </div>
                <!-- <div class="form-group">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" aria-describedby="emailHelp" placeholder="Deskripsi">
                </div> -->
                <div class="form-group">
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" value="<?= set_value('deskripsi') ?>" placeholder="Deskripsi"></textarea>
                    <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="hadiah" name="hadiah" aria-describedby="emailHelp" placeholder="Hadiah" value="<?= set_value('hadiah') ?>">
                    <?= form_error('hadiah', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="url" name="url" aria-describedby="emailHelp" placeholder="Link Pendaftaran" value="<?= set_value('url') ?>">
                    <?= form_error('url', '<small class="text-danger">', '</small>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
        </form>

    </div>


    <!--**********************************
            Content body end
        ***********************************-->