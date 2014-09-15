<?php
$current_parrent = $this->uri->segment(2);
?>
<div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="<?=active_menu_class('dashboard',2);?>" href="<?=base_url()?>admin/dashboard">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="<?=active_menu_class('admin_users',2);?>" href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>Admin/Employees</span>
                    </a>
                    <ul class="sub">
                        
                        <li><a href="<?=base_url()?>admin/admin_users">List Admin/Employees</a></li>
                        <li><a href="<?=base_url()?>admin/admin_users/addUser">Add admin/Employee</a></li>
                        
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a class="<?=active_menu_class('users',2);?>" href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                        
                        <li><a href="<?=base_url()?>admin/users">Users/Contacts</a></li>
                        <li><a href="<?=base_url()?>admin/users/addUser">Add User/Contact</a></li>
                        
                    </ul>
                </li>
                
                
                
                
                
                
                
                
                
            </ul>
            <!-- sidebar menu end-->
        </div>