<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?= base_url('assets/');?>favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method='POST' class="login100-form validate-form" action="page/login">
                    <span class="login100-form-title p-b-43">
                        <img src="<?= base_url('assets/');?>images/logo.png" width='50px' >   BPBD Yogyakarta
                    </span>
                    
                    <!-- <?= $this->session->flashdata('message'); ?> -->
                        
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Username</span>
                    </div>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>
                    <?php if (!empty($message=$this->session->flashdata('message'))):?>
                            <div class="alert alert-dismissible" role="alert" style="color: red">
                                <?php echo $message;?> 
                            </div>
                        <?php endif;?>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                        <hr>
                        <a href="<?= base_url('page/');?>daftar" class="login100-form-btn">
                            Daftar
                        </a>
                    </div>
                    
                </form>

                <div class="login100-more" style="background-image: url('<?= base_url('assets/');?>images/background.jpg');">
                </div>
            </div>
        </div>
    </div>
    
    

    
    
<!--===============================================================================================-->
    <script src="<?= base_url('assets/');?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="<?= base_url('assets/');?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="<?= base_url('assets/');?>vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="<?= base_url('assets/');?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="<?= base_url('assets/');?>vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url('assets/');?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="<?= base_url('assets/');?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="<?= base_url('assets/');?>js/main.js"></script>

</body>
</html>