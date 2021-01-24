<?php
session_start();
require '../Config/config.php';
require '../Config/common.php';

if (empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])) {
    header('location:login.php');
}

?>
<?php include('header.php'); ?>
<!-- Header -->

<?php

if($_POST){
    // if (!hash_equals($_SESSION['_token'], $_POST['_token'])) die();

    $file = 'images/'.($_FILES['image']['name']);
    $imageType = pathinfo($file,PATHINFO_EXTENSION);
    // $imageType = $_FILES['image']['type'];
    // var_dump($_FILES['image']);
    if(empty($_POST['title']) || empty($_POST['content']) || empty($_FILES['image']['name'])){
        if(empty($_POST['title'])){
            $titleError = 'Title cannot be null';
        }
        if(empty($_POST['content'])){
            $contentError = 'Content cannot be null';
        }
        if(empty($_FILES['image']['name'])){
            $imageError = 'Image cannot be null';
        }
    }elseif($imageType != 'png' && $imageType != 'jpg' && $imageType != 'jpeg'  ){
        echo "<script> alert('Image must be png,jpg,jpedg')</script>";
    }else{
        move_uploaded_file($_FILES['image']['tmp_name'],$file);

        $title = $_POST['title'];
        $content = $_POST['content'];
        $image = $_FILES['image']['name'];

      
       $stmt =  $pdo -> prepare("INSERT INTO posts (title,content,author_id,image) VALUES (:title,:content,:author_id,:image)");
       $result =  $stmt-> execute(
            array(':title'=>$title,':content'=>$content,'author_id' => $_SESSION['user_id'],':image'=>$image)
        );
        if($result){
            echo  "<script>alert('Successfully added');window.location.href='index.php'</script>";
        }
    }
}

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
                <form action="add.php" method="POST" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="<?php echo escape($_SESSION['_token']); ?>">
                    <div class="form-group">
                        <label for="title" name="title"> Title</label><p style="color:red;display:inline;"><?php echo empty($titleError) ? '' : '*'.$titleError ?></p>
                        <input type="text" class="form-control" name="title" >
                    </div>

                    <div class="form-group">
                        <label for="content" name="content"> Content</label><p style="color:red;display:inline;"><?php echo empty($contentError) ? '' : '*'.$contentError ?></p><br>
                        <textarea class="form-control" name="content" id="" cols="80" rows="8" ></textarea>    
                    </div>

                    <div class="form-group">
                        <label for="image" name="image"> Image</label>
                        <p style="color:red;display:inline;"><?php echo empty($imageError) ? '' : '*'.$imageError ?></p><br>
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