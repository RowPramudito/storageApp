<?php

    $connect = new mysqli("localhost", "root", "", "responsi");

    $item_to_delete_id = $_GET['delete_item'];

    $query = mysqli_query($connect, "delete from inventory where item_id='$item_to_delete_id'");

    header("location:main_page.php?view=all_list");

?>