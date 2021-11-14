<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- cdn icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../resources/css/frontend/style.css">
    <title>Home</title>
</head>

<body>
    <!-- Header -->
    <header class=" sticky-top" id="my-menu">
        <div class="top">
            <div class="row container ">
                <div class="col-6 col-sm-6 d-flex justify-content-start">
                    <div>
                        <a class="nav-link" href="index.php?login"> <i class="fab fa-facebook"></i></a>
                    </div>
                    <div>
                        <a class="nav-link" href="index.php?login"> <i class="fab fa-instagram"></i></a>
                    </div>
                    <div>
                        <a class="nav-link" href="index.php?login"> <i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-6 col-sm-6 d-flex justify-content-end">
                    <div class="m-0 p-0">
                        <a class="nav-link" href="index.php?login"> <i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                    </div>
                    <div class="m-0 p-0">
                        <a class="nav-link" href="index.php?login"> <i class="fas fa-registered"></i> Đăng kí</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_top container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid  m-0 p-0">
                    <a class="navbar-brand" href="index.php?home">
                        <img src="../resources/img/logo2.png" alt="" width="50">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php?home"><i class="fas fa-home"></i> Trang
                                    chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?khuyen_mai"><i class="fas fa-bahai"></i> CT Khuyến mãi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?style"><i class="fas fa-cut"></i> Khám phá kiểu tóc</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?dich_vu"><i class="fas fa-thumbs-up"></i> Dịch vụ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?bai_viet"><i class="fas fa-book"></i> bài viết</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?store"><i class="fas fa-store"></i> Men Store</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?dat_lich"><i class="fas fa-user"></i> Đặt lịch</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="content" style="min-height: 200px; background-color: #fff;" data-spy="scroll" data-target="#my-menu">
        <marquee behavior="" direction="" style="color: red;">
            Đặt lịch ngay gọi số : <b>098 310 84 04</b> Mr Lộc
        </marquee>
        <div class="">
            <?php
            include $VIEW_NAME;
            ?>
        </div>
    </div>
    <footer class="p-0">
        <div class="footer_top pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <h5>Liên hệ với chúng tôi</h5>
                        <div class="mt-4">
                            Giờ phục vụ 8h30 - 21h00 (kể cả thứ 7, CN)
                        </div>
                        <div class="mt-4">Địa chỉ</div>
                        <div class="mt-2 address_1 pb-2"><a href="">
                                474 Đê La Thành
                            </a>
                        </div>
                        <div class="mt-2">
                            <a href=""> 201 Nguyễn Văn Cừ</a>

                        </div>
                        <div class="mt-4">
                            <a href="">Webiste</a>

                        </div>
                        <div class="mt-4 link_fb">
                            <a href="">Facebook</a>

                        </div>
                        <div class="mt-4 tel">
                            <a href="">Tel,Zalo: 0988913668 - MR. Tuấn</a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <h5>Bài viết mới</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item address_1"><a href="">Bài viết số 1</a> </li>
                            <li class="list-group-item address_1"><a href="">Bài viết số 2</a> </li>
                            <li class="list-group-item address_1"><a href="">Bài viết số 3</a> </li>
                            <li class="list-group-item address_1"><a href="">Bài viết số 4</a> </li>
                            <li class="list-group-item address_1"><a href="">Bài viết số 5</a> </li>
                            <li class="list-group-item address_1"><a href="">Bài viết số 6</a> </li>
                            <li class="list-group-item address_1"><a href="">Bài viết số 7</a> </li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <h5>Tìm chúng tôi trên facebook</h5>
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Flochtph15557%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bootom pt-4 pb-4">
            <div class="rows1">
                <a href="#"><img src="../resources/img/image 25.png" alt="img" width="50px"></a>
                <a href="#"><img src="../resources/img/image 26.png" alt="img" width="50px"></a>
                <a href="#"><img src="../resources/img/image 27.png" alt="img" width="50px"></a>
                <a href="#"><img src="../resources/img/image 28.png" alt="img" width="50px"></a>
                <a href="#"><img src="../resources/img/image 29.png" alt="img" width="50px"></a>
            </div>
            <div class="menu_bootom">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?home"><i class="fas fa-home"></i> Trang
                            chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?khuyen_mai"><i class="fas fa-bahai"></i> CT Khuyến mãi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?style"><i class="fas fa-cut"></i> Khám phá kiểu tóc</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?dich_vu"><i class="fas fa-thumbs-up"></i> Dịch vụ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?bai_viet"><i class="fas fa-book"></i> bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?store"><i class="fas fa-store"></i> Men Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?dat_lich"><i class="fas fa-user"></i> Đặt lịch</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?login"> <i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                    </li>
                </ul>
            </div>
            <div>
                Copyright 2021 © PolyHair.????
            </div>

        </div>
    </footer>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>