<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .search-box {
            display: none;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg py-3">
        <div class="container d-flex align-items-center">
            <img src="download.png" class="logo">
            <a class="navbar-brand fw-bold fs-3">Glowin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center " id="navbarSupportedContent">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold glow-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold glow-link" href="makeupshoppage.php">Shop</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link fw-semibold glow-link" href="#">Beauty Tips </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold glow-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex gap-4">
                <div class="d-flex align-items-center gap-3">

                    <input type="text" placeholder="Search..." class="search-box">

                    <i class="fa-solid fa-magnifying-glass fs-5 glow-icon glow-icon1"></i>

                </div>
                <a href="/makeup-wesbite/wishlist.php">
                    <i class="fa-regular fa-heart fs-5 glow-icon glow-icon2"></i>
                </a>
                <a href="/makeup-wesbite/cart.php" class="position-relative">
                    <i class="fa-solid fa-bag-shopping fs-5 glow-icon glow-icon3"></i>
                    <span class="counts">0</span>
                </a>
            </div>
        </div>
    </nav>
</body>
<script>
    let counts = document.querySelector('.counts');
    let searchIcon = document.querySelector('.glow-icon1');
    let searchBox = document.querySelector('.search-box');

    function updateproductcount() {

        fetch("http://localhost/makeup-wesbite/api/get/mycart-api.php")

            .then(resp => resp.json())
            .then(data => {
                let qty = 0;
                data.forEach(function(product) {
                    qty += parseInt(product.qty);
                });
                counts.innerHTML = qty;
            });
    }
    updateproductcount();
    let isinphidden = true;
    searchIcon.addEventListener('click', function() {

        if (isinphidden) {
            searchBox.style.display = "block";
            isinphidden = false;
        } else {
            searchBox.style.display = "none";
            isinphidden = true;
            let search =searchBox.value;
            window.location.href=`http://localhost/makeup-wesbite/product.php?search=${search}`;
        }
        
    });
</script>

</html>