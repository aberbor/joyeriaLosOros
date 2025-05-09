<div>
    <style>
        nav svg {
            display: none !important;
        }

        nav .hidden {
            display: block !important;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Products
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        All Products
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.product.add') }}" class="btn btn-success float-end">Add New Product</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Stock</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = ($products->currentPage()-1) * $products->perPage();
                                        @endphp
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td><img src="{{ asset('assets/imgs/products/product-')}}/{{$product->id}}-1.jpg" alt="{{ $product->name }}" width="60"></td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->stock_satatus }}</td>
                                                <td>{{ $product->regular_price }}</td>
                                                <td>{{ $product->category->name}}</td>
                                                <td>{{ $product->created_at }}</td>

                                                <td>
                                                    <a href="{{ route('admin.product.edit', ['product_id' => $product->id]) }}" class="text-info">Edit</a>
                                                    <a href="#" class="text-danger" style="margin-left: 20px;" onclick="confirm('Are you sure you want to delete this product?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{ $product->id }})">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>