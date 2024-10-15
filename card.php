<?php 
    include 'connection.php';
    // take the number of products that in the cart
    $cartCmd = "SELECT COUNT(*) AS count FROM cart";
    $cart = mysqli_query($link,$cartCmd);
    $cartRow = mysqli_fetch_assoc($cart);
    /////////////////////////////////
    $selectCommand = "SELECT `Product_ID`,COUNT(Product_ID) AS 'Quant' ,Name,Price ,Image,Quantity FROM `cart` INNER JOIN products WHERE ID = Product_ID GROUP BY Product_ID";
    $products = mysqli_query($link,$selectCommand);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- link to icon css file -->
        <link rel="stylesheet" href="CSS/all.min.css">
        <!-- link to main css file -->
        <link rel="stylesheet" href = "CSS/card.css">
        <!-- link to Google Font 'Cairo' -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        <!-- End of Google Font link -->
        <style>
            .H2{
                margin-top: 15px;
                width: 700px;
            }
        </style>
    <title>السلة</title>
</head>
<body>
    <!-- Start Header  -->
    <header id="header">
        <nav>
            <div class="logo">
                <img src="images/logo.svg" alt="logo">
            </div>
            
            <form class="search-bar">
                <input type="text" name="search" id="search">
                <div class="search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </form>
            <div class="personal-info">
                <ul class="personal-icons">
                    <li class="cart-bag">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span class="cart-number"><?php echo $cartRow['count']; ?></span>
                    </li>
                    <li><i class="fa-solid fa-circle-user"></i></li>
                    <li class="bars" onclick="ShowLinks();">
                        <i class="fa-solid fa-bars"></i>
                        <ul class="links" id="links">
                            <li><a href="index.php#top-clothes">أفضل الملابس</a></li>
                            <li><a href="index.php#top-shoes">أفضل الأحذية</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- End Header  -->  

    <!-- Start Basket-->
    <div class="Basket">
        <div class="HB">السلة</div>
        <div class="H1_H2_H3">
            <div class="H1_H2">

                <div class="H1">
                    <div>#</div>
                    <div class="b">المنتج</div>
                    <div class="b">الوصف</div>
                    <div class="b">الكمية</div>
                    <div>السعر</div>
                </div>
                <?php $i = 1;
                    $sum =0;
                while($row = mysqli_fetch_assoc($products)){
                    $sum += ($row['Price'] * $row['Quant'] );
                    ?>
                <div class="H2">
                    <p><?php echo $i++ ?></p>
                    <img src="<?php echo $row['Image'] ?>" alt="">
                    <div class="b2"><?php echo $row['Name'] ?></div> 
                    <div class="b3"><?php echo $row['Quant'] ?></div> 
                    <div class="b4">$<?php echo $row['Price'] ?></div> 
                </div>
                <?php
                }
                ?>
            </div>
            <div class="H3">
                <h1>الفاتورة النهائية</h1>
                <div class="All">

                    <div class="product">
                        <p>اجمالي المنتجات</p>
                        <p>:</p>
                        <p>...................</p>
                        <p>$<?php echo $sum ?></p>  
                    </div>
    
                    <div class="product">
                        <p>سعر التوصيل</p>
                        <p class="LL">:</p>
                        <p class="pp">...................</p>
                        <p  class="nn">$10</p>  
                    </div>
    
                    <div class="product">
                        <p>اجمالي الفاتورة</p>
                        <p >:</p>
                        <p>...................</p>
                        <p>$<?php echo $sum + 10 ?></p>  
                    </div>
                </div>
                <form method = "post">
                    <input type = "submit" name = "buy" value = "اضغط لاتمام الشراء" />
                </form>
                <?php
                if(isset($_POST["buy"])){
                    $deleteCommand = "DELETE FROM cart";
                    $products = mysqli_query($link,$selectCommand);
                    while($newRow = mysqli_fetch_assoc($products)){
                        $qun =($newRow['Quantity'] - $newRow['Quant']);
                        $updateCommand = "UPDATE products SET Quantity = $qun WHERE ID = " . $newRow['Product_ID'];
                        mysqli_query($link,$updateCommand);
                    }
                    mysqli_query($link,$deleteCommand);
                }
                ?>
            </div>
        </div>       
    </div>
    <!-- End Basket-->
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
</body>
</html>
<?php
    include 'close.php';
?>