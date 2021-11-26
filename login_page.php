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
    <title>Login Page</title>

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
        .login_button {
            padding: 5px 12px;
            border: none; border-radius: 5px;
            background-color: rgb(25, 43, 83);    
            color: white;
            cursor: pointer;     
        }

    </style>
</head>

<body>
    <div class="header">
        Everything Office Inventory
    </div>
    <div class="menu">
        <div class="sub-menu">
            Login
        </div>
        <form action="login-logout.php" class="login" method="POST">
            <input type="text" name="username" placeholder="Input Username">
            <input type="password" name="password" placeholder="Input Password">
            <input type="submit" value="Login" class="login_button">
        </form>
    </div>
    <div class="container">

    </div>
    <footer>
        Inventory Web 2021
    </footer>
</body>
</html>