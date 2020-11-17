@extends('frontendtemplate')

@section('content')
	<div class="container">
		<div class="row my-5">
			<h2>Shopping Cart</h2>

			<div class="table-responsive mt-4">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Photo</th>
							<th>Product</th>
							<th>Qty</th>
							<th>Price</th>
							
						</tr>
					</thead>
					<tbody id="cart_body">
						
					</tbody>
					<tfoot id="cart_tfoot">
						
					</tfoot>
				</table>

				<!-- <form method="post" action="{{route('order.store')}}">
				@csrf -->

				<!-- using ajax -->
				<form method="" class="checkoutform">
				
					<textarea class="form-control notes" placeholder="Notes" required=""></textarea>
					<div class="mt-4">
						<a href="{{route('mainpage')}}" class="btn btn-info">Continue shopping</a>
						@role('customer')
						
							<button class="btn btn-success checkout" type="submit">CheckOut</button>
						
						@else
							<button class="btn btn-success checkout mt-3">Sign in  checkout</button>
						@endrole 

						<!-- <button class="btn btn-success" type="submiy">Checkout</button> -->
					</div>
				</form>
					
			
			</div>
		</div>
	</div>

@endsection

@section('script')
	<script type="text/javascript" src="{{asset('my_asset/js/custom.js')}}">
	</script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		
			
		$(document).ready(function(){
			$.ajaxSetup({
        	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        		}
      		});

      		$('.checkoutform').submit(function(e){
      			let notes=$('.notes').val();
      			if (notes=="")
      			{
      				return true;
      			}else{
      				let order=localStorage.getItem('item');
					$.post("{{route('order.store')}}",{order:order,notes:notes},function(response){
					// alert(response);

					
                   	swal("Good job!",response, "success");
                	
					
					localStorage.clear();
					//location.href="/";
					})
					e.preventDefault();
      			}
				
      		})

		})
	</script>
@endsection