<head>
  <title>Pharmavision</title>
  <link rel="icon" type="image/x-icon" href="/Pharmavision/img/logo4.png">
</head>

<?php
session_start();
include('includes/header.php'); 
?>

<style>
  .Row {
    display: flex;
    justify-content: center;
    margin-top: 13%;
  }

  .fontLogin {
    margin-bottom: 50px;
  }

  .formGroup {
    margin-bottom: 30px;
  }

  .formGroup2 {
    margin-bottom: 60px;
  }

  .user {
    margin-bottom: 10px;
  }

</style>


<div class="container">

<!-- Outer Row -->
<div class="Row">
  <div class="row justify-content-center" >
</div>

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
              <div class="text-center">
                  <img src="/Pharmavision/img/logo4.png" width="120" alt="" class="mb-2">             
              </div>
              <h5 class="fontLogin">login untuk mengakses halaman dashboard</h5>

                <?php

                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                    }
                ?>
              </div>

                <form class="user" action="logincode.php" method="POST">

                    <div class="formGroup">
                    <input type="email" name="emaill" class="form-control form-control-user" placeholder="Enter Email Address...">
                    </div>
                    <div class="formGroup2">
                    <input type="password" name="passwordd" class="form-control form-control-user" placeholder="Password">
                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                    <hr>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php
include('includes/scripts.php'); 
?>