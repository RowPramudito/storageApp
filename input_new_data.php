<?php

    require 'connector.php';

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
        $query = mysqli_query($connect, "insert into inventory values('$item_code', '$item_name', '$amount', '$unit', '$arrival_date', '$category', '$item_status', '$price')");
        header("location:main_page.php?view=all_list");
    }
?>