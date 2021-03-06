@extends('backendtemplate')

@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{route('subcategory.index')}}">list Page</a></li>
      </ul>
    </div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<h2>Subcategory Created form</h2>
					<form method="post" action="{{route('subcategory.store')}}" enctype="multipart/form-data">
					@csrf
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
							@error('name')
    							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
							@enderror
						</div>
						<div class="form-group">
							<label for="catagory" class="col-sm-2 d-inline-block"> Catagory </label>
                                <div class="col-sm-10 ">
                                    <select for="catagory" class="form-control custom-select custom-control-inline bg-white" name="catagoryid">

                                    @foreach($categories as $category)
                          				<option value="{{$category->id}}">{{$category->name}}</option>
                          				
                        			@endforeach
                                       
                                    </select>
                                </div>
						</div>
						<div class="form-group">
							<input type="submit" name="btnsubmit" value="save" class="btn btn-primary">
						</div>
					</form>
			</div>
		</div>
	</div>
</main>
@endsection