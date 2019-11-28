<header class="container-fluid grey1 navbar">
    <h4> <i class="fas fa-paw"></i> SIMBA </h4>
    <a href="<?= base_url('auth'); ?>">
        <h4 class="btn btn-2">UPLOAD LOMBA</h4>
    </a>
</header>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4"> SISTEM INFORMASI LOMBA </h1>
        <p class="lead">Universitas Bengkulu</p>
    </div>
</div>



<ul class="nav justify-content-center text-center">
    <?php foreach ($kategori as $k) : ?>
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('home/kategori_lomba/') ?><?= $k['id_kategori'] ?>"> <i class="<?= $k['icon'] ?>"></i><br> <?= $k['kategori'] ?> </a>
        </li>
    <?php endforeach; ?>
</ul>

<div class="container-fluid ">
    <div class="row">
        <?php foreach ($lomba->result() as $l) : ?>
            <div class="col-sm col-md-3">
                <div class="col-lg-9 col-md-12 col-sm-12 text-center">
                    <div class="card-body" style="width: 18rem;">
                        <a href="<?= base_url('home/detail/') ?><?= $l->id_lomba ?>">
                            <img src="<?= base_url() ?>/assets/img/lomba/<?= $l->gambar ?>" class="card-img-top" alt="gambar2" style=" height:350px;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?= $l->judul_lomba ?></h5>
                            <p class="card-text text-truncate"><?= $l->deskripsi ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="col">
            <!--Tampilkan pagination-->
            <?php echo $pagination; ?>
        </div>
    </div>
</div>