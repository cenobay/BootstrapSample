<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-dark-subtle">
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-decoration-none">
                <span class="fs-4">back</span>
            </a>
        </header>


        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <img class="bd-placeholder-img card-img-top" width="50%" height="400"
                    src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->product_name }}">
            </div>
            <div class="col-md-6">
                <form method="POST" action="/orders">
                    @csrf
                    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                        <div class="p-5">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="me-2 mb-3 d-flex justify-content-between">
                                <h3 class="fs-4"> {{ $product->product_name }} </h3>
                                <span class="text-body-secondary" id="totalPrice"> ₱
                                    {{ $product->price }}.00 </span>
                                <input type="hidden" id="price" name="price" value="{{ $product->price }}">
                            </div>
                            <div class="input-group mb-2 border border-dark-subtle rounded-3">
                                <span class="input-group-text bg-dark-subtle">
                                    Qty</span>
                                <input type="number" name="quantity" id="quantity" value="1" min="1"
                                    class="form-control">
                                <!-- Error Message -->
                                @error('quantity')
                                    <span class="text-danger lead mb-1" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-2 border border-dark-subtle rounded-3">
                                <span class="input-group-text bg-dark-subtle">
                                    Name of Buyer:</span>
                                <input type="text" class="form-control" name="buyer_name">
                            </div>
                            <!-- Error Message -->
                            @error('buyer_name')
                                <span class="text-danger lead mb-1" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                            <div class="input-group mb-2 border border-dark-subtle rounded-3">
                                <span class="input-group-text bg-dark-subtle">
                                    Contact Number: </span>
                                <input type="tel" class="form-control" name="mobile_number" maxlength="11"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                            <!-- Error Message -->
                            @error('mobile_number')
                                <span class="text-danger lead mb-1" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                            <div class="d-flex justify-content-end mb-3">
                                <button class="btn btn-outline-primary" type="submit">Submit</button>
                            </div>
                            <!-- Alert Success -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer class="pt-3 mt-4 text-body-secondary border-top">
            © Crisbel Enobay
        </footer>
    </div>

    {{-- <script>
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
    </script> --}}
    <script>
        document.getElementById('quantity').addEventListener('input', function() {
            const quantity = parseInt(this.value, 10);
            const price = parseFloat({{ $product->price }});

            const totalPrice = quantity * price;
            const displayedPrice = document.getElementById('totalPrice');

            displayedPrice.textContent = `₱ ${totalPrice.toFixed(2)}`;
            document.getElementById('price').value = totalPrice.toFixed(2);
        });
    </script>
    <script>
        var successAlert = document.querySelector('.alert-success');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = "none";
            }, 3000);
        }
    </script>


</body>

</html>
