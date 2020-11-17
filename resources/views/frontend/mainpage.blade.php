@extends('frontendtemplate')

@section('content')
	<div class="container">

    <div class="row">

      <div class="col-lg-3">

        <x-sidebar-component></x-sidebar-component>

      </div>
      <!-- /.col-lg-3 -->
   

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="{{asset('my_asset/img/p1.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="{{asset('my_asset/img/p2.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="{{asset('my_asset/img/p5.jpg')}}" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    <!-- /.row -->
  </div>
      <!-- /.col-lg-9 -->   

        <div class="row my-5">
          @foreach($items as $item)
           <x-item-component :item=$item></x-item-component>
          @endforeach

        </div>
        <!-- /.row -->

        <!-- //show Brands -->
        <!-- <h4 class="my-4">Top Brands</h4>
        <div class="row">
        
          @foreach($brands as $brand)
            <div class="col-lg-3">
              <img src="{{asset($brand->photo)}}" class="img-fluid" >
            </div>
          @endforeach
        </div>  -->

      

    


<div class="container">
  <h2>Top Brands</h2>
   <section class="customer-logos slider">
      @foreach($brands as $brand)
        <div class="slide"><img src="{{asset($brand->photo)}}"></div>
      @endforeach
   </section>
</div>

  </div>

  <!-- Feature Start-->
  <div class="feature mt-5 pt-5">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-lg-3 col-md-6 feature-col">
          <div class="feature-content">
            <i class="fab fa-cc-mastercard"></i>
            <h2>Secure Payment</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur elit
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 feature-col">
          <div class="feature-content">
            <i class="fa fa-truck"></i>
            <h2>Worldwide Delivery</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur elit
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 feature-col">
          <div class="feature-content">
            <i class="fa fa-sync-alt"></i>
            <h2>90 Days Return</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur elit
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 feature-col">
          <div class="feature-content">
            <i class="fa fa-comments"></i>
            <h2>24/7 Support</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur elit
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Feature End--> 
@endsection

<!-- @section('script')
  <script type="text/javascript">
    $(document).ready(function(){

      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('.subcategory').click(function(e){
        e.preventDefault();
        var subcategory_id=$(this).data(id);
        $.post("{{route('bysubcategory')}}",{id:subcategory_id},function(response){
          console.log(response);
        })
      })
    })
  </script>
@endsection -->