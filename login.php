<?php
    require_once("connect.php");

   
    if(isset($_POST["login"])){
        
        $user_email = $_POST["user_email"];
        $user_password = $_POST["user_password"];
       

        $stn = "SELECT * FROM user WHERE user_email = '$user_email' AND user_password = '$user_password'";
        $result = mysqli_query($conn, $stn);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION["user_data"] = $row;
            header("location: chatroom.php");
            $success_message ="details match successfully";
        }else{
            $error_message = "details does not match in the database";
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
        <div class="row">
            <div class="col-lg-5 m-auto mt-5">
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
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="" method="post">
                            
                            <div class="form-group">
                                <label for="">Enter Your email</label>
                                <input type="email" name="user_email" id="user_email" class="form-control" data-parsley-type="email" required>
                            </div>
                            <div class="form-group">
                                <label for="">Enter Your Password</label>
                                <input type="password" name="user_password" id="user_password" class="form-control" data-parsley-minlength="6" data-parsley-maxlength="12" data-parsley-pattern="[a-zA-Z]+$" required>
                            </div>
                            <div class="form-group text-center mt-4">
                                <input type="submit" name="login" class="btn btn-success form-control" value="Register">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  </body>
</html>