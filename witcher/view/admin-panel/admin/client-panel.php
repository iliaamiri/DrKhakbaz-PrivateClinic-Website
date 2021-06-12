<?php include "infos.php";$controller = new \Controller\panel();
$user_info = $controller->start();
$user_info['Permission'] = "Client";
$panel = new \Controller\panel();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile</title>

    <!-- Bootstrap -->
    <link href="panel/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="panel/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="panel/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="panel/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="panel/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="http://<?= $infos['Domain'];?>" class="site_title"><img src="images/eye.png" alt=""> <img src="images/logoh.png" alt="drkhakbaz" style="height: 50px;"></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= $user_info['Profile_Image']?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                  <h2><?= $user_info['Username']?></h2>
                  <h2 style="color: palegreen;"><?= $user_info['Permission']?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-user"></i> Profile <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="profile">Home</a></li>
                      <li><a href="profile?parts=">Personal Info</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.php">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

          <!-- page content -->
          <div class="right_col" role="main">
              <div class="">
                  <div class="page-title">
                      <div class="title_left">
                          <h3>User Profile</h3>
                      </div>

                      <div class="title_right">
                          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                              <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Search for...">
                                  <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="clearfix"></div>

                  <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                              <div class="x_title">
                                  <h2>User Report <small>Activity report</small></h2>
                                  <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                      </li>
                                      <li class="dropdown">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                          <ul class="dropdown-menu" role="menu">
                                              <li><a href="#">Settings 1</a>
                                              </li>
                                              <li><a href="#">Settings 2</a>
                                              </li>
                                          </ul>
                                      </li>
                                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                                      </li>
                                  </ul>
                                  <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                      <div class="profile_img">
                                          <div id="crop-avatar">
                                              <!-- Current avatar -->
                                              <img class="img-responsive avatar-view" src="panel/build/images/picture.jpg" alt="Avatar" title="Change the avatar">
                                          </div>
                                      </div>
                                      <h3>Samuel Doe</h3>

                                      <ul class="list-unstyled user_data">
                                          <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                                          </li>

                                          <li>
                                              <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                                          </li>

                                          <li class="m-top-xs">
                                              <i class="fa fa-external-link user-profile-icon"></i>
                                              <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                                          </li>
                                      </ul>

                                      <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                                      <br />

                                      <!-- start skills -->
                                      <h4>Skills</h4>
                                      <ul class="list-unstyled user_data">
                                          <li>
                                              <p>Web Applications</p>
                                              <div class="progress progress_sm">
                                                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                              </div>
                                          </li>
                                          <li>
                                              <p>Website Design</p>
                                              <div class="progress progress_sm">
                                                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                                              </div>
                                          </li>
                                          <li>
                                              <p>Automation & Testing</p>
                                              <div class="progress progress_sm">
                                                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                                              </div>
                                          </li>
                                          <li>
                                              <p>UI / UX</p>
                                              <div class="progress progress_sm">
                                                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                              </div>
                                          </li>
                                      </ul>
                                      <!-- end of skills -->

                                  </div>
                                  <div class="col-md-9 col-sm-9 col-xs-12">

                                      <div class="profile_title">
                                          <div class="col-md-6">
                                              <h2>User Activity Report</h2>
                                          </div>
                                          <div class="col-md-6">
                                              <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                                  <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                  <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- start of user-activity-graph -->
                                      <div id="graph_bar" style="width:100%; height:280px;"></div>
                                      <!-- end of user-activity-graph -->

                                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                              <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                                              </li>
                                              <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                                              </li>
                                              <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                                              </li>
                                          </ul>
                                          <div id="myTabContent" class="tab-content">
                                              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                                  <!-- start recent activity -->
                                                  <ul class="messages">
                                                      <li>
                                                          <img src="images/img.jpg" class="avatar" alt="Avatar">
                                                          <div class="message_date">
                                                              <h3 class="date text-info">24</h3>
                                                              <p class="month">May</p>
                                                          </div>
                                                          <div class="message_wrapper">
                                                              <h4 class="heading">Desmond Davison</h4>
                                                              <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                              <br />
                                                              <p class="url">
                                                                  <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                                  <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                                              </p>
                                                          </div>
                                                      </li>
                                                      <li>
                                                          <img src="images/img.jpg" class="avatar" alt="Avatar">
                                                          <div class="message_date">
                                                              <h3 class="date text-error">21</h3>
                                                              <p class="month">May</p>
                                                          </div>
                                                          <div class="message_wrapper">
                                                              <h4 class="heading">Brian Michaels</h4>
                                                              <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                              <br />
                                                              <p class="url">
                                                                  <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                                  <a href="#" data-original-title="">Download</a>
                                                              </p>
                                                          </div>
                                                      </li>
                                                      <li>
                                                          <img src="images/img.jpg" class="avatar" alt="Avatar">
                                                          <div class="message_date">
                                                              <h3 class="date text-info">24</h3>
                                                              <p class="month">May</p>
                                                          </div>
                                                          <div class="message_wrapper">
                                                              <h4 class="heading">Desmond Davison</h4>
                                                              <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                              <br />
                                                              <p class="url">
                                                                  <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                                  <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                                              </p>
                                                          </div>
                                                      </li>
                                                      <li>
                                                          <img src="images/img.jpg" class="avatar" alt="Avatar">
                                                          <div class="message_date">
                                                              <h3 class="date text-error">21</h3>
                                                              <p class="month">May</p>
                                                          </div>
                                                          <div class="message_wrapper">
                                                              <h4 class="heading">Brian Michaels</h4>
                                                              <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                                              <br />
                                                              <p class="url">
                                                                  <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                                  <a href="#" data-original-title="">Download</a>
                                                              </p>
                                                          </div>
                                                      </li>

                                                  </ul>
                                                  <!-- end recent activity -->

                                              </div>
                                              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                                  <!-- start user projects -->
                                                  <table class="data table table-striped no-margin">
                                                      <thead>
                                                      <tr>
                                                          <th>#</th>
                                                          <th>Project Name</th>
                                                          <th>Client Company</th>
                                                          <th class="hidden-phone">Hours Spent</th>
                                                          <th>Contribution</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                                      <tr>
                                                          <td>1</td>
                                                          <td>New Company Takeover Review</td>
                                                          <td>Deveint Inc</td>
                                                          <td class="hidden-phone">18</td>
                                                          <td class="vertical-align-mid">
                                                              <div class="progress">
                                                                  <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                                              </div>
                                                          </td>
                                                      </tr>
                                                      <tr>
                                                          <td>2</td>
                                                          <td>New Partner Contracts Consultanci</td>
                                                          <td>Deveint Inc</td>
                                                          <td class="hidden-phone">13</td>
                                                          <td class="vertical-align-mid">
                                                              <div class="progress">
                                                                  <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                                              </div>
                                                          </td>
                                                      </tr>
                                                      <tr>
                                                          <td>3</td>
                                                          <td>Partners and Inverstors report</td>
                                                          <td>Deveint Inc</td>
                                                          <td class="hidden-phone">30</td>
                                                          <td class="vertical-align-mid">
                                                              <div class="progress">
                                                                  <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                                              </div>
                                                          </td>
                                                      </tr>
                                                      <tr>
                                                          <td>4</td>
                                                          <td>New Company Takeover Review</td>
                                                          <td>Deveint Inc</td>
                                                          <td class="hidden-phone">28</td>
                                                          <td class="vertical-align-mid">
                                                              <div class="progress">
                                                                  <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                                              </div>
                                                          </td>
                                                      </tr>
                                                      </tbody>
                                                  </table>
                                                  <!-- end user projects -->

                                              </div>
                                              <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                  <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                                      photo booth letterpress, commodo enim craft beer mlkshk </p>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="panel/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="panel/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="panel/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="panel/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="panel/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="panel/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="panel/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="panel/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="panel/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="panel/vendors/Flot/jquery.flot.js"></script>
    <script src="panel/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="panel/vendors/Flot/jquery.flot.time.js"></script>
    <script src="panel/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="panel/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="panel/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="panel/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="panel/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="panel/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="panel/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="panel/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="panel/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="panel/vendors/moment/min/moment.min.js"></script>
    <script src="panel/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="panel/build/js/custom.min.js"></script>
    <!-- Dropzone.js -->
    <script src="panel/vendors/dropzone/dist/min/dropzone.min.js"></script>
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
  </body>
</html>