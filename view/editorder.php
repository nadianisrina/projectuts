<?php
include('../model/data.php');
?>
<!doctype html>
<html lang="en">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login #3</title>
</head>

<body>


    <div class="half">
        <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.png');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="form-block">
                            <div class="text-center mb-5" >
                                <h3 style="font-family: 'Oswald', sans-serif;"><strong>Pesanan Pelanggan</strong></h3>
                                <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
                            </div>
                            <form action="../controller/proses.php?aksi=update_order" method="POST">
                <div class="form-group first">
                <?php 
                    $no = $_GET['no'];
                    $db = new data();
                    foreach ($db->add_order($no) as $b){
                    ?>
                  <label for="nama">Nama Pesanan</label>
                  <input type="hidden" class="form-control" name="no" value="<?php echo $b ['no'] ?>">
                  <input type="text" class="form-control"  id="nama" name="nama" value="<?php echo $b ['nama'] ?>">
                </div>
                <div class="form-group last mb-3">
                  <label for="note">note</label>
                  <input type="text" class="form-control"  id="note" name="note" value="<?php echo $b ['note'] ?>">
                  
                </div>
                <div class="form-group last mb-3">
                  <label for="jumlah">jumlah</label>
                  <input type="text" class="form-control"  id="jumlah" name="jumlah" value="<?php echo $b ['jumlah'] ?>">
                  
                </div>
                <div class="form-group last mb-3">
                  <label for="alamat">alamat</label>
                  <input type="text" class="form-control"  id="alamat" name="alamat" value="<?php echo $b ['alamat'] ?>">
                  
                </div>
                

                <input type="submit" value="Edit" class="btn btn-block btn-primary">
                
            <?php } ?>
                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>