<?php
session_start();
require '../Config/config.php';

if (empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])) {
    header('location:login.php');
}

?>
<?php include('header.php'); ?>
<!-- Header -->

<?php
if ($_POST) {
    if(empty($_POST['title']) || empty($_POST['content']) ){
        if(empty($_POST['title'])){
            $titleError = 'Title cannot be null';
        }
        if(empty($_POST['content'])){
            $contentError = 'Content cannot be null';
        }
    }else{
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        // var_dump($_FILES);
        if ($_FILES['image']['name'] != null) {
            $file = 'images/' . ($_FILES['image']['name']);
            $imageType = pathinfo($file, PATHINFO_EXTENSION);
            // $imageType = $_FILES['image']['type'];
            // var_dump($imageType);

            if ($imageType != 'png' && $imageType != 'jpg' && $imageType != 'jpeg') {
                echo "<script> alert('Image must be png,jpg,jpedg')</script>";
            } else {
                move_uploaded_file($_FILES['image']['tmp_name'], $file);

                $title = $_POST['title'];
                $content = $_POST['content'];
                $image = $_FILES['image']['name'];

                $stmt =  $pdo->prepare("UPDATE posts SET title='$title',content='$content',image='$image' WHERE id=$id");
                $result =  $stmt->execute();
                if ($result) {
                    echo  "<script>alert('Successfully updated!!!');window.location.href='index.php'</script>";
                }
            }
        } else {
            $stmt =  $pdo->prepare("UPDATE posts SET title='$title',content='$content' WHERE id=$id");
            $result =  $stmt->execute();
            if ($result) {
                echo  "<script>alert('Successfully updated!!!');window.location.href='index.php'</script>";
            }
        }
    }
    
}


$id = $_GET['id'];
$stmt = $pdo->prepare("select * from posts where id=$id");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($result);

?>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- table -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Blog listing</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" name="id" value="<?php echo $result['id'] ?>" hidden>
                        <label for="title" name="title"> Title</label><p style="color:red;display:inline;"><?php echo empty($titleError) ? '' : '*'.$titleError ?></p>
                        <input type="text" class="form-control" name="title" value="<?php echo $result['title'] ?>" >
                    </div>

                    <div class="form-group">
                        <label for="content" name="content"> Content</label><p style="color:red;display:inline;"><?php echo empty($contentError) ? '' : '*'.$contentError ?></p><br>
                        <textarea class="form-control" name="content" id="" cols="80" rows="8" require><?php echo $result['content'] ?> </textarea>
                    </div>

                    <div class="form-group">
                        <label for="image" name="image"> Image</label><br>
                        <img src="images/<?php echo $result['image']; ?>" alt=""><br>
                        <input type="file" name="image" >
                    </div>

                    <div class="form-goup">
                        <input type="submit" value="submit" class="btn btn-success">
                        <a href="index.php" class="btn btn-warning"> Back </a>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->

            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
        <!-- /.card -->
        <!-- table -->

    </div><!-- /.container-fluid -->
</div>

</div>
<!-- /.content-wrapper -->



<!-- Footer -->
<?php include('footer.html'); ?>