<div class="row">
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container" style="width: auto;">
				<div class="nav-collapse">
					<ul class="nav">
						<li>
							<a href="<?php echo base_url(); ?>index.php/dashboard/orders">
								Orders
							</a>
						</li>
						<li  class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								Category
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo base_url(); ?>index.php/category/add_category_screen">
										Add Category
									</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>index.php/category/remove_category_screen">
										Remove Category
									</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								Menu Items
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo base_url(); ?>index.php/dashboard/add_item">
										Add Menu Items
									</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>index.php/dashboard/remove_item">
										Remove Menu Items
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>index.php/dashboard/settings">Settings</a>
						</li>
						<li class="divider-vertical" style="margin-left: 525px;"></li>
						<li>
							<a href="<?php echo base_url(); ?>index.php/start/logout">Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>