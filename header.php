<div class="header-section">
    <!--toggle button start-->
    <a class="toggle-btn"><i class="fa fa-bars"></i></a>
    <!--notification menu start -->
    <div class="menu-right">
        <ul class="notification-menu">
			<li>
			<span  class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="color:brown;"><?php echo date('d F Y'); ?></span>
			</li>
            <li>
                <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">

                    <?php echo $_SESSION['username']; ?>
                    
                </a>
                
            </li>

                    <li><a class="btn btn-default dropdown-toggle"  href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
               
        </ul>
    </div>
    <!--notification menu end -->

</div>
