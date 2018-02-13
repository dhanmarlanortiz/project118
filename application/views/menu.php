<?php
     $page = $this->router->fetch_class();
?>
<div class="sidebar">
     <ul class="">
          <li class=" <?php echo $page=='Dashboard' ? 'active' : '' ?>">
               <a href="<?php echo site_url('Dashboard'); ?>">Dashboard</a>
          </li>
          <li class=" <?php echo $page=='Payroll' ? 'active' : '' ?>">
               <a href="<?php echo site_url('Payroll'); ?>">Payroll</a>
          </li>
          <li class=" <?php echo $page=='User' ? 'active' : '' ?>">
               <a href="<?php echo site_url('User/user_accounts'); ?>">User Accounts</a>
          </li>
          <li class="">
               <a href="<?php echo site_url('User/logout'); ?>">Logout</a>
          </li>
     </ul>
</div>
