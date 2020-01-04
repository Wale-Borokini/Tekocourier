<div class="sidebar-left">
	<div class="sidebar-topbar text-center">
	</div> <!-- End sidebar-topbar -->

	<div class="side-menu">
		<ul class="navbar-nav">
			<li class="nav-item" id="dashboard-link">
				<a href="admin_dashboard.php" class="items-list first">
					<span><i class="fa fa-home link-icon" data-toggle="tooltip" data-html="true"
						title="Dashboard"></i></span>
					<span class="items-list-text">Dashboard</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="#users" class="items-list" data-toggle="collapse" aria-expanded="false">
					<span><i class="fas fa-user-tie" data-toggle="tooltip" data-html="true"
						title="Users"></i></span>
					<span class="items-list-text">Bookings</span>
					<span><i class="fa fa-chevron-down arrow"></i></span>
				</a>
				<div class="collapse sub-menu" id="users">
					<a class="items-list1" href="full_view.php">Full Viev</a>
					<a class="items-list1" href="compact_view.php">Compact View</a>
				</div><!-- End sub-menu -->
			</li>
			<li class="nav-item">
				<a href="#booking" class="items-list active" data-toggle="collapse" aria-expanded="false">
					<span><i class="fas fa-suitcase-rolling" data-toggle="tooltip" data-html="true"
						title="Bookings"></i></span>
					<span class="items-list-text">Delivery Settings</span>
					<span><i class="fa fa-chevron-down arrow"></i></span>
				</a>
				<div class="collapse sub-menu" id="booking">
					<a class="items-list1" href="show_pending_packages.php">Show Pending Packages</a>
					<a class="items-list1" href="show_moving_packages.php">Show Moving Packages</a>
					<a class="items-list1" href="show_delivered_packages.php">Show Delivered Packages</a>
					<a class="items-list1" href="delete_pending_packages_from_table.php">Delete Pending Packages</a>
					<a class="items-list1" href=""></a>
				</div><!-- End sub-menu -->
			</li>
			<li class="nav-item">
				<a href="#messages" class="items-list" data-toggle="collapse" aria-expanded="false">
				<span><i class="far fa-envelope" data-toggle="tooltip" data-html="true" title="Messages"></i></span>
					<span class="items-list-text">Messages</span>
					<span><i class="fa fa-chevron-down arrow"></i></span>
				</a>
				<div class="collapse sub-menu" id="messages">
					<a class="items-list1" href="contact_form_inbox.php">Inbox</a>
					<a class="items-list1" href="delete_contact_messages.php">Delete Messages</a>
				</div><!-- End sub-menu -->
			</li>
		<?php 
		if ( $_SESSION["Admin_Role"] == 'Administrator') {
			
		 ?>	
			<li class="nav-item">
				<a href="#profile" class="items-list" data-toggle="collapse" aria-expanded="false">
                    <span><i class="fas fa-user" data-toggle="tooltip" data-html="true" title="Profile"></i></span>
					<span class="items-list-text">Manage Admins</span>
					<span><i class="fa fa-chevron-down arrow"></i></span>
				</a>
				<div class="collapse sub-menu" id="profile">
					<a class="items-list1" href="existing_admins.php">Existing Admins</a>
					<a class="items-list1" href="manage_admins.php">Add New Admin</a>
					<a class="items-list1" href="delete_admin.php">Delete Admin</a>

					
				</div><!-- End sub-menu -->
			</li>
		<?php } ?>
		</ul>
	</div><!-- End side-menu -->
	<div class="side-bar-bottom">
		<ul class="list-unstyled">
			<li class="list-inline-item" data-toggle="tooltip" data-html="true" title="Go To Site Homepage"><a href="../index.php"><i class="fas fa-home"></i></a></li>
			<li class="list-inline-item" data-toggle="tooltip" data-html="true" title="Logout"><a href="admin_logout.php"><i class="fas fa-power-off"></i></a></li>
		</ul>
	</div><!-- End side-bar-bottom -->
</div>