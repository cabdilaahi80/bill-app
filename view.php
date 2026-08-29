<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Electric Bill View</title>
    <link rel="stylesheet" href="view.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background: #f4f6f8;
    margin: 0;
    padding: 0;
}

.container {
    width: 90%;
    margin: 40px auto;
    background: #ffffff;
    padding: 20px;
    border-radius: 6px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table thead {
    background: #0097a7;
    color: #fff;
}

table th, table td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
}

table tr:nth-child(even) {
    background: #f2f2f2;
}

.edit {
    color: #0d6efd;
    text-decoration: none;
    margin-right: 10px;
    font-weight: bold;
}

.delete {
    color: #dc3545;
    text-decoration: none;
    font-weight: bold;
}

.edit:hover,
.delete:hover {
    text-decoration: underline;
}
</style>
<body>
<?php
include "conn.php";
$sql ="SELECT *FROM bill";
$result =$conn->query($sql)
?>

<div class="container">
    <h2>Electric Bill Records</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Meter Number</th>
                <th>Month</th>
                <th>Units (kWh)</th>
                <th>Action</th>
            </tr>
        </thead>

 <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['customer_name']; ?></td>
        <td><?php echo $row['meter_number']; ?></td>
        <td><?php echo $row['bill_month']; ?></td>
        <td><?php echo $row['units_consumed']; ?></td>
    </tr>
    <?php } ?>
    </table>
</div>

</body>
</html>