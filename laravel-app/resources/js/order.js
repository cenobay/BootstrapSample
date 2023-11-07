document.getElementById('quantity').addEventListener('input', function() {
    const quantity = parseInt(this.value, 10);
    const price = parseFloat({{ $product->price }});

    if (!isNaN(price)) {
        const totalPrice = quantity * price;
        const totalPriceSpan = document.getElementById('totalPrice');

        if (totalPriceSpan) {
            totalPriceSpan.textContent = `₱ ${totalPrice.toFixed(2)}`;
            // Update the value attribute of the price span
            document.getElementById('price').value = totalPrice.toFixed(2);
        }
    }
});