<?php
include('../connections/conn.php');
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $sql = "SELECT * FROM products WHERE product_id = $product_id";
    $query_sql = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($query_sql)) {
        extract($row);

        echo "$price";
    }
}
