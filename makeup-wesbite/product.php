<?php
include('./components/connection.php');
$search = isset($_GET['search']) ? $_GET['search'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($search && !$id) {
    $search = mysqli_real_escape_string($conn, $search);
    $words = preg_split('/\s+/', trim($search));
    $where_clauses = [];
    foreach ($words as $word) {
        $where_clauses[] = "productname LIKE '%$word%'";
    }
    $search_sql = "SELECT * FROM makeup WHERE " . implode(" AND ", $where_clauses);
    $search_result = mysqli_query($conn, $search_sql);
    $search_row = mysqli_fetch_all($search_result, MYSQLI_ASSOC);
}
if ($id && !$search) {
    $id_sql = "SELECT * FROM makeup WHERE productid=$id";
    $id_result = mysqli_query($conn, $id_sql);
    $id_row = mysqli_fetch_assoc($id_result);
}
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
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .1);
            transition: .4s;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .2);
        }

        .card-img-top {
            height: 280px;
            object-fit: cover;
            transition: .4s;
        }

        .card:hover .card-img-top {
            transform: scale(1.08);
        }

        .card-body {
            text-align: center;
            padding: 20px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .card-text {
            font-size: 20px;
            font-weight: bold;
            color: #e91e63;
        }
    </style>
</head>
<body>
    <a href="#subnav"><i class="fa-solid fa-arrow-up go-to-top"></i></a>
    <?php include('./components/header.php'); ?>
    <?php include('./components/sab-nav.php'); ?>
    <div class="container py-5">
        <?php if ($search && !$id) {
            echo "<div class='row'>";  
            foreach ($search_row as $s_row) { 
                ?>
                <div class="col-3 mb-4">
                    <div class="card w-100">
                        <img src="/makeup-wesbite/images/<?php echo $s_row['image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $s_row['productname'] ?></h5>
                            <p class="card-text"><?php echo $s_row['price'] ?></p>
                        </div>
                    </div>
                </div> 
        <?php
            }  
            echo "</div>";
        } ?>
        <?php if ($id && !$search) {
            echo "<div class='row'>";
        ?>
            <div class="col-6">
                <img src="images/<?php echo $id_row['image'] ?>" class="w-100" alt="">
            </div>
            <div class="col-6">
                <h2><?php echo $id_row['productname'] ?></h2>
                <p><?php echo $id_row['price'] ?></p>
            </div>
        <?php 
        }  
        echo "</div>"; 
        ?> 
    </div> 
    <?php include('./components/footer.php'); ?>
</body>
<?php include('./components/footers.php'); ?>
</html>