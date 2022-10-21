<!DOCTYPE html>
<html>
<head>
	<title>PHP/MySQLi CRUD Operation using Bootstrap/Modal</title>
	<script src="js/j1.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="js/j2.js"></script>
</head>
<body>
<div class="container">
	<div style=""></div>
	<div class="well" style=" width:80%;">
	<span style="font-size:25px; color:black"><center><strong>Users</strong></center></span>
		<span class="pull-left"><a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
		<div style="height:50px;"></div>
		<table style="font-size:9px;"class="table table-striped table-bordered table-hover">
			<thead>
				<th>ID</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>E-Mail</th>
				<th>Password</th>
				<th>Num</th>
				<th>Adress</th>
				<th>Point Fid</th>
				<th>Nmbr Cmnd</th>
				<th>Verif Email</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					include('conn.php');

					$query=mysqli_query($conn,"select * from `user`");
					while($row=mysqli_fetch_array($query)){
						?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['nom']; ?></td>
						<td><?php echo $row['prenom']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['mdp']; ?></td>
						<td><?php echo $row['num']; ?></td>
						<td><?php echo $row['adresse']; ?></td>
						<td><?php echo $row['point_fid']; ?></td>
						<td><?php echo $row['nbr_cmnd']; ?></td>
						<td><?php echo $row['verifemail']; ?></td>
						<td>
							<a style="font-size:9px;" href="#edit<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> ||
							<a style="font-size:9px;" href="#del<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
							<?php require'button.php'; ?>
						</td>
					</tr>
					<?php
				}

			?>
			</tbody>
		</table>
	</div>
	<?php require 'add_modal.php'; ?>
</div>
</body>
</html>
