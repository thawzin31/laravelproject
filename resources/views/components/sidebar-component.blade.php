<!--<div>-->
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
<!--</div>-->

<div class="accordion" id="accordionExample">
  @php $i=1; @endphp
  @foreach($categories as $category)
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 >
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne{{$i}}" aria-expanded="true" aria-controls="collapseOne{{$i}}">
          {{$category->name}}
        </button>
      </h2>
    </div>

    <div id="collapseOne{{$i}}" class="collapse @if($loop->first) {{'show'}} @endif" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        @foreach($category->subcategories as $subcategory)
        <a class="btn btn-link subcategory" href="{{route('itemsbysubcategory',$subcategory->id)}}" data-id="{{$subcategory->id}}">{{$subcategory->name}}</a>
        @endforeach
      </div>
    </div>
  </div>
  @php $i++; @endphp
  @endforeach
</div>


 
<!-- <div class="dropdown show">
  @php $i=1; @endphp
 
  <a class="btn btn-outline-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Category
  </a>

  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
    @foreach($categories as $category)
    <li class="dropdown-submenu">
      <a class="dropdown-item" href="{{route('bysubcategory',$subcategory->id)}}">
        {{$category->name}}
        <i class="icofont-rounded-right float-right"></i>
      </a>
      <ul class="dropdown-menu">
        <h6 class="dropdown-header">
          {{$category->name}}
        </h6>
         @foreach($category->subcategories as $subcategory)
        <li><a class="dropdown-item" href="{{route('itemsbysubcategory',$subcategory->id)}}" data-id="{{$subcategory->id}}">{{$subcategory->name}}</a></li>
         @endforeach
      </ul>
    </li>
    <div class="dropdown-divider"></div>
     @endforeach
  </ul>
  
</div> 
 -->