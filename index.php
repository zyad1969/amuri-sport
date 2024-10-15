<?php
    include "connection.php";
    $cmd = "SELECT * FROM products WHERE Type = 'clothes'";
    $clothes = mysqli_query($link,$cmd);
    $cmd = "SELECT * FROM products WHERE Type = 'shoes'";
    $shoes = mysqli_query($link,$cmd);
    // take the number of products that in the cart
    $cartCmd = "SELECT COUNT(*) AS count FROM cart";
    $cart = mysqli_query($link,$cartCmd);
    $cartRow = mysqli_fetch_assoc($cart);
?>


<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link to icon css file -->
    <link rel="stylesheet" href="CSS/all.min.css">
    <!-- link to main css file -->
    <link rel="stylesheet" href="CSS/home.css">
    <!-- internal style element -->
    <!-- link to Google Font 'Cairo' -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- End of Google Font link -->
    <title>Amuri Sport Wear</title>
</head>
<body>
    <!-- Start Header  -->
    <header id="header">
        <nav>
            <div class="logo">
                <img src="images/logo.svg" alt="logo">
            </div>
            
            <form action = "" method = "post" class="search-bar">
                <input type="text" name="search" id="search" onsubmit='showSearchResult();' onblur = "hideSearchResult()">
                <div class="search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <!-- <button style = "display: none;" name = "search-btn" id = "search-btn"></button> -->
                <div class="search-result" id = "search-result">
            <?php
            if(isset($_POST['search'])){
                // echo "<script> alert(); </script>";
                $item = $_POST['search'];
                $sql = "SELECT * FROM products WHERE Name like '%$item%' ";
                if($searched_item = mysqli_query($link,$sql))
                {
                    $item_found = false;
                    while($row = mysqli_fetch_assoc($searched_item))
                    {
                        $item_found = true;
            ?>
                <a href = "zeyad.php?id=<?php echo $row['ID']?>" class="search-item">
                    <div class="image">
                        <img src="<?php echo $row['Image'] ?>" alt="">
                    </div>
                    <div class="inform">
                        <h4><?php echo $row['Name'] ?></h4>
                        <p> <?php echo $row['Price'] ?> </p>
                    </div>
                </a>
                <?php
                    }
                    
                    if(!$item_found){
                        echo "The item is not found";
                    }
                }
            }
            ?>
            </div>
            </form>
            
            
            <div class="personal-info">
                <ul class="personal-icons">
                    <li class="cart-bag">
                        <a href="card.php">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span class="cart-number"><?php echo $cartRow['count']; ?></span>
                        </a>
                    </li>
                    <li><i class="fa-solid fa-circle-user"></i></li>
                    <li class="bars" onclick="ShowLinks();">
                        <i class="fa-solid fa-bars"></i>
                        <ul class="links" id="links">
                            <li><a href="#top-clothes">أفضل الملابس</a></li>
                            <li><a href="#top-shoes">أفضل الأحذية</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- End Header  -->
    <!-- Start Landing Area -->
    <div class="landing-image">
        
    </div>
    <!-- End Landing Area -->
    <!-- Start Top Clothes Section -->
    <div class="top-clothes" id="top-clothes">
        <div class="title-bar">
            <div class="container">
                <div class="circle-group right">
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                </div>
                <h2>أفضل الملابس</h2>
                <div class="circle-group left">
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="products-bar" id="clothes-bar">
                <?php 
                if(mysqli_num_rows($clothes) > 0)
                {
                while ( $row = mysqli_fetch_assoc($clothes)) {
                    
                    ?>
                <div class="product">
                    <div class="product-image">
                        <img src="<?php echo $row['Image'] ?>" alt="">
                    </div>
                    <div class="product-description">
                        <h4 class="product-name"><?php echo $row['Name'] ?></h4>
                        <h4 class="product-price">$<?php echo $row['Price'] ?></h4>
                    </div>
                    <div class="read-more">
                        <a href="zeyad.php?id=<?php echo $row['ID'] ?>">قراءة المزيد</a>
                    </div>
                </div>
                <?php 
                    } // The while ends here 
                } // The  if ends here
                else echo 'There is no products here'    ?>
                
                <div class="right-arrow" onclick="scrollRight(this,'.top-clothes .products-bar');">
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                <div class="left-arrow" onclick="scrollingLeft(this,'.top-clothes .products-bar');">
                    <i class="fa-solid fa-arrow-left"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- End Top Clothes Section -->
    
    <!-- Start Top Shoes Section  -->
    <div class="top-shoes" id="top-shoes">
        <div class="title-bar">
            <div class="container">
                <div class="circle-group right">
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                </div>
                <h2>أفضل الأحذية</h2>
                <div class="circle-group left">
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                    <span class="title-circle"></span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="products-bar" id="shoes-bar">
                <?php if(mysqli_num_rows($shoes) > 0)
                    {
                while ( $row = mysqli_fetch_assoc($shoes)) {
                        ?>
                <div class="product">
                    <div class="product-image">
                        <img src="<?php echo $row['Image'] ?>" alt="">
                    </div>
                    <div class="product-description">
                        <h4 class="product-name"><?php echo $row['Name'] ?></h4>
                        <h4 class="product-price">$<?php echo $row['Price'] ?></h4>
                    </div>
                    <div class="read-more">
                        <a href="zeyad.php?id=<?php echo $row['ID'] ?>">قراءة المزيد</a>
                    </div>
                </div>
                <?php 
                    } // The while ends here  
                    } // The if ends here
                    else echo "There is no products"?>
                
                <div class="right-arrow" onclick="scrollRight(this,'.top-shoes .products-bar');">
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                <div class="left-arrow" onclick="scrollingLeft(this,'.top-shoes .products-bar');">
                    <i class="fa-solid fa-arrow-left"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- End Top Shoes Section  -->

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