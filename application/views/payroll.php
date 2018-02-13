<div class="container page">
     <div class="row">
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
               <?php
                    echo $menu;
                ?>
          </div>
          <div class="col-xs-12 col-sm-9 col-md-5 col-lg-5">
               <div class="main-content">
                    <div class="tab-content">
                         <div role="tabpanel" class="tab-pane active" id="list">
                              <form class="form-inline filter-payslip" action="<?php echo site_url('Payroll'); ?>" method="get">
                                   <label for=""><i class="fa fa-filter"></i> Filter : </label>
                                   <input placeholder="Year" type="text" id="filter-year" class="date" name="year" value="<?php echo $this->input->get('year'); ?>">
                                   <input placeholder="Month" type="text" id="filter-month" class="date" name="month" value="<?php echo $this->input->get('month'); ?>">
                                   <input placeholder="Day" type="text" id="filter-day" class="date" name="day" value="<?php echo $this->input->get('day'); ?>">
                                   <button type="submit" class="">
                                        <i class="fa fa-arrow-right"></i>
                                   </button>
                                   <a href="<?php echo site_url('Payroll'); ?>" class="">
                                        <i class="fa fa-refresh"></i>
                                   </a>
                              </form>
                              <br>
                              <table class="payslip-table">
                                   <thead> <tr> <th colspan="2">EARNINGS</th> </tr> </thead>
                                   <tbody>
                                        <?php
                                        $fyear = $this->input->get('year');
                                        $fmonth = $this->input->get('month');
                                        $fday = $this->input->get('day');
                                        $pee_totalEarnings = 0;
                                        foreach ($payroll_entries_earnings as $pee) {
                                             $pee_totalAmount = 0;
                                             echo "<tr><td>".$pee['name']."</td><td class='text-right'>";
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
                                   <thead> <tr> <th colspan="2">DEDUCTIONS</th> </tr> </thead>
                                   <tbody>
                                        <?php
                                        $ped_totalDeductions = 0;
                                        foreach ($payroll_entries_deductions as $ped) {
                                             $ped_totalAmount = 0;
                                             echo "<tr><td>".$ped['name']."</td><td class='text-right'>";
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
                                   <thead> <tr> <th colspan="2">INCOME</th> </tr> </thead>
                                   <tbody>
                                        <tr>
                                             <th>Net Pay</th> <th class='text-right'>
                                                  <?php
                                                  $netpay = $pee_totalEarnings - $ped_totalDeductions;
                                                  echo number_format($netpay,2 );
                                                  ?>
                                             </th>
                                        </tr>
                                   </tbody>
                              </table>
                              <br>
                              <a class="btn1 pull-right" href="#add" data-toggle="tab">Add New Payslip</a>
                              <br>
                              <br>
                         </div>
                         <div role="tabpanel" class="tab-pane" id="add">
                              <a class="" href="#list" data-toggle="tab"><i class="fa fa-arrow-left"></i> Back</a>
                              <br>
                              <br>
                              <?php echo $create_payslip; ?>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
