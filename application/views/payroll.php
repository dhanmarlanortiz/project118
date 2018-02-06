<br/>
<div class="container">
     <div class="row">
          <div class="col-xs-12 col-sm-3">
               <?php
                    echo $menu;
                ?>
          </div>
          <div class="col-xs-12 col-sm-9">
               <!-- Nav tabs -->
               <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#payslip" role="tab" data-toggle="tab">Payslip</a></li>
                    <li role="presentation" ><a href="#add" role="tab" data-toggle="tab">Create</a></li>
               </ul>

               <!-- Tab panes -->
               <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="payslip">Payslip</div>
                    <div role="tabpanel" class="tab-pane " id="add">
                         <br>
                         <?php echo $create_payslip; ?>
                    </div>
               </div>

          </div>
     </div>
</div>
