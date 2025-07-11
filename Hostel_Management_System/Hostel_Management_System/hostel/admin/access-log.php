<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Access Log</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- Custom Styles -->
	<style>
		/* Custom table style */
		.table th, .table td {
			text-align: center;
			vertical-align: middle;
		}

		/* Add some spacing and better borders */
		.panel {
			border-radius: 8px;
		}
		
		.panel-heading {
			background-color: #4e73df;
			color: white;
			font-weight: bold;
		}

		.panel-body {
			padding: 20px;
		}

		.page-title {
			font-size: 24px;
			font-weight: 600;
			color: #4e73df;
			margin-bottom: 20px;
		}

		.table-striped > tbody > tr:nth-of-type(odd) {
			background-color: #f4f6f9;
		}

		.table-hover tbody tr:hover {
			background-color: #f1f1f1;
		}

		/* Custom button styling */
		.btn-custom {
			background-color: #4e73df;
			color: white;
			border-radius: 4px;
			font-weight: bold;
		}

		.btn-custom:hover {
			background-color: #375a8c;
		}

		/* Responsive Table */
		@media (max-width: 767px) {
			.table {
				font-size: 12px;
			}

			.page-title {
				font-size: 20px;
			}
		}
	</style>
</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:4%">Access Log</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All Courses Details</div>
							<div class="panel-body">
								<!-- Table for displaying data -->
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>User Id</th>
											<th>User Email / Reg No.</th>
											<th>IP</th>
											<th>City</th>
											<th>Country</th>
											<th>Login Time</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
											<th>User Id</th>
											<th>User Email /Reg No.</th>
											<th>IP</th>
											<th>City</th>
											<th>Country</th>
											<th>Login Time</th>
										</tr>
									</tfoot>
									<tbody>
										<?php	
										$aid=$_SESSION['id'];
										$ret="select * from userlog";
										$stmt= $mysqli->prepare($ret);
										$stmt->execute();
										$res=$stmt->get_result();
										$cnt=1;
										while($row=$res->fetch_object()) {
										?>
										<tr>
											<td><?php echo $cnt;?></td>
											<td><?php echo $row->userId;?></td>
											<td><?php echo $row->userEmail;?></td>
											<td><?php echo $row->userIp;?></td>
											<td><?php echo $row->city;?></td>
											<td><?php echo $row->country;?></td>
											<td><?php echo $row->loginTime;?></td>
										</tr>
										<?php
										$cnt++;
										} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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

	<script>
		$(document).ready(function() {
			// Initialize DataTable
			$('#zctb').DataTable({
				responsive: true, 
				paging: true,
				ordering: true,
				searching: true,
				pageLength: 10, 
				lengthMenu: [10, 25, 50, 100]
			});
		});
	</script>

</body>
</html>
