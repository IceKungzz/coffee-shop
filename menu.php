<?php 
require('connect.php');

session_start();
if(!isset($_SESSION["useremp"]))
    header("location:index.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Coffee store</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        background-image: url("https://img.pikbest.com/backgrounds/20220119/coffee-background-composite_6248172.jpg!sw800");
        background-position: center;
        background-size: cover;
        height: 100vh;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
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
    .product {
      text-align: center;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: rgba(222, 184, 135, 0.8);
    }
    ul.products {
      position: relative;
      top: -20px;
      left: 250px;
      display: grid;
      justify-content: right;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      grid-gap: 20px;
      list-style: none;
    }
    .product img {
        width: 100%;
        height: 150px; /* กำหนดความสูงเท่ากันสำหรับทุกภาพ */
        object-fit: cover; /* ปรับขนาดภาพให้เต็มพื้นที่ */
        margin-bottom: 10px;
        border-radius: 10px;
    }
    .product h3 {
      color: #333;
      font-size: 18px;
      margin-bottom: 5px;
    }

    .product button {
      background-color: #4caf50;
      color: #ffffff;
      padding: 5px 10px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .product:hover {
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .product button:hover {
      background-color: #45a049;
    }
    main {
      margin: 80px auto;
      max-width: 800px;
      padding: 20px;
    }
  #popupess {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000; /* เพิ่ม z-index เพื่อให้แน่ใจว่า Popup จะอยู่บนสุด */
}

  #popupmac {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000; /* เพิ่ม z-index เพื่อให้แน่ใจว่า Popup จะอยู่บนสุด */
}
#popupcap {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000; /* เพิ่ม z-index เพื่อให้แน่ใจว่า Popup จะอยู่บนสุด */
}
#popupame {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000; /* เพิ่ม z-index เพื่อให้แน่ใจว่า Popup จะอยู่บนสุด */
}
#popupmoc {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000; /* เพิ่ม z-index เพื่อให้แน่ใจว่า Popup จะอยู่บนสุด */
}
#popuplat {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000; /* เพิ่ม z-index เพื่อให้แน่ใจว่า Popup จะอยู่บนสุด */
}

#popup-content {
  background-color: #ffffff;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
  box-shadow: 0 2px 5px rgba(59, 240, 225, 0.3);
  max-width: 1000px;
  z-index: 1001; /* เพิ่ม z-index เพื่อให้แน่ใจว่าเนื้อหาภายใน Popup จะอยู่บนสุด */
}

#popup h2 {
  color: #333;
  font-size: 24px;
  margin-top: 0;
  margin-bottom: 20px;
}




.buttons-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}

button {
  padding: 10px 20px;
  border: none;
  border-radius: 50px;
  cursor: pointer;
  font-size: 16px;
  color: #fff;
  text-transform: uppercase;
  font-weight: bold;
  transition: background-color 0.2s;
}

.hot-button {
  background-color: #ff5722;
}

.cold-button {
  background-color: #2196f3;
}

.blended-button {
  background-color: #673ab7;
}

.cancel-button {
  background-color: #9e9e9e;
}

button:hover {
  background-color: #333;
}
a{
  text-decoration: none;
  color: inherit;
}
select {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}


select option {
    font-size: 14px;
    background-color: #f5f5f5;
    color: #333;
}


select option:checked {
    background-color: #2196f3;
    color: #fff;
}
.color{
  color: green;
}







    </style>
    <script>
  
      function showPopupEspresso() {
        var popup = document.getElementById("popupess");
        popup.style.display = "flex";
      }
      function showPopupMacchiato() {
        var popup = document.getElementById("popupmac");
        popup.style.display = "flex";
      }
        function showPopupCappuccino() {
        var popup = document.getElementById("popupcap");
        popup.style.display = "flex";
      }
        function showPopupAmericano() {
        var popup = document.getElementById("popupame");
        popup.style.display = "flex";
      }
        function showPopupMocca() {
        var popup = document.getElementById("popupmoc");
        popup.style.display = "flex";
      }
        function showPopuplatte() {
        var popup = document.getElementById("popuplat");
        popup.style.display = "flex";
      }

      
      function closePopupess() {
        var popup = document.getElementById("popupess");
        popup.style.display = "none";
      }
      function closePopupmac() {
        var popup = document.getElementById("popupmac");
        popup.style.display = "none";
      }
      function closePopupcap() {
        var popup = document.getElementById("popupcap");
        popup.style.display = "none";
      }
      function closePopupame() {
        var popup = document.getElementById("popupame");
        popup.style.display = "none";
      }
      function closePopupmoc() {
        var popup = document.getElementById("popupmoc");
        popup.style.display = "none";
      }
      function closePopuplat() {
        var popup = document.getElementById("popuplat");
        popup.style.display = "none";
      }
    
    </script>
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
 <main>
    <ul class="products">
        <li class="product">
          <img src="https://easycraftcoffee.com/wp-content/uploads/2021/03/%E0%B8%97%E0%B8%B3%E0%B9%84%E0%B8%A1%E0%B8%A3%E0%B8%AA%E0%B8%8A%E0%B8%B2%E0%B8%95%E0%B8%B4-Espresso.jpg" width="200px" height="200px">
          <h3>เอสเพรสโซ่<br>Espresso</h3>
          <p>ราคาแก้วละ 35 บาท</p>
          <button onclick="showPopupEspresso()">สั่งสินค้า</button>
        </li>
        <li class="product">
            <img src="https://pbs.twimg.com/media/D6m18njUwAAHvZ2.jpg" width="200px" height="200px">
            <h3>มัคคิยาโต<br>Macchiato</h3>
            <p>ราคาแก้วละ 35 บาท</p>
            <button onclick="showPopupMacchiato()">สั่งสินค้า</button>
          </li>
          <li class="product">
            <img src="https://s359.kapook.com/pagebuilder/64c1472d-6c6f-4d4b-ad48-5f509288d2b4.jpg" width="200px" height="200px">
            <h3>คาปูชิโน่<br>Cappuccino</h3>
             <p>ราคาแก้วละ 35 บาท</p>
            <button onclick="showPopupCappuccino()">สั่งสินค้า</button>
          </li>
          <li class="product">
            <img src="https://ajnownirun.files.wordpress.com/2015/02/americano.jpg" width="200px" height="200px">
            <h3>อเมริกาโน่<br>Americano</h3>
            <p>ราคาแก้วละ 35 บาท</p>
            <button onclick="showPopupAmericano()">สั่งสินค้า</button>
          </li>
          <li class="product">
            <img src="https://1.bp.blogspot.com/-y6d6GDsHr_w/VLtoFVpPugI/AAAAAAAAAn4/xJG3-mVcf0U/s1600/IMG_1851.JPG" width="200px" height="200px">
            <h3>มอคค่า<br>Mocca</h3>
           <p>ราคาแก้วละ 35 บาท</p>
            <button onclick="showPopupMocca()">สั่งสินค้า</button>
          </li>
          <li class="product">
            <img src="https://s359.kapook.com/pagebuilder/937cadcd-2fed-4cca-a111-8bad7fbd54f8.jpg" width="200px" height="200px">
            <h3>ลาเต้<br>latte</h3>
             <p>ราคาแก้วละ 35 บาท</p>
            <button onclick="showPopuplatte()">สั่งสินค้า</button>
          </li>
    </main>
<form action="priceorder.php" method="post">
    <div id="popupess" style="display: none;">
        <div id="popup-content">
          <h2>เลือกประเภทสินค้า Espresso</h2>
          <input type="hidden" name = "useremp" value= "<?php echo isset($_SESSION['useremp']) ? $_SESSION['useremp'] : ''; ?>" >
          <input type="hidden" value="Espresso" name="coffee">
          <div class="buttons-container"> 
              <select name="select" id="">
                <option value="blended" class="cold-button">ปั่น</option>
                <option value="cold" class="cold-button" >เย็น</option>
                <option value="hot" class="cold-button">ร้อน</option>
              </select>
              <input type="number" value="0" min="0" max="10" name="amount">  
              <br><label for=""><h3>member</h3></label><input type="tel" value="0" name="member">  
              <button class="hot-button">ตกลง </button>
              <button type="reset" class="cancel-button" onclick="closePopupess()">ยกเลิก</button>
            </div>
        </div>
    </div>  
</form>

<form action="priceorder.php" method="post">
    <div id="popupmac" style="display: none;">
        <div id="popup-content">
          <h2>เลือกประเภทสินค้า Macchiato</h2>
          <input type="hidden" name = "useremp" value= "<?php echo isset($_SESSION['useremp']) ? $_SESSION['useremp'] : ''; ?>" >
          <input type="hidden" value="Macchiato" name="coffee">
           <div class="buttons-container"> 
              <select name="select">
                <option value="blended" class="cold-button">ปั่น</option>
                <option value="cold" class="cold-button" >เย็น</option>
                <option value="hot" class="cold-button">ร้อน</option>
              </select>
              <input type="number" value="0" min="0" max="10" name="amount">  
              <br><label for=""><h3>member</h3></label><input type="tel" value="0" name="member">  
              <button class="hot-button">ตกลง </button>
              <button type="reset" class="cancel-button" onclick="closePopupmac()">ยกเลิก</button>
            </div>
        </div>
    </div>  
</form>

<form action="priceorder.php" method="post">
    <div id="popupcap" style="display: none;">
        <div id="popup-content">
          <h2>เลือกประเภทสินค้า Cappuccino</h2>
          <input type="hidden" name = "useremp" value= "<?php echo isset($_SESSION['useremp']) ? $_SESSION['useremp'] : ''; ?>" >
          <input type="hidden" value="cappuccino" name="coffee">
           <div class="buttons-container"> 
              <select name="select">
                <option value="blended" class="cold-button">ปั่น</option>
                <option value="cold" class="cold-button" >เย็น</option>
                <option value="hot" class="cold-button">ร้อน</option>
              </select>
              <input type="number" value="0" min="0" max="10" name="amount">  
              <br><label for=""><h3>member</h3></label><input type="tel" value="0" name="member">  
              <button class="hot-button">ตกลง </button>
              <button type="reset" class="cancel-button" onclick="closePopupcap()">ยกเลิก</button>
            </div>
        </div>
    </div>  
</form>

<form action="priceorder.php" method="post">
    <div id="popupame" style="display: none;">
        <div id="popup-content">
          <h2>เลือกประเภทสินค้า Americano</h2>
          <input type="hidden" name = "useremp" value= "<?php echo isset($_SESSION['useremp']) ? $_SESSION['useremp'] : ''; ?>" >
          <input type="hidden" value="americano" name="coffee">
           <div class="buttons-container"> 
              <select name="select">
                <option value="blended" class="cold-button">ปั่น</option>
                <option value="cold" class="cold-button" >เย็น</option>
                <option value="hot" class="cold-button">ร้อน</option>
              </select>
              <input type="number" value="0" min="0" max="10" name="amount">  
              <br><label for=""><h3>member</h3></label><input type="tel" value="0" name="member">  
              <button class="hot-button">ตกลง </button>
              <button type="reset" class="cancel-button" onclick="closePopupame()">ยกเลิก</button>
            </div>
        </div>
    </div>  
</form>

<form action="priceorder.php" method="post">
    <div id="popupmoc" style="display: none;">
        <div id="popup-content">
          <h2>เลือกประเภทสินค้า mocca</h2>
          <input type="hidden" name = "useremp" value= "<?php echo isset($_SESSION['useremp']) ? $_SESSION['useremp'] : ''; ?>" >
          <input type="hidden" value="mocca" name="coffee">
           <div class="buttons-container"> 
              <select name="select">
                <option value="blended" class="cold-button">ปั่น</option>
                <option value="cold" class="cold-button" >เย็น</option>
                <option value="hot" class="cold-button">ร้อน</option>
              </select>
              <input type="number" value="0" min="0" max="10" name="amount">  
              <br><label for=""><h3>member</h3></label><input type="tel" value="0" name="member">  
              <button class="hot-button">ตกลง </button>
              <button type="reset" class="cancel-button" onclick="closePopupmoc()">ยกเลิก</button>
            </div>
        </div>
    </div>  
</form>

<form action="priceorder.php" method="post">
    <div id="popuplat" style="display: none;">
        <div id="popup-content">
          <h2>เลือกประเภทสินค้า latte</h2>
          <input type="hidden" name = "useremp" value= "<?php echo isset($_SESSION['useremp']) ? $_SESSION['useremp'] : ''; ?>" >
          <input type="hidden" value="latte" name="coffee">
           <div class="buttons-container"> 
              <select name="select">
                <option value="blended" class="cold-button">ปั่น</option>
                <option value="cold" class="cold-button" >เย็น</option>
                <option value="hot" class="cold-button">ร้อน</option>
              </select>
              <input type="number" value="0" min="0" max="10" name="amount">  
              <br><label for=""><h3>member</h3></label><input type="tel" value="0" name="member">  
              <button class="hot-button">ตกลง </button>
              <button type="reset" class="cancel-button" onclick="closePopuplat()">ยกเลิก</button>
            </div>
        </div>
    </div>  
</form>

    
</body>
</html>
