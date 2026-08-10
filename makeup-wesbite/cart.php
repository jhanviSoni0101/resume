<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('./components/headers.php'); ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <a href="#subnav"><i class="fa-solid fa-arrow-up go-to-top"></i></a>
    <?php include('./components/header.php'); ?>
    <?php include('./components/sab-nav.php'); ?>
    <div class="container py-5">
        <div class="row align-items-center gy-5">
            <div class="col-lg-4 text-center">
                <h1 class="cart-heading">
                    Beauty Shopping Cart
                </h1>
                <p class="cart-text mt-4">
                    Your favorite beauty essentials are waiting for you.
                    Review your selected makeup products and proceed
                    to a smooth and secure checkout experience.
                </p>

            </div>
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table cart-table align-middle">
                        <thead>
                            <tr>
                                <th>QTY</th>
                                <th>ITEM</th>
                                <th>PRICE</th>
                                <th>REMOVE</th>
                            </tr>
                        </thead>
                        <tbody class="cart-body"></tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-3">
                      
                    <h4 class="total-text">
                        Total :
                        <span class="total-price">$25</span>
                    </h4>

                    <button class="btn order-btn">
                        ORDER NOW
                    </button>

                </div>

            </div>
        </div>

    </div>
    <?php include('./components/footer.php'); ?>

</body>
<?php include('./components/footers.php'); ?>
<script src="js/cart.js"></script>
</html>