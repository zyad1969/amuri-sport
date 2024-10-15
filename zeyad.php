<?php
    include 'connection.php';
    $id = $_GET['id'];
    $cmd = "SELECT * FROM products WHERE ID = $id ";
    $product = mysqli_query($link,$cmd);
    $row = mysqli_fetch_assoc($product);
    // take the number of products that in the cart
    $cartCmd = "SELECT COUNT(*) AS count FROM cart";
    $cart = mysqli_query($link,$cartCmd);
    $cartRow = mysqli_fetch_assoc($cart);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/zeyad.css">
    <!-- link to Google Font 'Cairo' -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <title>Amuri Sport Wear</title>
</head>
<body>
    <header id="header">
        <nav>
            <div class="logo">
                <img src="images/logo.svg" alt="logo">
            </div>
            <div class="search-bar">
                <input type="text" name="search" id="search">
                <div class="search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
            <div class="personal-info">
                <ul class="personal-icons">
                    <li class="cart-bag">
                        <a href="card.php">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span class="cart-number"><?php echo $cartRow['count'] ?></span>
                        </a>
                    </li>
                    <li><i class="fa-solid fa-circle-user"></i></li>
                    <li class="bars" onclick="ShowLinks();">
                        <i class="fa-solid fa-bars"></i>
                        <ul class="links" id="links">
                            <li><a href="index.php#top-clothes" target="_parent">أفضل الملابس</a></li>
                            <li><a href="index.oho#top-shoes">أفضل الأحذية</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="product">
            <div class="Add_product">
                <img src="<?php echo $row['Image'] ?>" alt="">
                <div class="paracraf">
                    <div class="paracraf2">
                        <p><?php echo $row['Name'] ?></p>
                        <p class="p">ألوان <?php echo $row['Colors'] ?></p>
                    </div>
                    <div class="paracraf1">
                        <p>$<?php echo $row['Price'] ?></p>
                        <form method = "post">
                            <input type="submit" name = "add" value="إضافة" onclick = "cartNumberUpdate()">
                        </form>
                        <?php 
                        if(isset($_POST['add'])) {
                            $InsertCmd = "INSERT INTO `cart`(`Product_ID`) VALUES ('$id')";
                            if(mysqli_query($link,$InsertCmd))
                            {}
                            }
                            
                        ?>
                    </div>
                </div>
            </div>
            <div class="des_product">
                <h3>وصف المنتج:</h3>
                <p><?php echo $row['Description'] ?></p>
            </div>
        </div>
    </div>
    <div class="Love">
        <div class="Red">
            <div class="point">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <p>منتجات قد تعجبك</p>
            <div class="point">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>    
        </div>
        <div class="container">
        <div class="picture">
            <div class="picture1">
                <img src="images/white-shoe.jpg" alt="">
                <div class="inf">
                    <p>$49.99$</p>
                    <p>حذاء اديداس</p>
                </div>
                <p class="v">الوان 1</p>
                <input type="button" value="المزيد">
            </div>
            <div class="picture2">
                <img src="images/gray-shoe.jpg" alt="">
                <div class="inf">
                    <p>$49.99$</p>
                    <p>حذاء اديداس</p>
                </div>
                <p class="v">الوان 1</p>
                <input type="button" value="المزيد">
            </div>
            <div class="picture3">
                <img src="images/white-shoe.jpg" alt="">
                <div class="inf">
                    <p>$49.99$</p>
                    <p>حذاء اديداس</p>
                </div>
                <p class="v">الوان 1</p>
                <input type="button" value="المزيد">
            </div>
        </div>
    </div>
    </div>
    <!-- Start Footer  -->
    <footer>
        <div class="container">
            <div class="contact-us">
                <div class="contact-text">
                    تواصل معنا
                </div>
                <div class="contact-icons">
                    <a href="http://whatsapp.com" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="http://facebook.com" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="http://instagram.com" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="http://twitter.com" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="copyRight-text">
                كل الحقوق محفوظة . العموري سبورت 2023 &copy; .
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- link to JavaScript File -->
    <script src="JavaScript/home.js"></script>
    <!-- link to cart JavaScript File  -->
    <script src="JavaScript/cart.js"></script>
</body>
</html>

<?php 
include 'close.php';
?>