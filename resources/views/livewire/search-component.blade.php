<div>
    <style>
        nav svg{
            height: 20px;
        }

        nav .hidden{
            display: block;
        }
        .wishlisted{
            background-color: #f15412 !important;
            border: 1px solid transparent !important;
        }
        .wishlisted i{
            color: #fff !important!
        }
    </style>

    <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Home</a>
                        <span></span> Shop
                    </div>
                </div>
            </div>
            <section class="mt-50 mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="shop-product-fillter">
                                <div class="totall-product">
                                    <p> We found <strong class="text-brand">{{$products->total()}}</strong> items for you!</p>
                                </div>
                            </div>
                            <div class="row product-grid-3">
                                @php
                                    $witems = Cart:: instance('wishlist')->content()->pluck('id');
                                @endphp
                                @foreach ($products as $product)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                                    <img class="default-img" src="{{ asset('assets/imgs/products/product-')}}{{$product->id}}-1.jpg" alt="{{$product->name}}">
                                                    <img class="hover-img" src="{{ asset('assets/imgs/products/product-')}}{{$product->id}}-1.jpg" alt="{{$product->name}}">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                    <i class="fi-rs-search"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="{{route('product.details',['slug'=>$product->slug])}}">{{$product->category->name}}</a>
                                            </div>
                                            <h2><a href="{{route('product.details',['slug'=>$product->slug])}}">{{$product->name}}</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{$product->regular_price}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                @if($witems->contains($product->id))
                                                     <a aria-label="Add To Wishlist" class="action-btn hover-up wishlisted" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                                @else
                                                     <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fi-rs-heart"></i></a>
                                                @endif
                                                <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!--pagination-->
                            <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                                {{ $products->links() }}
                                <!-- <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                        <li class="page-item"><a class="page-link" href="#">02</a></li>
                                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                                        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                        <li class="page-item"><a class="page-link" href="#">16</a></li>
                                        <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                                    </ul>
                                </nav> -->
                            </div>
                        </div>
                        <div class="col-lg-3 primary-sidebar sticky-sidebar">
                            <div class="row">
                                <div class="col-lg-12 col-mg-6"></div>
                                <div class="col-lg-12 col-mg-6"></div>
                            </div>
                            <div class="widget-category mb-30">
                                <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                                <ul class="categories">
                                    @foreach ($categories as $category)
                                        <li><a href="{{route('product.category',['slug'=>$category->slug])}}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Fillter By Price -->
                            <div class="sidebar-widget price_range range mb-30">
                                <div class="widget-header position-relative mb-20 pb-10">
                                    <h5 class="widget-title mb-10">Fill by price</h5>
                                    <div class="bt-1 border-color-1"></div>
                                </div>
                                <div class="price-filter">
                                    <div class="price-filter-inner">
                                        <div id="slider-range"></div>
                                        <div class="price_slider_amount">
                                            <div class="label-input">
                                                <span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
</div>
