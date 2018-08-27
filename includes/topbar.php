<div>
<!--BEGIN BACK TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP-->
    <!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0; z-index: 2;"
             class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span
                        class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                        class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="index.php" class="navbar-brand" style="margin-top: -10px;"><span class="fa fa-rocket"></span><span
                        class="logo-text"><img src="../../images/logo.png" style="
    width: 50%;
    height: 40px!important;
    margin: auto;
" class="im img-responsive"></span><span style="display: none" class="logo-text-icon">µ</span></a>
            </div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="" alt="" class="img-responsive img-circle hidden"/>&nbsp;<span class="hidden-xs">Welcome <?php echo $_SESSION['username']; ?></span>&nbsp;<span
                            class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">

                            <?php if($_SESSION['usertype'] == ADMIN){ ?>
                            <li><a href="<?php echo BASE_PATH ?>admin/profile"><i class="fa fa-user"></i>My Profile</a></li>
                            <?php } else if($_SESSION['usertype'] == VENDOR){ ?>
                             <li><a href="<?php echo BASE_PATH ?>vendor/profile"><i class="fa fa-user"></i>My Profile</a></li>
                            <?php } else if($_SESSION['usertype'] == CP){ ?>
                            <li><a href="<?php echo BASE_PATH ?>channel_partner/profile"><i class="fa fa-user"></i>My Profile</a></li>
                            <?php } ?>
                            <li class="divider"></li>
                            <li><a href="<?php echo BASE_PATH ?>includes/logout.php"><i class="fa fa-key"></i>Log Out</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
        <!--BEGIN MODAL CONFIG PORTLET-->
        <div id="modal-config" tabindex="-1" role="dialog" aria-labelledby="modal-responsive-label"
                     aria-hidden="true" class="modal fade">            
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                        <h4 class="modal-title">Title</h4></div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL CONFIG PORTLET--></div>
    <!--END TOPBAR-->