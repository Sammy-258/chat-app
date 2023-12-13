<?php
    session_start();
    require_once("connect.php");
    if(!isset($_SESSION["user_data"])){
        header("location: login.php");
    }

    $user_data = $_SESSION["user_data"];

   
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
        <div class="row">
            <div class="col-lg-8">
               
                
            </div>
            <div class="col-lg-4">
               
                
                    <div class="mt-3 text-center">
                        <?php
                            if (is_string($user_data["user_profile"]) && strlen($user_data["user_profile"]) === 1) {
                                ?>
                                    <div class="text-center m-auto" style="width:50px;height:50px;background-color:blue;">
                                        <p class="fw-bold fs-2 text-light"><?=$user_data["user_profile"]?></p>
                                    </div>
                                <?php
                            }else{
                                ?>
                                    <img src="<?= $user_data["user_profile"] ?>" width="150" class="img-fluid rounded-circle img-thumbnail">
                                <?php
                            }
                        ?>
                        
                        <h3 class="mt-2"><?= $user_data["user_name"] ?></h3>
                        <a href="profile.php" class="btn btn-secondary mt-2 mb-2">Edit</a>
                        <a href="logout.php" class="btn btn-danger mt-2 mb-2">Logout</a>
                    </div>
                
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  </body>
</html>