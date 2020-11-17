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
        <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2 class="d-inline-block">Order List</h2>

          <form action="" method="" class="my-3">
            <div class="form-row">
              <div class="col-md-4">
                <label for="fromDate">From</label>
                <input type="date" name="form" class="form-control" id="fromDate">
              </div>
            
              <div class="col-md-4">
                <label for="toDate">To</label>
                <input type="date" name="form" class="form-control" id="toDate">
              </div>
              <div class="col-md-4 mt-4 pt-1">
                <button type="submit" name="onsubmit" value="Search" class="btn btn-primary">Search</button>
              </div>
            </div>
          </form>

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="home" aria-selected="true">Pending</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#comfirm" role="tab" aria-controls="profile" aria-selected="false">Comfirm</a>
            </li>
            
          </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="home-tab">
            <table class="table mt-3 table-bordered dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Orderno</th>
                <th>Orderdate</th>
                <th>Total amount</th>
                <th>Customer name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            @php 
              $i=1;
            @endphp
            @foreach($pending_orders as $order)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$order->orderno}}</td>
                <td>{{$order->orderdate}}</td>
                <td>
                    {{number_format($order->totalamount)}}
                </td>
                <td>{{$order->user->name}}</td>
                <td>
                  <a href="{{route('order.show',$order->id)}}" class="btn btn-warning">Detail</a>
                  <a href="" class="btn btn-danger">Cancel</a>
                  
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          </div>
          <div class="tab-pane fade" id="comfirm" role="tabpanel" aria-labelledby="profile-tab">
            <table class="table mt-3 table-bordered dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Orderno</th>
                <th>Orderdate</th>
                <th>Total amount</th>
                <th>Customer name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @php 
              $i=1;
            @endphp
            @foreach($comfirm_orders as $order)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$order->coderno}}</td>
                <td>{{$order->orderdate}}</td>
                <td>
                    {{number_format($order->totalamount)}}
                </td>
                <td>{{$order->user->name}}</td>
                <td>
                  <a href="{{route('order.show',$order->id)}}" class="btn btn-warning">Detail</a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          </div>
          
        </div>
          
          
        </div>
      </div>
    </div>
  </main>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('backend_asset/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend_asset/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">
    $('.dataTable').DataTable();
  </script>
@endsection