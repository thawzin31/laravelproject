<!-- <div> -->
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
<!-- </div> -->

<div class="col-lg-3 col-md-3 mb-3 col-6 my-4">
    <div class="card h-100">
       	<a href="#"><img class="card-img-top img-fluid" src="{{asset($item->photo)}}" alt=""></a>
            <div class="card-body">
                <h4 class="card-title">
                  	<a href="#">{{$item->name}}</a>
                </h4>
                <h5>{{$item->price}}MMK</h5>
                	<p class="card-text"></p>
            </div>
            <div class="card-footer">
                <a href="{{route('itemdetail',$item->id)}}" class="btn btn-secondary mr-4 pr-2">Detail</a>
                <a class="btn d-inline-block  add_to_cart" data-id="{{$item->id}}" data-codeno="{{$item->codeno}}" data-name="{{$item->name}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-description="{{$item->description}}" data-photo="{{$item->photo}}" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
            </div>
        </div>
    </div>

   <!--   Featured Product Start -->
    <!-- <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Featured Product</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">

                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="#">{{$item->name}}</a>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="product-image">
                            <a href="product-detail.html">
                                <img src="{{asset($item->photo)}}" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href="#"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3>{{$item->price}}MMK</h3>
                            <a class="btn d-inline-block  add_to_cart" data-id="{{$item->id}}" data-codeno="{{$item->codeno}}" data-name="{{$item->name}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-description="{{$item->description}}" data-photo="{{$item->photo}}" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            <a class="btn" href="{{route('itemdetail',$item->id)}}"><i class="fa fa-shopping-cart"></i>Detail</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div> -->
    <!-- Featured Product End -->  

@section('script')
    <script type="text/javascript" src="{{asset('my_asset/js/custom.js')}}">
        
    </script>
@endsection