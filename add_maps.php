<html>
<head><title>Maps</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=AIzaSyDZEpVW7dw8DsZKt-PQ6ILBbSWnnh4TvZI"></script>

<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
		function Confirm(){
			var x=confirm("Are you sure you want to delete this record?");
			if(x==true){
				return true;
			}
			else{
				return false;
			}
			return x;
		}
	</script>
</head>
<body>
	<div class="brand clearfix">
		 <a href="dashboard.php"><img src="img/Logo1.jpg" alt="" class="img-responsive logo"></a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li class="ts-account">
				<a href="#"><img src="img/doctor.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Edit Account</a></li>
					<li><a href="#">Logout</a></li>
				</ul>
			</li>
			<li><a href="#">Settings</a></li>
			<li><a href="#">Help</a></li>
		</ul>
	</div>
	
	<div class="ts-main-content">
		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				<li class="ts-label">Search</li>
				<li>
					<input type="text" class="ts-sidebar-search" placeholder="Search">
				</li>
				<li class="ts-label">Main</li>
				<?php
			include "links.php";
			?>
			
		</li>
		!-- Account from above -->
		<ul class="ts-profile-nav">
			<li class="ts-account">
				<a href="#"><img src="img/doctor" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Edit Account</a></li>
					<li><a href="#">Logout</a></li>
				</ul>
			</li>
			<li><a href="#">Settings</a></li>
			<li><a href="#">Help</a></li>
		</ul>
	</ul>
</nav>
	<div class="content-wrapper">
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-md-12">
					
					<h3 class="page-title">Maps Registration Form</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-primary">
								<div class="panel-heading">Maps</div>
								<div class="panel-body bk-content">
										<table border='0'>
											<form action="" method="post" name="doctor">	
											
              <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                          
                              <form id="loginform" class="form-horizontal" role="form" action="<?=$_SERVER['PHP_SELF']?>" method="post">


<textarea class="form-control" placeholder="Enter Area name to populate Latitude and Longitude" name="address" onFocus="initializeAutocomplete()" required="" id="locality" ></textarea><br>

<input type="hidden" class="form-control" name="city" class="form-control" id="city" placeholder="City" value="" ><br>
<input type="text" readonly="" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="" ><br>
<input type="text" readonly="" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="" ><br>
<input type="hidden" class="form-control" name="place_id" id="location_id" placeholder="Location Ids" value="" ><br>
<input type="hidden" class="form-control" name="type" value="Places" >




    



                <div style="margin-bottom: 25px" class="input-group">
                                    
    <div class="clearfix">
      <button type="submit" name="submit" class="submitbtn" value="Submit">Submit </button>
    </div>
  </div>
</form>


       
  <?php

  include "dbcon.php";
if(isset($_POST['submit'])){

  $address=$_POST['address'];
$city=$_POST['city'];
$latitude=$_POST['latitude'];
$longitude=$_POST['longitude'];
$type=$_POST['type'];


 $add = $conn->prepare("INSERT INTO markers(name,address,lat,lng,type) VALUES (?,?,?,?,?)");
   $add->execute(array($city,$address,$latitude,$longitude,$type));

  echo "<script type='text/javascript'>alert('Location Added Succesful!!');
  </script>";
}
?>  
<!-- Loading Scripts -->
<script type="text/javascript">
  function initializeAutocomplete(){
    var input = document.getElementById('locality');
    // var options = {
    //   types: ['(regions)'],
    //   componentRestrictions: {country: "IN"}
    // };
    var options = {}

    var autocomplete = new google.maps.places.Autocomplete(input, options);

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      var place = autocomplete.getPlace();
      var lat = place.geometry.location.lat();
      var lng = place.geometry.location.lng();
      var placeId = place.place_id;
      // to set city name, using the locality param
      var componentForm = {
        locality: 'short_name',
      };
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
          var val = place.address_components[i][componentForm[addressType]];
          document.getElementById("city").value = val;
        }
      }
      document.getElementById("latitude").value = lat;
      document.getElementById("longitude").value = lng;
      document.getElementById("location_id").value = placeId;
    });
  }
</script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>



</body>
</html>
											
											
											
											
											