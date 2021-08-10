<?php 
	include('dbh.php');
	include('user.php');
	include 'inc/header.php';
	include 'inc/right_navbar.php';
	include 'inc/left_navbar.php';
?>

	

	<!-- Dasboard content start here -->

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Patient Information</h4>
							<p class="mb-30">All asterisk (*) must be fill</p>
						</div>
						<div class="pull-right">
							<a href="patient.php" class="btn btn-primary btn-sm scroll-click" >List of patient</a>
						</div>
					</div>
					<?php
						if(isset($_POST['Submit']))
                {
                    $fullname = $_POST['fullname'];
                    $dob = $_POST['dob'];
                    $hospID = $_POST['hospID'];
                    $gender = $_POST['gender'];
                    $phoneNo = $_POST['phoneNo'];
                    $req_fields = array('fullname','dob','hospID', 'gender', 'phoneNo' );
				    $errors = $object->validate_fields($req_fields);
				        if(count($errors) > 0){
				        	
				        	echo '<div class ="alert alert-danger">'.'All field asterisk field is required'.'</div>';
				        	// var_dump($errors);
				        }
				        else
				        	$object->insertpatient($fullname,$dob,$hospID,$gender,$phoneNo);

                   
                }
					?>
					<form method="post" action="addPatient.php">
						<div class="form-group">
							<label>Fullname <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="fullname" required>
						</div>
						<div class="form-group">
							<label>Date of Birth <span class="text-danger">*</span></label>
							<input class="form-control" name="dob" type="date" required>
						</div>
						<div class="form-group">
							<label>Hospital No <span class="text-danger">*</span></label>
							<input class="form-control" name="hospID" type="text">
						</div>
						<div class="form-group">
							<label>Gender <span class="text-danger">*</span></label>
							<select class="form-control" name="gender">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label>Phone No <span class="text-danger">*</span></label>
							<input class="form-control" name="phoneNo" type="text">
						</div>
						<div>
							<button class="btn btn-primary btn-block" name="Submit">Submit</button>
						</div>
					</form>
		
			<!-- footer start -->
			
<?php 
	
	include 'inc/footer.php';
?>