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
                    <div role="tabpanel" class="tab-pane active" id="payslip">
                         <br>
                         <form class="form-inline" action="<?php echo site_url('Payroll'); ?>" method="get">
                              <input placeholder="Year" type="text" id="filter-year" class="date form-control" name="year" value="<?php echo $this->input->get('year'); ?>">
                              <input placeholder="Month" type="text" id="filter-month" class="date form-control" name="month" value="<?php echo $this->input->get('month'); ?>">
                              <input placeholder="Day" type="text" id="filter-day" class="date form-control" name="day" value="<?php echo $this->input->get('day'); ?>">
                              <button type="submit" class="btn btn-default">Filter</button>
                              <a href="<?php echo site_url('Payroll'); ?>" class="btn btn-default">Reset</a>
                         </form>
                         <br>
                         <table class="table table-condensed table-striped">
                              <thead> <tr> <th>EARNINGS</th> </tr> </thead>
                              <tbody>
                                   <?php
                                        $fyear = $this->input->get('year');
                                        $fmonth = $this->input->get('month');
                                        $fday = $this->input->get('day');
                                        $pee_totalEarnings = 0;
                                        foreach ($payroll_entries_earnings as $pee) {
                                             $pee_totalAmount = 0;
                                             echo "<tr><th>".$pee['name']."</th><td class='text-right'>";
                                             $pee_eachAmount = $this->Payroll_model->get_payslip('earnings', $pee['id'], $fyear, $fmonth, $fday);
                                             foreach ($pee_eachAmount as $ea) {
                                                  $pee_totalAmount += $ea['amount'];
                                             }
                                             $pee_totalEarnings += $pee_totalAmount;
                                             echo number_format($pee_totalAmount,2)."</td></tr>";
                                        }
                                        echo "<tr> <th>Total Earnings</th><th class='text-right'>".number_format($pee_totalEarnings, 2)."</th> </tr>";
                                    ?>
                               </tbody>
                          </table>
                          <table class="table table-condensed table-striped">
                               <thead> <tr> <th colspan="2">DEDUCTIONS</th> </tr> </thead>
                               <tbody>
                                    <?php
                                         $ped_totalDeductions = 0;
                                         foreach ($payroll_entries_deductions as $ped) {
                                              $ped_totalAmount = 0;
                                              echo "<tr><th>".$ped['name']."</th><td class='text-right'>";
                                              $ped_eachAmount = $this->Payroll_model->get_payslip('deductions', $ped['id'], $fyear, $fmonth, $fday);
                                              foreach ($ped_eachAmount as $ea) {
                                                   $ped_totalAmount += $ea['amount'];
                                              }
                                              $ped_totalDeductions += $ped_totalAmount;
                                              echo number_format($ped_totalAmount,2)."</td></tr>";
                                         }
                                         echo "<tr> <th>Total Deduction</th><th class='text-right'>".number_format($ped_totalDeductions, 2)."</th> </tr>";
                                     ?>
                                </tbody>
                          </table>
                          <table class="table table-condensed table-striped">
                               <thead>
                                    <tr>
                                       <th>Net Pay</th> <th class='text-right'>
                                       <?php
                                            $netpay = $pee_totalEarnings - $ped_totalDeductions;
                                            echo number_format($netpay,2 );
                                       ?>
                                       </th>
                                    </tr>
                               </thead>
                          </table>
                    </div>
                    <div role="tabpanel" class="tab-pane " id="add">
                         <br>
                         <?php echo $create_payslip; ?>
                    </div>
               </div>

          </div>
     </div>
</div>
