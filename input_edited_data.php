<?php

    $connect = new mysqli("localhost", "root", "", "responsi");

    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $amount = $_POST['item_amount'];
    $unit = $_POST['item_unit'];
    $arrival_date = $_POST['item_arrival_date'];
    $category = $_POST['item_category'];
    $item_status = $_POST['item_status'];
    $price = $_POST['item_price'];

    $user_decision = $_POST['decision'];

    if($user_decision == "Cancel") {
        header("location:main_page.php?view=all_list");
    }
    else {
        $query = mysqli_query($connect, "update inventory set item_id='$item_code', 
        item_name='$item_name', 
        amount='$amount', 
        unit='$unit', 
        arrival_date='$arrival_date', 
        category='$category', 
        item_status='$item_status', 
        price='$price' where item_id='$item_code'");
        header("location:main_page.php?view=all_list");
    }
?>