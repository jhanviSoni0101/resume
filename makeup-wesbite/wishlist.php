<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php include('./components/headers.php'); ?>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .wishlist-card {
            display: flex;
            gap: 15px;
            align-items: center;
            padding: 15px;
            border-radius: 10px;
            background: white;
        }

        .wishlist-image img { 
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }

        .wishlist-content h6 {
            margin-bottom: 5px;
        }

        .wishlist-price {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .wishlist-btn {
            border: 1px solid #ccc;
            background: white;
            padding: 5px 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php include('./components/header.php'); ?>
    <div class="container mt-5">
        <h2 class="text-center mb-5">Wishlist</h2>
        <div class="row" id="wishlist-container">
        </div>
    </div>
    <script src="./js/wishlist.js"></script>
</body>
</html> 