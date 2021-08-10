<!-- Left Navbar -->
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="./vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="./vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<?php 
						if ($_SESSION['usertype'] == 'superAdmin') {
					?>
						
						
					<li>
						<a href="dashboard.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Patient</span>
						</a>
						<ul class="submenu">
							<li><a href="addPatient.php">New Patient</a></li>
							<li><a href="patient.php">Manage Patient</a></li>
						</ul>
					</li>
					<<!-- li>
						<a href="patient.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Patient</span>
						</a>
					</li> -->
					<li>
						<a href="donors.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Donor</span>
						</a>
					</li>
					<li>
						<a href="bloodDonation.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Blood Donations</span>
						</a>
					</li>
					<li>
						<a href="request.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Handed Over</span>
						</a>
					</li>
					<li>
						<a href="user.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Users</span>
						</a>
					</li>
					<?php 
					}
					?>
					
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>