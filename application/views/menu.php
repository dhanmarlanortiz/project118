<?php
     $page = $this->router->fetch_class();
?>
<br/>
<ul class="nav nav-pills nav-stacked">
     <li class="<?php echo $page=='Dashboard' ? 'active' : '' ?>">
          <a href="<?php echo site_url('Dashboard'); ?>">Dashboard</a>
     </li>
     <li class="<?php echo $page=='Payroll' ? 'active' : '' ?>">
          <a href="<?php echo site_url('Payroll'); ?>">Payroll</a>
     </li>
     <li class="<?php echo $page=='User' ? 'active' : '' ?>">
          <a href="<?php echo site_url('User/user_accounts'); ?>">User Accounts</a>
     </li>
     <li>
          <a href="<?php echo site_url('User/logout'); ?>">Logout</a>
     </li>
</ul>
