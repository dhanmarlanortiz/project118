<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/styles/images/favicon.ico') ?>" />
     <title>Project 118</title>
     <link href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
     <link href="<?=base_url('assets/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
     <link href="<?=base_url('assets/styles/css/main.css')?>" rel="stylesheet">
</head>
<body id="login-page">
     <div class="container" id="login-container">
          <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="wrapper">
                         <div class="left">
                              <img class"" src="<?php echo base_url('assets/styles/images/avatar.png') ?>" alt="">
                         </div>
                         <div class="right">
                              <span>Login</span>
                              <?php
                                   echo $form;
                                   echo "<p class='err'>".validation_errors()."</p>";
                                        if (isset($check_user)) {
                                             echo "<p class='err'>".$check_user."</p>";
                                   }
                              ?>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <script src="<?=base_url('assets/bootstrap/js/jquery.min.js')?>"></script>
     <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
     <script src="<?=base_url('assets/styles/js/main.js')?>"></script>
  </body>
</html>
