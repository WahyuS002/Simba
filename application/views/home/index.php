<header class="container-fluid grey1 navbar">
    <h4> <i class="fas fa-paw"></i> SIMBA </h4>
    <a href="<?= base_url('auth'); ?>">
        <h4 class="btn btn-2">UPLOAD LOMBA</h4>
    </a>
</header>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4"> SISTEM INFORMASI LOMBA </h1>
        <p class="lead">University of Bengkulu</p>
    </div>
</div>

<ul class="nav justify-content-center text-center">
    <li class="nav-item">
        <a class="nav-link active" href="#"> <i class="fas fa-book"></i><br> ALL </a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="#"> <i class="fas fa-paint-brush"></i><br> DESIGN </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"> <i class="fas fa-code"></i> <br> PROGRAMMING </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"> <i class="fas fa-gamepad"></i> <br> GAMING </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"> <i class="fas fa-futbol"></i> <br> SPORT </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"> <i class="fas fa-pencil-ruler"></i> <br> ACADEMIC </a>
    </li>

</ul>

<div class="container-fluid ">
    <div class="row content">
        <div class="col-lg-3 px-5 sidebar">
            <ul class="nav flex-column text-center">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Menu-1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Menu-2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Menu-3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Menu-4</a>
                </li>
            </ul>
        </div>

        <div class="col-lg-9 col-md-12 col-sm-12 text-center">
            <?php foreach ($lomba as $l) : ?>
                <div class="card" style="width: 18rem;">
                    <a href="<?= base_url('lomba/detail/') ?><?= $l['id_lomba'] ?>">
                        <img src="<?= base_url() ?>/assets/img/lomba/<?= $l['gambar'] ?>" class="card-img-top" alt="gambar2" style=" height:350px;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?= $l['judul_lomba'] ?></h5>
                        <p class="card-text"><?= $l['deskripsi'] ?></p>
                        <a href="<?= base_url('lomba/detail/') ?><?= $l['id_lomba'] ?>" class="btn btn-1">Detail lomba</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>