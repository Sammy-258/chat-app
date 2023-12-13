<?php
    require_once("connect.php");
    if(!isset($_SESSION["user_data"])){

    }else{
        $user_data = $_SESSION["user_data"];
        $id  = $user_data["id"];
    }
   
    if(isset($_POST["edit"])){
        $hidden_user_profile = $_POST["hidden_user_profile"];
        $user_profile = $_POST["user_profile"];
        $name = $_POST["user_name"];
        $email = $_POST["user_email"];
        $password = $_POST["user_password"];
        $user_profile_name = $_POST["user_profile"]["name"];

        if($user_profile !== ""){
            $user_profile_name = $_POST["user_profile"]["name"];
            $user_profile_tmp_name = $_POST["user_profile"]["tmp_name"];

            if(move_uploaded_file($user_profile_tmp_name, "user_profile/$user_profile_name")){
                $sql = "UPDATE `user` SET `user_name`='$name',`user_email`='$email',`user_password`='$password',`user_profile`='$user_profile_name' WHERE `id` = '$id'";
                $result = mysqli_query($conn, $stn);

                if($result){
                    $success_message = 'successfully uploaded';
                }
            }else{
                $error_message = 'failed to uploaded'; 
            }
        }else{
            $sql = "UPDATE `user` SET `user_name`='$name',`user_email`='$email',`user_password`='$password',`user_profile`='$hidden_user_profile' WHERE `id` = '$id'";
            $result = mysqli_query($conn, $stn);

            if($result){
                $success_message = 'successfully uploaded';
            }
        }

    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    

    <div class="container">
        <br/>
        <h3 class="text-center">PHP Chat Application using Websocket</h3>
        <br/>    
        <div class="card">
        <?php
            if(isset($error_message)){
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">'.$error_message.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
            }elseif (isset($success_message)) {
                echo '
                <div class="alert alert-success">
                    '.$success_message.'  
                </div>
                ';
            }
        ?>
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">Profile</div>
                    <div class="col-md-6 text-right"><a href="chatroom.php" class="btn btn-warning btn-sm">Go to chat</a></div>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="user_name" class="form-control" required value="<?=$user_data["user_name"]?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="user_email" class="form-control" required value="<?=$user_data["user_email"]?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="user_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Profile</label>
                        <input type="file" name="user_profile" id="user_profile" class="form-control" required>
                        <img src="<?=$user_data["user_profile"]?>" class="img-fluid img-thumbnail mt-3" width="100" alt="">
                        <input type="hidden" name="hidden_user_profile" value="<?=$user_data["user_profile"]?>">
                    </div>
                    <div class="foem-group text-center">
                        <input type="submit" name="edit" class="btn btn-primary" value="Edit">
                    </div>
                </form>
            </div>
        </div>     
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  </body>
</html>