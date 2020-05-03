<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="<?php echo base_url();?>" <?php if ($page == 'dash'){echo 'class="active"';}?>><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="<?php echo base_url();?>schedule" <?php if ($page == 'schedule'){echo 'class="active"';}?>><i class="lnr lnr-calendar-full"></i> <span>Schedule</span></a></li>
						<li><a href="<?php echo base_url();?>reporting" <?php if ($page == 'reporting'){echo 'class="active"';}?>><i class="lnr lnr-file-empty"></i> <span>Reporting</span></a></li>
						<li><a href="<?php echo base_url();?>students" <?php if ($page == 'students'){echo 'class="active"';}?>><i class="lnr lnr-user"></i> <span>Students</span></a></li>
						<li>
							<a href="#administration" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-cog"></i> <span>Administration</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="administration" class="collapse <?php if ($page == 'admin/competencies' || $page == 'admin/staff' || $page == 'admin/units'){echo 'in';}?>" <?php if ($page == 'admin/staff' || $page == 'admin/units'){echo 'class="active"';}?>>
								<ul class="nav">
									<li><a href="<?php echo base_url();?>administration/staff" <?php if ($page == 'admin/staff'){echo 'class="active"';}?>>Training Staff</a></li>
									<li><a href="<?php echo base_url();?>administration/units" <?php if ($page == 'admin/units'){echo 'class="active"';}?>>Lessons and Assessments</a></li>
									
									<li><a href="<?php echo base_url();?>administration/competencies" <?php if ($page == 'admin/competencies'){echo 'class="active"';}?>>Competencies</a></li>
									<li><a href="<?php echo base_url();?>administration/statistics">Statistics</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
				<div class="main">
					<!-- MAIN CONTENT -->
					<div class="main-content">
						<div class="container-fluid">