<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
            </a>
        </div>

        <div class="right-topbar ml-auto">
            <ul class="navbar-nav">
                <li class="nav-item search-btn-mobile">
                    <a class="nav-link position-relative" href="javascript:;">	<i class="bx bx-search vertical-align-middle"></i>
                    </a>
                </li>
             
            
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                        <div class="media user-box align-items-center">
                            <div class="media-body user-info">
                                <p class="user-name mb-0"><?php echo $name; ?></p>
							    <p class="designattion mb-0"><?php echo $access; ?></p>
                            </div>
                            <img src="assets/images/user-holder.png" class="user-img" alt="user avatar">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="javascript:;">
                        <div class="dropdown-divider mb-0"></div>	
                        <a href="./config/logout.php" class="dropdown-item" href="javascript:;">
                            <i  class="bx bx-power-off"></i><span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>