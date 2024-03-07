<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>สมัครสมาชิก</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url("https://img.pikbest.com/backgrounds/20220119/coffee-background-composite_6248172.jpg!sw800");
    background-position: center;
    background-size: cover;
}

.container {
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    padding: 50px;
    width: 300px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}

h1 {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input {
    display: flex;
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    align-items: center;

    
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
}
.navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            display: flex;
            justify-content: space-between; /* เพิ่มการจัดวางให้เนื้อหาเรียงตามแนวนอนซ้าย-ขวา */
            align-items: center; /* จัดการจัดวางให้เนื้อหาเรียงตามแนวตั้งตรงกลาง */
            padding: 10px 30px;
            z-index: 1000;
    }

    nav ul {
        list-style: none;
        display: flex;
        gap: 20px;
        margin: 0;
        padding: 0;
    }

    nav li {
        text-align: center;
        transition: background 0.3s ease;
    }

    nav li:hover {
        background: rgba(255, 255, 255, 0.8);
    }

    nav a {
        text-decoration: none;
        color: black;
        font-weight: bold;
        padding: 10px;
        font-size: large;
    }
    .color{
        color: green;
    }
    </style>
</head>
<body>
    <div class="navbar">
    <nav>
            <ul>
                <li><a href="menu.php" class="color"><?php echo strtoupper($_SESSION["useremp"]);?></a></li>
                <li><a href="menu.php">MENU</a></li>
                <li><a href="register.php">MEMBER REGISTER</a></li>
                <?php if($_SESSION["position_name"] == 'admin'){
                echo '<li><a href="adminlogin.php">ADMIN</a></li>';
                } ?>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <h1>สมัครสมาชิก</h1>
        <form id="signup-form" action="registerdata.php" method="post">
            <label for="username">ชื่อ:</label>
            <input type="text" id="username" name="fname" required>
            
            <label for="username">นามสกุล:</label>
            <input type="text" id="username" name="lname" required>

            <label for="email">อีเมล:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">เบอร์โทร:</label>
            <input type="tel" name="phone" required>
            
            <button type="submit">สมัครสมาชิก</button>
        </form>
    </div>
</body>
</html>
