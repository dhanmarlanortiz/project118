<div class="container">
     <div class="row">
          <div class="col-xs-12 col-sm-3">
               <?php
                    echo $menu;
                ?>
          </div>
          <div class="col-xs-12 col-sm-4">
			<?php
				if(isset($form)) {
					echo $form;
					echo validation_errors();
					if(isset($create_alert)) {
						echo $create_alert;
					}else if(null !== $this->input->get('create_alert')) {
						echo $this->input->get('create_alert');
					}
				}
				else {
					echo "Page not found.";
				}
			?>
          </div>
		<div class="col-xs-12 col-sm-5">
			<?php
				if(isset($user_table)) {
					echo $user_table;
				}
				else {
					echo "No records found.";
				}
			?>
		</div>
     </div>
</div>
