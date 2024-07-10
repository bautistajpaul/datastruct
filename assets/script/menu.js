let cart = [];
let cartTotal = 0;

function increaseQuantity(button) {
    let quantityInput = button.closest('.input-group').querySelector('.quantity-input');
    quantityInput.value = parseInt(quantityInput.value) + 1;
    updateCart();
}

function decreaseQuantity(button) {
    let quantityInput = button.closest('.input-group').querySelector('.quantity-input');
    if (parseInt(quantityInput.value) > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
        updateCart();
    }
}

function addToCart(button) {
    let card = button.closest('.card');
    let foodName = card.querySelector('.food-name').textContent;
    let foodPrice = parseFloat(card.querySelector('.food-price').textContent.replace('P ', ''));
    let quantity = parseInt(card.querySelector('.quantity-input').value);

    let cartItem = cart.find(item => item.name === foodName);
    if (cartItem) {
        cartItem.quantity += quantity;
    } else {
        cart.push({
            name: foodName,
            price: foodPrice,
            quantity: quantity,
            food_id: card.dataset.foodId // Assuming you have a data attribute for food_id
        });
    }

    updateCart();
}

function updateCart() {
    let cartItemList = document.querySelectorAll('.cart-item-list');

    // Reset total before recalculating
    cartTotal = 0;

    cartItemList.forEach(cartList => {
        cartList.innerHTML = '';

        cart.forEach((item, idx) => {
            let cartRow = document.createElement('tr');
            cartRow.innerHTML = `
                <th scope="row">${idx + 1}</th>
                <td>${item.name}</td>
                <td>P ${item.price.toFixed(2)}</td>
                <td>${item.quantity}</td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="removeFromCart(${idx})">Remove</button>
                </td>
            `;
            cartList.appendChild(cartRow);
        });

        // Update total for each cart list
        let cartTotalElement = cartList.closest('.cart-content').querySelector('.cart-total');
        cartTotal += cart.reduce((acc, item) => acc + (item.price * item.quantity), 0);
        cartTotalElement.textContent = `PHP ${cartTotal.toFixed(2)}`;
    });
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCart();
}

function placeOrder(region) {
    let orderData = {
        region: region,
        cart: cart
    };
    console.log(orderData);

    fetch('place_order.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(orderData),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.status === 'success') {
            console.log('Order placed successfully:', data.message);
            cart = []; // Clear cart after successful order
            updateCart(); // Update cart display
        } else {
            console.error('Error placing order:', data.message);
            // Handle error scenario if needed
        }
    })
    .catch((error) => {
        console.error('Error placing order:', error);

    });
}
