<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .about-overlay1 {
            width: 200px;
            right: 50%;
            top: 10%;
        }

        .about-overlay2 {
            width: 170px;
            right: 35%;
            top: 30%;
        }

        .about-overlay3 {
            width: 140px;
            right: 25%;
            top: 50%; 
        }
    </style>
</head>

<body>
    <?php include('./components/header.php'); ?>
    <section class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="makeupgirl-removebg-preview.png" class="img-fluid image" alt="">
            </div>
            <div class="col-lg-6">
                <h1 class="fw-bold mt-5 fs-2">Glow Like Never Before</h1>
                <p class="fs-5 mt-2 "> Be Bold. Be Soft. Be Beautiful – Be You.</p>
                <button type="button" class="btn btn1 mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Start Glowing</button>

            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">💅 Glowin’ Tips for You</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>✨ **Beauty is not makeup, it's confidence.**</p>

                    <p>🌸 Start with clean skin — gentle cleanser always.</p>
                    <p>💧 Hydrate! Drink water & use a good moisturizer.</p>
                    <p>🌞 Sunscreen everyday — glow + protection combo.</p>
                    <p>🍃 Less chemicals, more natural care.</p>
                    <p>😴 Sleep well — tired skin never glows.</p>
                    <p>😊 Smile more — real glow starts inside.</p>

                    <hr>

                    <p>💫 *Glow like you own the world.*</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <section class="py-4" style="background-color: #f9e4e6;">
        <div class="container">
            <div class="row align-items-center">
                <div class=" col-12 col-lg-6">
                    <h2 class="fw-bold mb-3" style="color: #f42d6f;">About Glowin🎀</h2>
                    <p style="color:#4e484a; font-size:17px;">Glowin isn’t just about makeup — it’s about embracing your natural charm.
                        We believe that beauty begins the moment you decide to be yourself.
                        From skincare essentials to artistic glam, Glowin helps you shine your way —
                        confidently, softly, and beautifully. 💅✨</p>
                    <button class="btn btn1 btn2 mt-3" data-bs-toggle="modal" data-bs-target="#knowMoreModal">Know more</button>
                </div>
                <div class="col-12 col-lg-6 position-relative mt-4 mt-lg-0 " style="height: 400px;">

                    <img src="istock.jpg" alt="" class="position-absolute about-overlay1">
                    <img src="istock.jpg" alt="" class="position-absolute about-overlay2">
                    <img src="istock.jpg" alt="" class="position-absolute about-overlay3">
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="knowMoreModal" tabindex="-1" aria-labelledby="knowMoreModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="knowmoreModel">About Glowin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Glowin is all about feeling beautiful and confident.</p>
                    <p>We have makeup and skincare products to help you shine naturally.</p>
                    <p>From daily care to special glam, Glowin helps you look your best.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>

</html>