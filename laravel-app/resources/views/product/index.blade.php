<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js']);
</head>

<body class="bg-dark-subtle">
    <main>

        <div class="album py-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 g-3">
                    @forelse ($products as $product)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="" width="100%"
                                    height="225" data-bs-toggle="modal" data-bs-target="#myProduct{{ $product->id }}"
                                    data-product-id="{{ $product->id }}">
                                <div class="card-body">
                                    <p class="card-text">{{ $product->product_name }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <form method="GET" action="/products/{{ $product->id }}">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Order
                                                    Item</button>
                                            </form>
                                        </div>
                                        <small class="text-body-secondary">₱ {{ $product->price }}.00</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End of col-->
                        <!-- Modal -->
                        <div class="modal fade" id="myProduct{{ $product->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="myProduct{{ $product->id }}">
                                            {{ $product->product_name }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('storage/' . $product->image_path) }}" alt=""
                                            width="100%" height="300">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No Products Yet!</p>
                    @endforelse
                </div>
            </div>
        </div>

    </main>
</body>

</html>
