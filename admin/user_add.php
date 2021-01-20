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
if($_POST){
    // $file = 'images/'.($_FILES['image']['name']);
    // $imageType = pathinfo($file,PATHINFO_EXTENSION);


    // if($imageType != 'png' && $imageType != 'jpg' && $imageType != 'jpeg'  ){
    //     echo "<script> alert('Image must be png,jpg,jpedg')</script>";
    // }else{
    //     move_uploaded_file($_FILES['image']['tmp_name'],$file);
    //     $image = $_FILES['image']['name'];

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        
        if(empty($_POST['role'])){
          $role = 1;
        }else{
          $role = 0;
        }

        $stmt = $pdo -> prepare("SELECT * FROM users where email=:email");
        $stmt -> bindValue(':email',$email);
        $stmt -> execute();
        $user = $stmt -> fetch(PDO::FETCH_ASSOC);
        
        if($user){
          echo "<script>alert('Email Duplicated')</script>";
          
        }else{
          $stmt =  $pdo -> prepare("INSERT INTO users (name,email,password,role) VALUES (:name,:email,:password,:role)");
          $result =  $stmt-> execute(
               array(':name'=>$name,':email'=>$email,':password'=> $password,':role' => $role)
           );
           if($result){
               echo  "<script>alert('Successfully added new user');window.location.href='userlist.php'</script>";
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
                <h3 class="card-title">New User</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <form action="user_add.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" name="name"> Name</label>
                        <input type="name" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email" name="email"> Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password" name="password"> Password </label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="admin" name="password"> Admin &nbsp;&nbsp; </label>
                        <input type="checkbox" id="admin" name="admin" value="1">
                    </div>
                  
                    <!-- <div class="form-group">
                        <label for="image" name="image"> Image</label><br>
                        <input type="file" name="image" required>
                    </div> -->

                    <div class="form-goup">
                        <input type="submit" value="submit" class="btn btn-success">
                        <a href="userlist.php" class="btn btn-warning"> Back </a>
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