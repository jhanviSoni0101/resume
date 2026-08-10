let price_filter = document.querySelector('.price-filter');
let price_range = document.querySelector('.price-range');

price_filter.addEventListener('input', function () {
    price_range.innerHTML = price_filter.value;
}) 

