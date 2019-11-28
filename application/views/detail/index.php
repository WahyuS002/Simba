    <header class="container-fluid grey1 navbar">
        <h4> <i class="fas fa-paw"></i> SIMBA </h4>
    </header>

    <hr>

    <ul class="nav justify-content-center text-center">
        <?php foreach ($kategori as $k) : ?>
            <li class="nav-item">
                <a class="nav-link active" href="<?= base_url('home/kategori_lomba/') ?><?= $k['id_kategori'] ?>"> <i class="<?= $k['icon'] ?>"></i><br> <?= $k['kategori'] ?> </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <hr class="mb-5">

    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 mb-1 lomba-img">
                <div id="carouselExampleControls" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?= base_url('assets/img/lomba/') ?><?= $detail['gambar'] ?>" alt="First slide">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-lg-5 col-md-12 text-center py-5 mb-1">
                <br><br>
                <h4>Lorem ipsum dolor sit amet.</h4>
                <br><br>
            </div>
        </div>

    </div>

    <!-- <div class="container">
        <ul class="nav mx-5">
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
    </div> -->


    <hr class="mt-5">

    <article class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 article p-5">
                <div class="item">
                    <h4><?= $detail['judul_lomba']; ?></h4>
                    <p><?= $detail['deskripsi']; ?></p>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 my-5">
                <div class="container grey1 p-5">
                    <br><br>
                    <h4>Kategori : </h4>
                    <p><?= $kategori['kategori'] ?></p>
                    <br>
                    <h4>Lorem. : </h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <br>
                    <h4>Lorem. : </h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <br><br><br><br>
                    <a href="#" class="btn btn-block btn-3"> IKUT LOMBA </a>
                </div>
            </div>
        </div>
        </div>


    </article>

    <br>
    <br>
    <br>
    <br>

    <div class="container-fluid grey1 p-4">
        <h4 class="d-inline-block"> lomba official website : </h4>
        <div class="d-inline-block ml-auto">
            <i class="fab fa-instagram "></i>
            <i class="fab fa-instagram "></i>
            <i class="fab fa-instagram "></i>
            <i class="fab fa-instagram "></i>
        </div>

    </div>
    <br>