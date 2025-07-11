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
	<meta name="theme-color" content="#4caf50">
	<title>All Complaints</title>
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
		/* Global Styles */
		body {
			font-family: 'Arial', sans-serif;
			background-color: #f4f7fc;
			color: #333;
			line-height: 1.6;
		}

		.page-title {
			font-size: 30px;
			font-weight: bold;
			color: #4caf50;
			margin-bottom: 30px;
			text-align: center;
		}

		.panel {
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			background-color: #fff;
		}

		.panel-heading {
			background-color: #4caf50;
			color: white;
			font-weight: bold;
			border-radius: 8px 8px 0 0;
			text-align: center;
		}

		.panel-body {
			padding: 30px;
		}

		/* Table Styles */
		.table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}

		.table th, .table td {
			padding: 15px;
			text-align: center;
		}

		.table th {
			background-color: #4caf50;
			color: white;
			border-radius: 5px 5px 0 0;
		}

		.table tr:nth-child(even) {
			background-color: #f9f9f9;
		}

		.table tr:hover {
			background-color: #e0f7fa;
		}

		.table td a {
			color: #4caf50;
			font-size: 20px;
			text-decoration: none;
		}

		/* Button Styles */
		.btn-custom {
			background-color: #4caf50;
			color: #fff;
			border-radius: 8px;
			padding: 12px 20px;
			font-size: 16px;
			border: none;
			cursor: pointer;
			transition: background-color 0.3s ease, transform 0.2s ease-in-out;
		}

		.btn-custom:hover {
			background-color: #45a049;
			transform: scale(1.05);
		}

		/* Mobile Responsiveness */
		@media (max-width: 768px) {
			.page-title {
				font-size: 24px;
			}
			.table th, .table td {
				font-size: 12px;
				padding: 10px;
			}
			.panel-body {
				padding: 20px;
			}
		}
	</style>

	<script language="javascript" type="text/javascript">
		var popUpWin=0;
		function popUpWindow(URLStr, left, top, width, height) {
			if(popUpWin) {
				if(!popUpWin.closed) popUpWin.close();
			}
			popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
		}
	</script>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:4%">All Complaints</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Complaint Details</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>Complaint Number</th>
											<th>Complaint Type</th>
											<th>Complaint Status</th>
											<th>Complaint Reg. Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
											<th>Complaint Number</th>
											<th>Complaint Type</th>
											<th>Complaint Status</th>
											<th>Complaint Reg. Date</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
									<?php	
									$aid = $_SESSION['id'];
									$ret = "SELECT * FROM complaints";
									$stmt = $mysqli->prepare($ret);
									$stmt->execute(); //ok
									$res = $stmt->get_result();
									$cnt = 1;
									while($row = $res->fetch_object()) {
									?>
									<tr>
										<td><?php echo $cnt; ?></td>
										<td><?php echo $row->ComplainNumber; ?></td>
										<td><?php echo $row->complaintType; ?></td>
										<td><?php 
										$cstatus = $row->complaintStatus;
										if ($cstatus == ''):
											echo "New";
										else:
											echo $cstatus;
										endif;	
										?></td>
										<td><?php echo $row->registrationDate; ?></td>
										<td>
											<a href="complaint-details.php?cid=<?php echo $row->id;?>" title="View Full Details"><i class="fa fa-desktop"></i></a>&nbsp;&nbsp;
										</td>
									</tr>
									<?php
									$cnt = $cnt + 1;
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

</body>

</html>
