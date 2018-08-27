<div id="wrapper"><!--BEGIN SIDEBAR MENU-->
        <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    <li class="user-panel">
                        <div class="hidden thumb">
                            <img src="" alt="" class="img-circle"/></div>
                        <div class="info"><p>John Doe</p>
                            <ul class="list-inline list-unstyled">
                                <li><a href="extra-profile.html" data-hover="tooltip" title="Profile"><i class="fa fa-user"></i></a></li>
                                <li><a href="#" data-hover="tooltip" title="Setting" data-toggle="modal" data-target="#modal-config"><i class="fa fa-cog"></i></a></li>
                                <li><a href="<?php echo BASE_PATH ?>includes/logout.php" data-hover="tooltip" title="Logout"><i
                                        class="fa fa-sign-out"></i></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>

                    <?php 
                        $current_page = explode("/",$_SERVER['PHP_SELF']);
                        $current_page = $current_page[count($current_page)-2];
                     ?>

                    <!-- options for admin  -->

                <?php  if($_SESSION['usertype'] == ADMIN) { ?> 

                    <li <?php echo $current_page == 'dashboard' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo BASE_PATH ?>admin/dashboard"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Dashboard</span></a></li>

                    <li <?php echo $current_page == 'category' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>admin/category"><i class="fa fa-list fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Category</span></a></li>

                    <li <?php echo $current_page == 'subcategory' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>admin/subcategory"><i class="fa fa-list-ul fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Subcategory</span></a></li>

                    <li <?php echo $current_page == 'vendor' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>admin/vendor"><i class="fa fa-group fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Vendor</span></a></li>

                    <li <?php echo $current_page == 'business' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>admin/business"><i class="fa fa-shopping-cart fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Business</span></a></li>

                    <li <?php echo $current_page == 'review' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>admin/review">
                        <i class="fa fa-shopping-cart fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Review</span></a></li>

                    <li <?php echo $current_page == 'contactus' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>admin/contactus">
                        <i class="fa fa-shopping-cart fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Contact Us</span></a></li>

                    <li <?php echo $current_page == 'offers' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>admin/offers">
                        <i class="fa fa-star fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Offers</span></a></li>

                    <li <?php echo $current_page == 'icons' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>admin/icons"><i class="fa fa-image fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Icons</span></a></li>

                    <li <?php echo $current_page == 'channel_partner' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>admin/channel_partner"><i class="fa fa-users fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Channel Partner</span></a></li>
                   
                <?php  } else if($_SESSION['usertype'] == VENDOR) { ?> 

                    <li <?php echo $current_page == 'dashboard' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo BASE_PATH ?>vendor/dashboard"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Dashboard</span></a></li>

                    <li <?php echo $current_page == 'business' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>vendor/business">
                        <i class="fa fa-shopping-cart fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Business</span></a></li>

                    <?php if($_SESSION['offerPermits'] == 'Yes'){ ?>
                    <li <?php echo $current_page == 'offers' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>vendor/offers">
                        <i class="fa fa-star fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Offers</span></a></li>
                    <?php } ?>

                    <li <?php echo $current_page == 'review' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>vendor/review">
                        <i class="fa fa-shopping-cart fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Review</span></a></li>

                    <li <?php echo $current_page == 'profile' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>vendor/profile">
                        <i class="fa fa-user fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Profile</span></a></li>

                <?php  } else if($_SESSION['usertype'] == CP) { ?> 
                    
                     <li <?php echo $current_page == 'vendor' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>channel_partner/vendor"><i class="fa fa-group fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Vendor</span></a></li>

                    <li <?php echo $current_page == 'profile' ? 'class="active"' : ''; ?>><a href="<?php echo BASE_PATH ?>channel_partner/profile">
                        <i class="fa fa-user fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Profile</span></a></li>

                <?php } ?> 

                    </ul>
            </div>
        </nav>
        <!--END SIDEBAR MENU-->


<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">