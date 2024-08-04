<?php
    $alert=false;
    $error=false;
    $notnull=false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        require 'dbcon.php';
        $username=$_POST['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $exists=false;
        if($username==!null && $password==!null){

            if(($password===$cpassword)&&$exists==false){
                $sql = "INSERT INTO `userslogin` ( `username`, `password`, `date`) VALUES ('$username', '$password', current_timestamp())";
                $result=mysqli_query($conn,$sql);
                if($result){
                    $alert=true;
                }
            }else{
                $error="password do not match";
            }
        }else{
                $notnull="please enter the values!";
        }
    }
        
        
        ?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php require 'nav.php';?>
    <?php  
  if($alert){
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Account created!</strong> You are now loggedin.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    //   session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['username']=$_POST['username'];
      header("location:welcome.php");
    }
    if($error){
        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>error</strong> '.$error.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if($notnull){
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>error</strong> '.$notnull.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>
    <div class="container my-4">
        <h2 class="text-center">Create Your Account</h2>
        <form action="signup.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="cpassword1" class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">signup</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>