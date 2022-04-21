<?php require "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Stravan't</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap.min.css">
	<script src="libs/jquery.slim.min.js"></script>
	<script src="libs/popper.min.js"></script>
	<script src="libs/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand navbar-light bg-light">
		<a class="navbar-brand" href="home.php">
			<img src="logo.png" alt="Stravan't" height="30">
		</a>
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="home.php">Home</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<span class="navbar-text">
					Logged in as <?=$_SESSION["username"]?>
				</span>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="logout.php">Logout</a>
			</li>
		</ul>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<h1>
					Activities
					<button type="button" class="btn btn-primary float-right mt-2" data-toggle="modal" data-target="#upload">Upload</a>
				</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Date/Time</th><th>Name</th><th>Distance</th><th>Duration</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$activities = [
								["start_time" => time(), "name" => "Foo", "miles" => 4.2, "duration" => 3600],
								["start_time" => time(), "name" => "Bar", "miles" => 6.9, "duration" => 7200],
								["start_time" => time(), "name" => "Baz", "miles" => 12, "duration" => 9600],
							];
							foreach ($activities as $activity) {
								echo "<tr>";
								echo "<td>" . date("n/d/y g:ia", $activity["start_time"]) . "</td>";
								echo "<td>" . $activity["name"] . "</td>";
								echo "<td>" . $activity["miles"] . "</td>";
								echo "<td>" . gmdate("G:i", $activity["duration"]) . "</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
			<div class="col-sm-4">
				<h1>
					Friends
					<a href="#" class="btn btn-primary float-right mt-2">Add</a>
				</h1>
				<table class="table table-sm table-striped">
					<thead>
						<tr>
							<th>Username</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$friends = [
								["username" => "Foo"],
								["username" => "Bar"],
								["username" => "Baz"],
							];
							foreach ($friends as $friend) {
								echo "<tr>";
								echo "<td>" . $friend["username"] . "</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
				<h1>
					Categories
					<a href="#" class="btn btn-primary float-right mt-2">Add</a>
				</h1>
				<table class="table table-sm table-striped">
					<thead>
						<tr>
							<th>Category</th>
							<th>Color</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$categories = [
								["name" => "Foo", "color" => "red"],
								["name" => "Bar", "color" => "green"],
								["name" => "Baz", "color" => "blue"],
							];
							foreach ($categories as $category) {
								echo "<tr>";
								echo "<td>" . $category["name"] . "</td>";
								echo "<td>" . $category["color"] . "</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="modal fade" id="upload" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Upload a new activity</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" action="upload.php" enctype="multipart/form-data">
					<div class="modal-body">
							<div class="form-group">
								<label for="file">Select GPX file (or drag and drop):</label>
								<input type="file" class="form-control-file" id="file" name="file">
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-success">Upload</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>