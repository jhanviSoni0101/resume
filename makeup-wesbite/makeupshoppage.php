<?php
include('./components/connection.php');
$min_pr_sql = "select min(price) as minprice from makeup";
$min_result = mysqli_query($conn, $min_pr_sql);
$min_price = mysqli_fetch_assoc($min_result)['minprice'];
$max_pr_sql = "select max(price)  as maxprice from makeup";
$max_result = mysqli_query($conn, $max_pr_sql);
$max_price = mysqli_fetch_assoc($max_result)['maxprice'];
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$range = isset($_GET['range']) ? $_GET['range'] : 900;
$sqln = "select count(productid) as total from makeup where price<=$range";
$resultn = mysqli_query($conn, $sqln);
$rown = mysqli_fetch_assoc($resultn)["total"];
$product_per_page = 6;
$page_count = ceil($rown / $product_per_page);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('./components/headers.php'); ?>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .wishlist-btn {
            border: none;
            background: transparent;
            font-size: 20px;
            padding: 0;
        }
    </style>
</head>

<body>
    <a href="#subnav"><i class="fa-solid fa-arrow-up go-to-top"></i></a>
    <?php include('./components/header.php'); ?>
    <?php include('./components/sab-nav.php'); ?>
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                <?php
                $sqlcart = "select sum(qty) as totalproduct from cart";
                $resultcart = mysqli_query($conn, $sqlcart);
                $totalproduct = mysqli_fetch_assoc($resultcart);

                ?>
                <div class=" mb-5  border-bottom">
                    <h5>CART</h5>
                    <p class="text-secondary ms-4 py-4">
                        <?php
                        if ($totalproduct['totalproduct'] > 0) {
                            echo $totalproduct['totalproduct'] . " Products in cart";
                        } else {
                            echo "No products in the cart";
                        }
                        ?>
                    </p>
                </div>
                <div class=" mb-5 border-bottom">
                    <h5>FITLER</h5>
                    <form method="GET">
                        <input type="text" style="display: none;" value="1" name="page">
                        <input type="range" class="form-range price-filter" min="<?php echo $min_price?>" max="<?php echo $max_price ?>" step="10" value="<?php echo $range?>" name="range">
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn1 btn-primary btn-sm rounded-0 px-4 mb-5" type="submit">FILTER</button>
                            <p class="text-secondary mb-0">Price: $10 — $<span class="price-range"><?php echo $range ?></span></p>
                        </div>
                    </form>
                </div>
                <div class=" mb-5 border-bottom">
                    <h5>CATEGORIES</h5>
                    <ul class="mt-4">
                        <li class="text-secondary">Body Care</li>
                        <li class="text-secondary">Conditioner</li>
                        <li class="text-secondary"> Contouring Make Up</li>
                        <li class="text-secondary"> Healing Foot Balm</li>
                        <li class="text-secondary"> Nail Treatments</li>
                        <li class="text-secondary"> Shampoo</li>
                        <li class="text-secondary"> Skin Care</li>
                        <li class="text-secondary"> Skincare</li>
                        <li class="text-secondary mb-5"> Tanning</li>
                    </ul>
                </div>
                <div class="mb-5 border-bottom">
                    <input type="text" placeholder="Search.." class="form-control bg-light rounded-0 py-3">
                    <div>
                        <a href=""><i class="fa-brands fa-twitter fs-2 mt-3 me-2 text-black"></i></a>
                        <a href=""><i class="fa-brands fa-facebook  fs-2 me-2 text-black"></i></a>
                        <a href=""><i class="fa-brands fa-instagram fs-2 mb-5 text-black"></i></a>
                    </div>
                </div>
                <div>
                    <h5>TAGS</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active items">
                                BB & CC Creams</li>
                            <li class="breadcrumb-item active items">BB & CC Creams</li>
                            <li class="breadcrumb-item active items">BB & CC Creams</li>
                            <li class="breadcrumb-item active items">BB & CC Creams</li>
                            <li class="breadcrumb-item active items">BB & CC Creams</li>
                            <li class="breadcrumb-item active items">BB & CC Creams</li>
                            <li class="breadcrumb-item active items">BB & CC Creams</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class=" col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a href=""> <i class="fa-solid fa-table-list fs-5 mt-3 me-2 TOPICON"></i></a>
                        <a href=""><i class="fa-solid fa-list fs-5 mt-3 me-2 TOPICON"></i></a>
                        <span> Showing 1–6 of 20 result</span>
                    </div>
                    <div>
                        <select class="form-select rounded-0" aria-label="Default select example">
                            <option selected>Sort by price:</option>
                            <option value="1">low to high</option>
                            <option value="2">high to low</option>
                            <option value="3">Add to cart</option>
                        </select>
                    </div>
                </div>
                <div class="row g-4" id="product-container">
                    <?php

                    $offset = ($page - 1) * $product_per_page;
                    //select * from makeup limit 0,6;
                    //select * from makeup limit 6,6;
                    //select * from makeup limit 12,6;
                    $sql = "select * from makeup where price <=$range LIMIT $offset,$product_per_page";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="card product-card h-100">
                                <img src="./images/<?php echo $row['image']; ?>"
                                    class="card-img-top product-img"
                                    alt="product">
                                <div class="card-body text-center d-flex flex-column">
                                    <h5 class="product-title">
                                        <?php echo $row['productname']; ?>
                                    </h5>
                                    <form action="api/post/add-to-wishlist-api.php" method="post">
                                        <div class="d-flex justify-content-center align-items-center gap-4 mb-4">
                                            <p class="product-price mb-0">
                                                $<?php echo $row['price']; ?>
                                            </p>
                                            <input type="text" style="display: none;" value="<?php echo $row['productid']; ?>" name="productid">
                                            <input type="text" style="display: none;" value="<?php echo $page; ?>" name="page">
                                            <input type="text" style="display: none;" value="<?php echo $range; ?>" name="range">
                                            <button type="submit" class="wishlist-btn">
                                                <?php
                                                $productid = $row['productid'];
                                                $fill_sql = "select * from wishlist where productid=$productid";
                                                $fill_result = mysqli_query($conn, $fill_sql);
                                                $fill_row =  mysqli_num_rows($fill_result);
                                                if ($fill_row > 0) {
                                                    echo '<i class="fa-solid fa-heart"></i>';
                                                } else {
                                                    echo '<i class="fa-regular fa-heart"></i>';
                                                }
                                                ?>
                                            </button>
                                        </div>
                                    </form>
                                    <form action="api/post/add-to-cart-api.php" method="POST">
                                        <input type="text" value="<?php echo $row["productid"]; ?>" style="display:none;" name="productid">
                                        <button type="submit" class="cart-btn mt-auto">
                                            Add To Cart
                                        </button>
                                    </form>
                                </div>

                            </div>

                        </div>

                    <?php
                    }
                    ?>

                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination Pagination">
                        <li class="page-item <?php if ($page <= 1) {
                                                    echo 'disabled';
                                                } ?>">
                            <a class="page-link Page-Link" href="?page=<?php echo $page - 1 ?>&range=<?php echo $range ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php
                        for ($i = 1; $i <= ceil($rown / $product_per_page); $i++) {
                        ?>
                            <li class="page-item"><a class="page-link Page-Link <?php if ($page == $i) {
                                                                                    echo 'myActive';
                                                                                } ?>" href="?page=<?php echo $i; ?>&range=<?php echo $range ?>"><?php echo $i ?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item <?php if ($page >= $page_count) {
                                                    echo 'disabled';
                                                } ?>">
                            <a class="page-link Page-Link" href="?page=<?php echo $page + 1 ?>&range=<?php echo $range ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    </div>
    <?php include('./components/footer.php'); ?>

</body>
<?php include('./components/footers.php'); ?>
<script src="/makeup-wesbite/js/shop.js"></script>

</html>