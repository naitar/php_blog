<?php
session_start();

require '../Config/config.php';

if (empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])) {
    header('location:login.php');
  }



if (!empty($_GET['pageno'])) {

    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$numOfrecs  = 6;
$offset = ($pageno - 1) * $numOfrecs;

if (empty($_POST['search'])) {
    $stmt = $pdo->prepare("SELECT * FROM posts ORDER BY id DESC");
    $stmt->execute();
    $rawResult = $stmt->fetchAll();

    $total_pages = ceil(count($rawResult) / $numOfrecs);

    $stmt = $pdo->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT $offset,$numOfrecs ");
    $stmt->execute();
    $result = $stmt->fetchAll();
} else {
    $searchkey = $_POST['search'];
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE title LIKE '%$searchkey%' ORDER BY id DESC");
    $stmt->execute();
    $rawResult = $stmt->fetchAll();

    $total_pages = ceil(count($rawResult) / $numOfrecs);

    $stmt = $pdo->prepare("SELECT * FROM posts WHERE title LIKE '%$searchkey%' ORDER BY id DESC LIMIT $offset,$numOfrecs ");
    $stmt->execute();
    $result = $stmt->fetchAll();
}


?>



<!DOCTYPE html>
<html>



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Widgets</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="container">
        <section class="content-header">

            <div class="container-n  ">
                <div class="row mb-3">
                    <div class="col-md-12" style="text-align:center">
                        <h3>Blog SITE</h3>
                    </div>
                    <div class="logout float-right" style="  position: absolute;right: 0px;">
                    <a href="index.php" class="btn btn-default"><i class="fa fa-home">HOME</i></a>    
                    <a href="logout.php" class="btn btn-default">LOGOUT</a>
                    </div>

                </div>
            </div>
        </section>

        <section class="content">

            <div class="row">
                <?php
                if ($result) {
                    $i = 1;
                    foreach ($result as $value) {
                ?>
                        <!-- blogbox -->
                        <div class="col-md-4">
                            <div class="card card-widget">
                                <div class="card-header">
                                    <div style="text-align: center;float:none;">
                                        <h4><?php echo  escape($value['title']); ?></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="blogdetail.php?id=<?php echo escape($value['id']); ?>">
                                        <img class="img-fluid pad" src="../admin/images/<?php echo escape($value['image']); ?>" alt="Blog Photo" style="height: 200px !important;">
                                    </a>

                                </div>
                            </div>
                        </div>

                <?php
                    }
                }

                ?>
            </div>

        </section>

        <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a>

        <div class="card-footer clearfix">
            <ul class="pagination" style="float:right;">
                <li class="page-item">
                    <a class="page-link" href="?pageno=1">First</a>
                </li>
                <li class="page-item  <?php if ($pageno <= 1) {
                                            echo 'disabled';
                                        } ?>">
                    <a class="page-link" href="<?php if ($pageno <= 1) {
                                                    echo '#';
                                                } else {
                                                    echo "?pageno=" . ($pageno - 1);
                                                } ?>">Previous</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#"><?php echo $pageno; ?> </a>
                </li>
                <li class="page-item <?php if ($pageno >= $total_pages) {
                                            echo 'disabled';
                                        } ?> ">
                    <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                                                    echo '#';
                                                } else {
                                                    echo "?pageno=" . ($pageno + 1);
                                                } ?>">Next</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="?pageno=<?php echo $total_pages ?>">Last</a>
                </li>
            </ul>
        </div>


        <footer class="main-footer" style="margin-left:0px !important;">
            <div class="float-right ">
                <b>Version</b> 4
            </div>
            <strong>Copyright &copy; 2020-2021 <a href="#">Blog </a>.</strong> All rights
            reserved.
        </footer>

    </div>

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>

</body>

</html>