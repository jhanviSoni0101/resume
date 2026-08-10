let wishlistContainer = document.querySelector("#wishlist-container");

fetch("http://localhost/makeup-wesbite/api/get/mywishlist-api.php")
    .then(response => response.json())
    .then(data => {
        let cards = "";
        data.forEach(function (product) {
            cards += `
        <div class="col-lg-6 mb-4">
            <div class="wishlist-card">
                <div class="wishlist-image">
                    <img src="./images/${product.image}">
                </div>
                <div class="wishlist-content">
                    <h6>${product.productname}</h6>
                    <p class="wishlist-price">
                        $${product.price}
                    </p>
                    <a href="/makeup-wesbite/product.php?id=${product.productid}" class="wishlist-btn">
                        See More
                    </a>
                </div> 
            </div>
        </div>
        `;
        });
        wishlistContainer.innerHTML = cards;
    });