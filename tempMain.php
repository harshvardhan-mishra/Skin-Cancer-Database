<?php
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'bioDb';
$dbname = "Main";
// Database Connection String
$con = mysql_connect($db_hostname,$db_username,$db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db_database, $con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="css/index.css">
    <title>This data was fetched from the <?php echo $dbname ?> database</title>
    <style type="text/css">
/*        body {
            font-size: 15px;
            color: #343d44;
            font-family: "segoe-ui", "open-sans", tahoma, arial;
            padding: 0;
            margin: 0;
        }*/

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
    <center>
    <div class="center-me">
        <div class="logo">
            <img src="images/logo1.png" id="logo">
        </div>
            <form action="" method="post" action="fetch.php">
                <div class="search">
                    <input class="search-box" type="text" name="term" placeholder="Enter Protein Name ">
                    <!-- <img src="images/search-icon.png" id="search-icon">
                    <img src="images/mic-icon.png" id="mic-icon"> -->
                    <!-- <input type="submit" value="Submit" /> -->

                </div>
            </form>
            
    </div>
</center>

<!-- <br><br>
<h1>Fetched Results By Filtering Protein Name from <?php echo $dbname ?> DB</h1>
<br><br>
<table class="data-table">
<tr>
<td>No</td>
<td>Cancer Type</td>
<td>ENTRY</td>
<td>ENTRY NAME</td>
<td>STATUS</td>
<td>PROTEIN NAMES</td>
<td>GENE NAMES</td>
<td>ORGANISM</td>
<td>LENGTH</td>

</tr> -->
<?php
if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);     

$sql = "SELECT * FROM Main WHERE Protein_names LIKE '%".$term."%'"; 
$r_query = mysql_query($sql); 

while ($row = mysql_fetch_array($r_query)){  
?>
<br><br>
<h1>Fetched Results By Filtering Protein Name from <?php echo $dbname ?> DB</h1>
<br><br>
<table class="data-table">
<tr>
<td>No</td>
<td>Cancer Type</td>
<td>ENTRY</td>
<td>ENTRY NAME</td>
<td>STATUS</td>
<td>PROTEIN NAMES</td>
<td>GENE NAMES</td>
<td>ORGANISM</td>
<td>LENGTH</td>

</tr>
<tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["Cancer_Type"]; ?></td>
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
<?php
}
?>
    </body>
</html>

