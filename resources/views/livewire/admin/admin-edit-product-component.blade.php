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
                    <span></span> Edit Product
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
                                        Edit Product
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.products') }}" class="btn btn-success float-end">All Products</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                <form wire:submit.prevent="updateProduct">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Product Name" wire:model="name" wire:keyup="generateSlug">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" placeholder="Enter Product Slug" wire:model="slug">
                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="short_description" class="form-label">Short Description</label>
                                        <textarea class="form-control" name="short_description" placeholder="Enter Product Short Description" wire:model="short_description"></textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter Product Description" wire:model="description"></textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="regular_price" class="form-label">Price</label>
                                        <input type="text" class="form-control" name="regular_price" placeholder="Enter Product Price" wire:model="regular_price">
                                        @error('regular_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="sale_price" class="form-label">Price</label>
                                        <input type="text" class="form-control" name="sale_price" placeholder="Enter Product Sale Price" wire:model="sale_price">
                                        @error('sale_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" class="form-control" name="sku" placeholder="Enter Product SKU" wire:model="sku">
                                        @error('sku')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="stock_status" class="form-label">Stock Status</label>
                                        <select class="form-select" name="stock_status" wire:model="stock_status">
                                            <option value="">Select Status</option>
                                            <option value="instock">In Stock</option>
                                            <option value="outofstock">Out of Stock</option>
                                        </select>
                                        @error('stock_status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="featured" class="form-label">Featured</label>
                                        <select class="form-select" name="featured" wire:model="featured">
                                            <option value="">Select Feature</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('featured')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" class="form-control" name="quantity" placeholder="Enter Product Quantity" wire:model="quantity">
                                        @error('quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image" placeholder="Enter Product Image" wire:model="newimage">
                                        @if($newimage)
                                            <img src="{{ $newimage->temporaryUrl() }}" width="120" alt="Product Image">
                                        @endif
                                        @error('newimage')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select class="form-control" name="category_id" wire:model="category_id">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Update Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>