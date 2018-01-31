<br>
<div class="container-fluid">
     <div class="row">
          <div class="col-xs-12 col-sm-2">
               <div class="panel panel-default">
                    <div class="panel-heading">
                         <h3 class="panel-title">Payrol Entries</h3>
                    </div>
                         <ul class="list-group">
                               <li class="list-group-item">
                                   <a class="slide-list-toggle">Earnings</a>
                                   <ul class="slide-list list-group">
                                        <?php foreach($payrol_entries_earnings as $pee):
                                                  echo "<li class='list-group-item' id='pee-".$pee['id']."'>".$pee['name']."</li>";
                                             endforeach; ?>
                                   </ul>
                              </li>
                               <li class="list-group-item">
                                   <a class="slide-list-toggle">Deductions</a>
                                   <ul class="slide-list">
                                        <?php foreach($payrol_entries_deductions as $ped):
                                                  echo "<li id='ped-".$ped['id']."'>".$ped['name']."</li>";
                                             endforeach; ?>
                                   </ul>
                              </li>
                         </ul>
               </div>


          </div>
          <div class="col-xs-12 col-sm-10">
          </div>
     </div>

</div>
