<nav id="navigation" class="navigation-sidebar navbar-expand-lg static-top bg-primary">
        <div class="navigation-header">
        <a href="<?php echo SITE_URL ?>/admin"><img src="../assets/images/wbdashboard.png" class="logo-side"></a>
    </div>

    <div class="welcome">
        <?php echo _WELCOME; ?> <b><?php echo $user['user_name']; ?></b> <a href="../controller/logout.php" class="sidebar-user"><i class="dripicons-exit"></i></a>
    </div>

    <!--Navigation Menu Links-->
    <div class="navigation-menu">

        <ul class="menu-items custom-scroll">

            <li>
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-cutlery"></i></span>
                    <span class="title"><?php echo _RECIPES; ?></span>
                </a>
                <!--Submenu-->
                <ul class="sub-menu">

                    <li>
                        <a href="../controller/recipes.php">
                            <span class="icon-thumbnail"><i class="dripicons-minus"></i></span>
                            <span class="title"><?php echo _RECIPES; ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="../controller/categories.php">
                            <span class="icon-thumbnail"><i class="dripicons-minus"></i></span>
                            <span class="title"><?php echo _CATEGORIES; ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="../controller/difficulties.php">
                            <span class="icon-thumbnail"><i class="dripicons-minus"></i></span>
                            <span class="title"><?php echo _DIFFICULTIES; ?></span>
                        </a>
                    </li>

                </ul>
            </li> 
            
            <li>
                <a href="../controller/profile.php?id=<?php echo $user['user_id']; ?>">
                    <span class="icon-thumbnail"><i class="dripicons-user"></i></span>
                    <span class="title"><?php echo _PROFILE; ?></span>
                </a>
            </li>



</ul>
</div>
</nav>

<div class="header fixed-header">
            <div class="container-fluid side-padding">
                <div class="row">
                    <div class="col-7 col-md-6 d-lg-none">
                        <a id="toggle-navigation" href="javascript:void(0);" class="icon-btn mr-3"><i class="fa fa-bars"></i></a>
                        <img src="../assets/images/wbdashboard-dark.png" class="logo-side-dark">
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <p class="sidebar-relative"><?php echo _WELCOME; ?> <b><?php echo $user['user_name']; ?></b> <a href="../controller/logout.php" class="sidebar-logout"><i class="dripicons-exit"></i></a></p>
                    </div>
                    
                    <div class="col-5 col-md-6 col-lg-4 sidebar-right">
                    <span style="position: relative; float: right;"> <a href="<?php echo SITE_URL ?>" target="_blank" style="color: var(--primary-color); top: -2px; position: relative; margin-right: 8px; font-weight: 300; font-size: 14px; margin-left: 6px;"><i class="dripicons-preview" style="top: 5px; position: relative; font-size: 22px; margin-right: 6px;"></i> <?php echo _VIEWSITE; ?></a></span>
                    </div> 

                </div>
            </div>
        </div>