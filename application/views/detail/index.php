    <header class="container-fluid grey1 navbar">
        <h4> <i class="fas fa-paw"></i> SIMBA </h4>
    </header>

    <hr>

    <ul class="nav justify-content-center text-center">
        <li class="nav-item">
            <a class="nav-link active" href="index.html"> <i class="fas fa-book"></i><br> ALL </a>
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
    <hr class="mb-5">

    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 mb-1 lomba-img">
                <div id="carouselExampleControls" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?= base_url('assets/img/lomba/') ?><?= $detail['gambar'] ?>" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/ex3.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/ex4.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
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

    <hr class="mt-5">

    <div class="container">
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
    </div>


    <hr>

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
                    <h4>Lorem. : </h4>
                    <p>Lorem ipsum dolor sit amet.</p>
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