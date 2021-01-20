<?php
session_start();
require '../Config/config.php';

if (empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])) {
    header('location:login.php');
}

$id = $_GET['id'];
$stmt = $pdo->prepare("select * from posts where id=$id");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$blog_id = $_GET['id'];
if ($_POST) {
    $content = $_POST['comment'];
    $stmt =  $pdo->prepare("INSERT INTO comments (content,author_id,post_id) VALUES (:content,:author_id,:post_id)");
    $result =  $stmt->execute(
        array(':content' => $content, ':author_id' => $_SESSION['user_id'], ':post_id' => $blog_id)
    );

    if ($result) {
        header('location:blogdetail.php?id=' . $blog_id);
    }
}

$stmt1 = $pdo->prepare("SELECT * FROM comments WHERE post_id=$blog_id ORDER BY id");
$stmt1->execute();
$cm_result = $stmt1->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($cm_result);

// echo "............................................";


$au_result=[];
if ($cm_result) {
    foreach($cm_result as $key => $value){

        $author_id = $cm_result[$key]['author_id'];
        $stmtau = $pdo->prepare("SELECT * FROM users WHERE id=$author_id");
        $stmtau->execute();
        $au_result[] = $stmtau->fetchAll(PDO::FETCH_ASSOC);
;    
    }

}

// foreach($au_result as $au_value ){
//     echo $au_value[0]['name']."     ".$cm_result[0]['content'].
//     "<br>";
// }




?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BLOG | SITE</title>
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

            <div class="container-fluid ">
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

                <div class="col-md-12">
                    <!-- Box Comment -->
                    <div class="card card-widget">
                        <div class="card-header">
                            <div style="text-align: center;float:none;">
                                <h4><?php echo $result['title'] ?></h4>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <img src="../admin/images/<?php echo $result['image']; ?>" alt="Blog Photo">

                            <p><?php echo $result['content'] ?></p>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer card-comments">
                            <div>
                                <a href="index.php" class="btn btn-default"> ««Go Back</a>
                                <h3>Comment</h3>
                                <hr>
                            </div>

                            <?php if ($cm_result) {
                            foreach ($cm_result as $key =>  $value) {
                        ?>
                                <div class="card-comment">
                                    <div class="comment-text" style="margin-left:0px !important;">
                                        <span class="username">
                                            <?php echo $au_result[$key][0]['name']; ?>
                                            <span class="text-muted float-right"><?php echo $value['created_id']; ?></span>
                                        </span><!-- /.username -->
                                        <?php echo $value['content']; ?>
                                    </div>
                                    <!-- /.comment-text -->
                                </div>

                        <?php
                            }
                        }
                        ?>

                        <!-- /.card-comment -->
                        </div>
                        <!-- /.card-footer -->
                        <div class="card-footer">
                            <form action="" method="post">
                                <!-- <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text"> -->
                                <div class="img-push">
                                    <input type="text" name="comment" class="form-control form-control-sm" placeholder="Press enter to post comment">
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                    <!-- /.col -->
                </div>
        </section>

        <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a>

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