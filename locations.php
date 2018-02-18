<html>
<head><title>Pharmacys/Chemists locations</title>
	 <style type="text/css">
            body { font: normal 10pt Helvetica, Arial; }
            #map { width: 1050px; height: 500px; border: 0px; padding: 0px; }
        </style>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	
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
<body onload="initMap()">
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
					
					<h3 class="page-title">Pharmacys/Chemists locations</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-primary">
								<div class="panel-heading">Pharmacys/Chemists locations</div>
								<div class="panel-body bk-content">
									<?php
$conn = mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("easydoc") or die(mysql_error());
?>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <script src="http://maps.google.com/maps/api/js?key=AIzaSyDZEpVW7dw8DsZKt-PQ6ILBbSWnnh4TvZI" type="text/javascript"></script>
        <script type="text/javascript">
            //Sample code written by August Li
            var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/blue.png",
                       new google.maps.Size(32, 32), new google.maps.Point(0, 0),
                       new google.maps.Point(16, 32));
            var center = null;
            var map = null;
            var currentPopup;
            var bounds = new google.maps.LatLngBounds();
            function addMarker(lat, lng, info) {
                var pt = new google.maps.LatLng(lat, lng);
                bounds.extend(pt);
                var marker = new google.maps.Marker({
                    position: pt,
                    icon: icon,
                    map: map
                });
                var popup = new google.maps.InfoWindow({
                    content: info,
                    maxWidth: 300
                });
                google.maps.event.addListener(marker, "click", function() {
                    if (currentPopup != null) {
                        currentPopup.close();
                        currentPopup = null;
                    }
                    popup.open(map, marker);
                    currentPopup = popup;
                });
                google.maps.event.addListener(popup, "closeclick", function() {
                    map.panTo(center);
                    currentPopup = null;
                });
            }           
            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: new google.maps.LatLng(0, 0),
                    zoom: 14,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: true,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                    },
                    navigationControl: true,
                    navigationControlOptions: {
                        style: google.maps.NavigationControlStyle.ZOOM_PAN
                    }
                });
<?php
$query = mysql_query("SELECT * FROM markers")or die(mysql_error());
while($row = mysql_fetch_array($query))
{
  $name = $row['name'];
  $lat = $row['lat'];
  $lon = $row['lng'];
  $desc = $row['address'];



  echo("addMarker($lat, $lon, '<b>$name</b><br />$desc');\n");

}

?>
 center = bounds.getCenter();
     map.fitBounds(bounds);

     }
     </script>
										  <div id="map"></div>
									</div>
									
	

	<!-- Loading Scripts -->
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