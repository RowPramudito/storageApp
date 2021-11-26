<!-- Code by:
Rowang Pramudito
123200098 / IF-H -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main_styling.css">
    <title>Main Page</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <style>
            * {
                font-family: 'Roboto', sans-serif;
            }
        body {
            background-color: rgb(74, 255, 246);
            margin: 10px;
        }
        .container > div {
            justify-content: center; align-items: center;
            padding-top: 20px; gap: 10px;
        }

        .default_view {
            display: 
                <?php 
                    if($_GET['view'] == "home" or empty($_GET['view'])) {
                        echo "flex";
                    }
                    else {
                        echo "none";
                    }
                ?>;
        }

        .all_list_view {
            display:
                <?php 
                    if($_GET['view'] == "all_list") {
                        echo "grid;";
                    }
                    else {
                        echo "none;";
                    }
                ?>;
            grid-template-areas: 
            "ab"
            "it";
            width: 75%;
        }
        .add_button {
            grid-area: ab;
        }
        .item_table {
            grid-area: it;
        }

        .link_buttons {
            padding: 5px 10px;
            border: none; border-radius: 5px;
            background-color: rgb(25, 43, 83);
            color: white;
            text-decoration: none;
        }
        .link_buttons:hover {
            text-decoration: underline;
        }
        table  {
            padding: 0px 10px;
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {background-color: rgb(25, 43, 83); color: white; text-align: center;}

        .add_new_list {
            display: 
                <?php 
                    if($_GET['view'] == "add_item") {
                        echo "flex";
                    }
                    else {
                        echo "none";
                    }                    
                ?>;
        }

        .edit_list {
            display: 
                <?php 
                    if($_GET['view'] == "edit_list") {
                        echo "flex";
                    }
                    else {
                        echo "none";
                    }                    
                ?>;
        }

        .delete_item_confirmation {
            display: 
                <?php 
                    if($_GET['view'] == "delete_item") {
                        echo "flex";
                    }
                    else {
                        echo "none";
                    }                    
                ?>;
        }
    </style>

    <script>
        function myFunction() {
        document.getElementById("dropdown").classList.toggle("show");
        }
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }        
    </script>
</head>

<body>
    <?php
        session_start();
        if(empty($_SESSION['username'])) {
            header("location:login_page.php");
        }
    ?>

    <div class="header">
        Everything Office Inventory
    </div>
    <div class="menu">
        <div class="sub-menu">
            <div class="home_button"><a href="main_page.php?view=home">Home</a></div>
            <div class="inventory_open"><a href="main_page.php?view=all_list">Inventory List</a></div>
            <div class="inventory_category_menu">
                <button onclick="myFunction()" class="dropbtn">List by Category</button>
                <div class="dropdown-content" id="dropdown">
                    <a href="main_page.php?view=all_list&category=buildings">Buildings</a>
                    <a href="main_page.php?view=all_list&category=vehicles">Vehicles</a>
                    <a href="main_page.php?view=all_list&category=office_inventory">Office Inventory</a>
                    <a href="main_page.php?view=all_list&category=electronics">Electronics</a>
                </div>
            </div>
        </div>
        <form action="login-logout.php" class="logout_button">
            <input type="submit" value="Logout">
        </form>
    </div>
    <div class="container">
        <div class="default_view">
            <h3>Welcome</h3><br>
            <h1><?php echo $_SESSION['full_name'] ?></h1>
        </div>

        <div class="all_list_view">
                
                <div class="add_button">
                <a href="main_page.php?view=add_item" class="link_buttons">+ add</a>
                </div>

                <table style="width:140%" class="item_table">
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Name of Goods</th>
                        <th>Amount</th>
                        <th>Unit</th>
                        <th>Coming Date</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        $connect = new mysqli("localhost", "root", "", "responsi");

                        if(empty($_GET['category'])) {
                            $query = mysqli_query($connect, "select * from inventory");
                        }
                        else if($_GET['category'] == "buildings") {
                            $query = mysqli_query($connect, "select * from inventory where category='Buildings'");
                        }
                        else if($_GET['category'] == "vehicles") {
                            $query = mysqli_query($connect, "select * from inventory where category='Vehicles'");        
                        }
                        else if($_GET['category'] == "office_inventory") {
                            $query = mysqli_query($connect, "select * from inventory where category='Office Inventory'");   
                        }
                        else if($_GET['category'] == "electronics") {
                            $query = mysqli_query($connect, "select * from inventory where category='Electronics'");
                        }

                        $num = 1;
                        $total_inventory = 0;
                        while($data = mysqli_fetch_array($query)) {
                            $total_price = $data['amount'] * $data['price'];
                    ?>
                    <tr>
                        <td><?php echo $num ?></td>
                        <td><?php echo $data['item_id'] ?></td>
                        <td><?php echo $data['item_name'] ?></td>
                        <td><?php echo $data['amount'] ?></td>
                        <td><?php echo $data['unit'] ?></td>
                        <td><?php echo $data['arrival_date'] ?></td>
                        <td><?php echo $data['category'] ?></td>
                        <td><?php echo $data['item_status'] ?></td>
                        <td><?php echo $data['price'] ?></td>
                        <td><?php echo $total_price ?></td>
                        <td>
                            <a href="main_page.php?view=edit_list&id=<?php echo $data['item_id'] ?>" class="link_buttons">Edit</a>
                            <a href="main_page.php?view=delete_item&id=<?php echo $data['item_id'] ?>&name=<?php echo $data['item_name'] ?>" class="link_buttons">Delete</a>
                        </td>
                    <?php 
                        $total_inventory += $total_price;
                        $num++;
                    } 
                    ?>
                    </tr>
                </table>
                <p><?php echo "Total Inventory = Rp." . $total_inventory ?></p>
            </div>

            <div class="add_new_list">
                <table style="width:30%">
                    <tr>
                        <th colspan="2">Add Inventory Data</th>
                    </tr>
                    <form action="input_new_data.php" method="POST">
                        <tr>
                            <td>Item Code: </td>
                            <td><input type="text" name="item_code"></td>
                        </tr>
                        <tr>
                            <td>Name of Goods: </td>
                            <td><input type="text" name="item_name"></td>
                        </tr>
                        <tr>
                            <td>Amount: </td>
                            <td><input type="number" name="item_amount"></td>
                        </tr>
                        <tr>
                            <td>Unit: </td>
                            <td><input type="text" name="item_unit"></td>
                        </tr>
                        <tr>
                            <td>Coming Date</td>
                            <td><input type="date" name="item_arrival_date"></td>
                        </tr>
                        <tr>
                            <td>Category: </td>
                            <td><select name="item_category">
                                <option value="Buildings">Buildings</option>
                                <option value="Vehicles">Vehicles</option>
                                <option value="Office Inventory">Office Inventory</option>
                                <option value="Electronics">Electronics</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <input type="radio" name="item_status" value="Well">Well
                                <input type="radio" name="item_status" value="Maintenance">Maintenance
                                <input type="radio" name="item_status" value="Damaged">Damaged
                            </td>
                        </tr>
                            <td>Unit Price</td>
                            <td><input type="number" name="item_price"></td>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="decision" value="Save">
                                <input type="submit" name="decision" value="Cancel">
                            </td>
                        </tr>
                    </form>
                </table>
            </div>

            <div class="edit_list">
                <table style="width:30%">
                    <tr>
                        <th colspan="2">Change Inventory Data</th>
                    </tr>
                    <?php 
                        $connect = new mysqli("localhost", "root", "", "responsi");
                        if(empty($_GET['id'])) {
                            header("location:main_page.php?view=all_list");
                        }
                        else {
                            $item_to_edit_id = $_GET['id'];
                            $query = mysqli_query($connect, "select * from inventory where item_id='$item_to_edit_id'"); 
                        }
                        while($data = mysqli_fetch_array($query)) {                  
                    ?>
                    <form action="input_edited_data.php" method="POST">
                        <tr>
                            <td>Item Code: </td>
                            <td><input type="text" name="item_code" value="<?php echo $data['item_id'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Name of Goods: </td>
                            <td><input type="text" name="item_name" value="<?php echo $data['item_name'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Amount: </td>
                            <td><input type="number" name="item_amount" value="<?php echo $data['amount'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Unit: </td>
                            <td><input type="text" name="item_unit" value="<?php echo $data['unit'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Coming Date</td>
                            <td><input type="date" name="item_arrival_date" value="<?php echo $data['arrival_date'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Category: </td>
                            <td><select name="item_category">
                                <option value="Buildings">Buildings</option>
                                <option value="Vehicles">Vehicles</option>
                                <option value="Office Inventory">Office Inventory</option>
                                <option value="Electronics">Electronics</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <input type="radio" name="item_status" value="Well">Well
                                <input type="radio" name="item_status" value="Maintenance">Maintenance
                                <input type="radio" name="item_status" value="Damaged">Damaged
                            </td>
                        </tr>
                            <td>Unit Price</td>
                            <td><input type="number" name="item_price" value="<?php echo $data['price'] ?>"></td>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="decision" value="Save">
                                <input type="submit" name="decision" value="Cancel">
                            </td>
                        </tr>
                    </form>
                    <?php } ?>
                </table>
            </div>
            <div class="delete_item_confirmation">
                <?php
                    if(empty($_GET['id'])) {
                        header("location:main_page.php?view=all_list");
                    }
                    else {
                        $delete_id = $_GET['id'];
                    }
                ?>
                <table style="width: 30%;">
                    <tr>
                        <th colspan="2">Clear Inventory Data</th>
                    </tr>
                    <tr>
                        <td colspan="2">Are you sure you want to delete <?php echo $_GET['name'] ?>?</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="delete.php?delete_item=<?php echo $delete_id ?>" class="link_buttons">Delete</a>
                            <a href="main_page.php?view=all_list" class="link_buttons">Cancel</a>
                        </td>
                    </tr>
                </table>
            </div>
    </div>
    <footer>
        Inventory Web 2021
    </footer>
</body>
</html>