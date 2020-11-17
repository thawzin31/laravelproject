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
          <li class="breadcrumb-item"><a href="{{route('subcategory.create')}}">Form page</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
          <div class="tile">
            <h2 class="d-inline-block">Subcategory List</h2>
              <a href="{{route('subcategory.create')}}" class="btn btn-info float-right">Add New</a>
          
            <table class="table py-4 table-bordered dataTable ">
              <thead >
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
               @foreach($subcategories as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->name}}</td>
                  
                  <td>
                    <a href="{{route('subcategory.edit',$row->id)}}" class="btn btn-warning">Edit</a>
                  <a href="{{route('subcategory.show',$row->id)}}" class="btn btn-info">Show</a>
                  <form method="post" action="{{route('subcategory.destroy',$row->id)}}" class="d-inline-block" >
                  @csrf
                  @method('DELETE')
                    <input type="submit" name="btnsubmit" class="btn btn-danger" value="delete">
                  </form>
                  </td>
                </tr>
               @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </main>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('backend/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">
    $('.dataTable').DataTable();
  </script>
@endsection

