<?php include 'connection.php';?>

<?php
$dbname = "Melanoma";
$query = 'SELECT * 
		FROM Melanoma';		
$results = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>

<head>
	<title>This data was fetched from the database</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}

		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}

		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th,
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}

		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}

		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}

		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;

		}

		.data-table tfoot th:first-child {
			text-align: left;
		}

		.data-table tbody td:empty {
			background-color: #ffcccc;
		}
	</style>
</head>

<body>
	<h1>Fetched Data From <?php echo $dbname ?> DB</h1>
	<table class="data-table">
		<caption class="title"><?php echo $dbname ?> data</caption>
		<thead>
			<tr>
				<th>No.</th>
				<th>Entry</th>
				<th>Entry name</th>
				<th>Status</th>
				<th>Protein names</th>
				<th>Gene names</th>
				<th>Organism</th>
				<th>Length</th>
			</tr>
		</thead>
		<tbody>
			<?php
		while ($row = mysqli_fetch_array($results))
		{
			?>
			<tr>
				<td><?php echo $row["id"]; ?></td>
				<td><?php echo $row["Entry"]; ?></td>
				<td><?php echo $row["Entry_name"]; ?></td>
				<td><?php echo $row["Status"]; ?></td>
				<td><?php echo $row["Protein_names"]; ?></td>
				<td><?php echo $row["Gene_names"]; ?></td>
				<td><?php echo $row["Organism"]; ?></td>
				<td><?php echo $row["Length"]; ?></td>
			</tr>
			<?php
			}

			?>
		</tbody>
	</table>
</body>

</html>