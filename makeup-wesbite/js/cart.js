let cart_body = document.querySelector('.cart-body');
let totalprice = document.querySelector('.total-price');

fetch("http://localhost/makeup-wesbite/api/get/mycart-api.php")

   .then(resp => resp.json())

   .then(data => {

      console.log(data);

      data.forEach(item => {
         let tr = document.createElement('tr');
         tr.innerHTML = `
         <td>
             <input type="number" value="${item.qty}" min="1" class="qty">
         </td>
         <td>
            <div class="d-flex align-items-center gap-3">
               <img src="images/${item.image}" width="70">
               <span>${item.productname}</span>
            </div>
         </td>
         <td class="price">
            ₹${item.price * item.qty}
         </td>
         <td>
            <button class="remove-btn">
               <i class="fa-solid fa-trash"></i>
            </button>
         </td>
         `;
         let price = tr.querySelector('.price');
         let qtyinput = tr.querySelector('.qty');
         qtyinput.addEventListener('input', function () {
            let total = item.price * qtyinput.value;
            price.innerHTML = "₹" + total;
            changeqty(item.id, qtyinput.value);
         });

         let removebtn = tr.querySelector('.remove-btn');
         removebtn.addEventListener('click', function () {
            fetch("http://localhost/makeup-wesbite/api/post/removeproduct-api.php", {
               method: "DELETE",
               headers: {
                  "Content-Type": "application/json"
               },
               body: JSON.stringify({
                  id: item.id
               })
            })
               .then(resp => resp.json())
               .then(data => {
                  if (data.status == "success") {
                     tr.remove();
                     calculatetotal();
                     updateproductcount();
                  }
               })
         })
         cart_body.appendChild(tr);
      });
      calculatetotal();
   });

function changeqty(id, newqty) {

   fetch("http://localhost/makeup-wesbite/api/post/updateqty-api.php", {
      method: "POST",
      headers: {
         "Content-Type": "application/json"
      },
      body: JSON.stringify({
         id: id,
         qty: newqty
      })
   })
      .then(resp => resp.json())
      .then(data => {
         if (data.status == "success") {
            calculatetotal();
            updateproductcount();
         }

      })  
}

function calculatetotal() {
   fetch("http://localhost/makeup-wesbite/api/get/mycart-api.php")
      .then(resp => resp.json())
      .then(data => {
         let sum = 0;
         data.forEach(item => {
            sum += item.price * item.qty;
         });
         totalprice.innerHTML = "₹" + sum;
      })
}