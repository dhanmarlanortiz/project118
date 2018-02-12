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
