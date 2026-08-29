<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Electric Bill Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #f2f6fc;
    padding: 20px;
}

.container {
    max-width: 700px;
    margin: auto;
    background: #ffffff;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

h1 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
}

.bill-form {
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 12px;
    background: #2563eb;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background: #1e40af;
}


</style>
<body>
<?php
include "conn.php";

if (isset($_POST['submit'])) {
    $name  = $_POST['name'];
    $meter = $_POST['meter'];
    $month = $_POST['month'];
    $units = $_POST['units'];

    $sql = "INSERT INTO bill (customer_name, meter_number, bill_month, units_consumed)
            VALUES ('$name', '$meter', '$month', '$units')";

    if (mysqli_query($conn, $sql)) {
        header("Location: view.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<div class="container">
    <h1>Electric Bill Management System</h1>

    <form method="POST" class="bill-form">
    <div class="form-group">
        <label>Customer Name</label>
        <input type="text" name="name" required>
    </div>

    <div class="form-group">
        <label>Meter Number</label>
        <input type="text" name="meter" required>
    </div>

    <div class="form-group">
        <label>Month</label>
        <input type="month" name="month" required>
    </div>

    <div class="form-group">
        <label>Units Consumed (kWh)</label>
        <input type="number" name="units" required>
    </div>

    <button type="submit" name="submit">SUBMIT</button>
</form>


</div>

</body>
</html>
