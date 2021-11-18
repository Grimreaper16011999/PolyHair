<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= $CSS_URL ?>/layout_admin.css">
</head>

<body>
    <!-- <div class="test">sss</div> -->
    <!-- Giao diện trang admin -->
    <header>
        <div class="container-fluid">
            <div class="header_top">
                <div class="row" style="background-color: #333;">
                    <div class="col col-sm-2 pt-3 border-right">
                        <h4>
                            <i class="fab fa-windows"></i>
                            <b>STAFF</b>
                        </h4>
                    </div>
                    <div class="col col-sm-6 pt-3">
                        <h3>Home</h3>
                    </div>
                    <div class="col col-sm-2 pt-3 text-right" style="font-size: 25px;">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="col col-sm-2 row">
                        <div class="col-sm-6 p-2">
                            <img class=" rounded-circle" src="<?= $IMG_URL ?>/mau_toc/mau toc 1.jpg" alt="" width="80%">
                        </div>
                        <div class="col-sm-6 p-2">
                            <span>Tên tk</span> <br>
                            <span>ID: 123456</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <?php require "menu.php"; ?>
            <div class="col col-sm-10 border border-3" style="min-height: 600px;">
                <?php include $VIEW_NAME; ?>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>