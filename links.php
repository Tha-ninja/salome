<?php include'auth.php'; ?>
<?php 
if($_SESSION['SESS_login'] == 'Administrator'){
print'<li class="open"><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			</li>
			<li><a href="add_doctor.php"><i class="fa fa-user"></i>Add doctor</a>
			</li>
			<li><a href="view_doctor.php"><i class="fa fa-th-list"></i>View Doctor</a>
			</li>
			<li><a href="add_doctorschedule.php"><i class="fa fa-th-list"></i>Add Doctor schedule</a>
			</li>
			<li><a href="doctor_schedule.php"><i class="fa fa-th-list"></i>View Doctor schedule</a>
			</li>
			<li><a href="add_maps.php"><i class="fa fa-th-list"></i>Add Locations</a>
			</li>
			<li><a href="locations.php"><i class="fa fa-th-list"></i>View Locations</a>
			</li>
			<li><a href="add_patient.php"><i class="fa fa-th-list"></i>Add Patient</a>
			</li>
			<li><a href="view_patient.php"><i class="fa fa-th-list"></i>View Patient Details</a>
			</li>
			<li><a href="add_appointment.php"><i class="fa fa-th-list"></i>Add Appointment</a>
			</li>
			<li><a href="view_appointment.php"><i class="fa fa-th-list"></i>View Patient Details</a>
			</li>';
		}elseif($_SESSION['SESS_login'] == 'Doctor'){
print'<li class="open"><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			</li>
			
			<li><a href="doctor_schedule.php"><i class="fa fa-th-list"></i>View Doctor schedule</a>
			</li>
			
			<li><a href="add_patient.php"><i class="fa fa-th-list"></i>Add Patient</a>
			</li>
			
			<li><a href="add_maps.php"><i class="fa fa-th-list"></i>Add Locations</a>
			</li>
			<li><a href="locations.php"><i class="fa fa-th-list"></i>View Locations</a>
			</li>
			<li><a href="view_appointment.php"><i class="fa fa-th-list"></i>View Patient Details</a>
			</li>';
		}elseif($_SESSION['SESS_login'] == 'Patient'){
print'<li class="open"><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			</li>
			<li><a href="add_appointment.php"><i class="fa fa-th-list"></i>Add Appointment</a>
			</li>
			
			<li><a href="locations.php"><i class="fa fa-th-list"></i>View Locations</a>
			</li>
			';
		}
			?>