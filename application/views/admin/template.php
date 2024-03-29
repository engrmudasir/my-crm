<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <base href="<?=base_url();?>" />

    <link rel="shortcut icon" href="<?=base_url()?>images/favicon.html">
    <title><?php if(isset($title)){
		echo $title;
	}
	else
	{
		echo 'My CRM';
	}
	?></title>
    <!--Core CSS -->
    <?php
	if(isset($custom_css))
	{
		$this->load->view($custom_css);
	?>
    
    <?php
	}
	else
	{
	?>
    <link href="<?=base_url()?>bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="<?=base_url()?>css/clndr.css" rel="stylesheet">
    <!--clock css-->
    <link href="<?=base_url()?>assets/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/morris-chart/morris.css">
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>css/style-responsive.css" rel="stylesheet"/>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="<?=base_url()?>js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php
	}
	?>
    <script src="<?=base_url()?>js/lib/jquery.js"></script>
</head>
<body>
<?php
$logged_user_info	=	$this->core_model->select_complete_data('admin_users',array('adminId'=>$this->session->userdata('adminId')));

?>
<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">

            <a href="<?=base_url()?>" class="logo">
                <img src="<?=base_url()?>images/logo.png" alt="">
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->

        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-tasks"></i>
                        <span class="badge bg-success">8</span>
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <li>
                            <p class="">You have 8 pending tasks</p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info clearfix">
                                    <div class="desc pull-left">
                                        <h5>Target Sell</h5>
                                        <p>25% , Deadline  12 June'13</p>
                                    </div>
                                    <span class="notification-pie-chart pull-right" data-percent="45">
                            <span class="percent"></span>
                            </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info clearfix">
                                    <div class="desc pull-left">
                                        <h5>Product Delivery</h5>
                                        <p>45% , Deadline  12 June'13</p>
                                    </div>
                                    <span class="notification-pie-chart pull-right" data-percent="78">
                            <span class="percent"></span>
                            </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info clearfix">
                                    <div class="desc pull-left">
                                        <h5>Payment collection</h5>
                                        <p>87% , Deadline  12 June'13</p>
                                    </div>
                                    <span class="notification-pie-chart pull-right" data-percent="60">
                            <span class="percent"></span>
                            </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info clearfix">
                                    <div class="desc pull-left">
                                        <h5>Target Sell</h5>
                                        <p>33% , Deadline  12 June'13</p>
                                    </div>
                                    <span class="notification-pie-chart pull-right" data-percent="90">
                            <span class="percent"></span>
                            </span>
                                </div>
                            </a>
                        </li>

                        <li class="external">
                            <a href="#">See All Tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-important">4</span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <li>
                            <p class="red">You have 4 Mails</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="<?=base_url()?>images/avatar-mini.jpg"></span>
                                <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hello, this is an example msg.
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="<?=base_url()?>images/avatar-mini-2.jpg"></span>
                                <span class="subject">
                                <span class="from">Jane Doe</span>
                                <span class="time">2 min ago</span>
                                </span>
                                <span class="message">
                                    Nice admin template
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="<?=base_url()?>images/avatar-mini-3.jpg"></span>
                                <span class="subject">
                                <span class="from">Tasi sam</span>
                                <span class="time">2 days ago</span>
                                </span>
                                <span class="message">
                                    This is an example msg.
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="<?=base_url()?>images/avatar-mini.jpg"></span>
                                <span class="subject">
                                <span class="from">Mr. Perfect</span>
                                <span class="time">2 hour ago</span>
                                </span>
                                <span class="message">
                                    Hi there, its a test
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">See all messages</a>
                        </li>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                        <i class="fa fa-bell-o"></i>
                        <span class="badge bg-warning">3</span>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <li>
                            <p>Notifications</p>
                        </li>
                        <li>
                            <div class="alert alert-info clearfix">
                                <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                <div class="noti-info">
                                    <a href="#"> Server #1 overloaded.</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="alert alert-danger clearfix">
                                <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                <div class="noti-info">
                                    <a href="#"> Server #2 overloaded.</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="alert alert-success clearfix">
                                <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                <div class="noti-info">
                                    <a href="#"> Server #3 overloaded.</a>
                                </div>
                            </div>
                        </li>

                    </ul>
                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder=" Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="<?=base_url()?>images/admin_users/<?=$logged_user_info['profile_image']?>" style="width:24px !important">
                        <span class="username"><?=$logged_user_info['first_name']?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="admin/profile"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="admin/login/logout"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
                <li>
                    <div class="toggle-right-box">
                        <div class="fa fa-bars"></div>
                    </div>
                </li>
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <?=$this->load->view('admin/include/left-side-menu');?>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <?php
	$messages = $this->messages->get();
if (is_array($messages))
				{
					if (count($messages['success']) > 0)
					{
						echo "<div class=\"alert alert-success\">";
						echo "<button type=\"button\" class=\"close close-sm\" data-dismiss=\"alert\">
                                    <i class=\"fa fa-times\"></i>
                                </button>";
						foreach ($messages['success'] as $message) {
							echo ('<div>' . $message . '</div>');
						}
						
						echo "</div>";
					}
					if (count($messages['error']) > 0)
					{
						echo "<div class=\"alert alert-danger\">";
						echo "<button type=\"button\" class=\"close close-sm\" data-dismiss=\"alert\">
                                    <i class=\"fa fa-times\"></i>
                                </button>";
						foreach ($messages['error'] as $message) {
							if (substr($message, 0, 4) == "<div>")
								echo ($message);
							else
								echo ('<div>' . $message . '</div>');
						}
						
						echo "</div>";
					}
					if (count($messages['message']) > 0)
					{
						echo "<div class=\"alert alert-info\">";
						echo "<button type=\"button\" class=\"close close-sm\" data-dismiss=\"alert\">
                                    <i class=\"fa fa-times\"></i>
                                </button>";
					
						foreach ($messages['message'] as $message) {
							echo ('<div>' . $message . '</div>');
						}
					
						echo "</div>";
					}
				}
				?>
   <?=$contents?>
    <!-- page end--> 
  </section>
</section>
    <!--main content end-->
<!--right sidebar start-->
<?=$this->load->view('admin/include/right-side');?>
<!--right sidebar end-->
</section>
<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<?php
	if(isset($custom_js))
	{
		$this->load->view($custom_js);
	?>
    
    <?php
	}
	else
	{
	?>

<script src="<?=base_url()?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="<?=base_url()?>bs3/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>js/accordion-menu/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?=base_url()?>js/scrollTo/jquery.scrollTo.min.js"></script>
<script src="<?=base_url()?>js/nicescroll/jquery.nicescroll.js" type="text/javascript"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?=base_url()?>js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?=base_url()?>assets/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?=base_url()?>assets/skycons/skycons.js"></script>
<script src="<?=base_url()?>assets/jquery.scrollTo/jquery.scrollTo.js"></script>
<script src="<?=base_url()?>js/lib/jquery.easing.min.js"></script>
<script src="<?=base_url()?>assets/calendar/clndr.js"></script>
<script src="<?=base_url()?>js/lib/underscore-min.js"></script>
<script src="<?=base_url()?>assets/calendar/moment-2.2.1.js"></script>
<script src="<?=base_url()?>js/calendar/evnt.calendar.init.js"></script>
<script src="<?=base_url()?>assets/jvector-map/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url()?>assets/jvector-map/jquery-jvectormap-us-lcc-en.js"></script>
<script src="<?=base_url()?>assets/gauge/gauge.js"></script>
<!--clock init-->
<script src="<?=base_url()?>assets/css3clock/js/script.js"></script>
<!--Easy Pie Chart-->
<script src="<?=base_url()?>assets/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="<?=base_url()?>assets/sparkline/jquery.sparkline.js"></script>
<!--Morris Chart-->
<script src="<?=base_url()?>assets/morris-chart/morris.js"></script>
<script src="<?=base_url()?>assets/morris-chart/raphael-min.js"></script>
<!--jQuery Flot Chart-->
<script src="<?=base_url()?>assets/flot-chart/jquery.flot.js"></script>
<script src="<?=base_url()?>assets/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?=base_url()?>assets/flot-chart/jquery.flot.resize.js"></script>
<script src="<?=base_url()?>assets/flot-chart/jquery.flot.pie.resize.js"></script>
<script src="<?=base_url()?>assets/flot-chart/jquery.flot.animator.min.js"></script>
<script src="<?=base_url()?>assets/flot-chart/jquery.flot.growraf.js"></script>
<script src="<?=base_url()?>js/dashboard.js"></script>
<script src="<?=base_url()?>js/custom-select/jquery.customSelect.min.js" ></script>
<!--common script init for all pages-->
<script src="<?=base_url()?>js/scripts.js"></script>
<?php
	}
?>
<?=isset($custom_javascript) ? $custom_javascript : '';?>

<!--script for this page-->
</body>
</html>