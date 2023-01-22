<div class="row">
    <div class="col-12 External-stock-header">
        External Stocks
    </div>
</div>
<div class="row">
    <div class="col-12 p-0">
      Search
    </div>
</div>
<div class="row">
    <div class="col-12 p-0" class="">
      <ul class="m-0 p-1" id="stock-list">
      	@foreach( $extstock as $ext)
      		<li class="li-stock"  style="" onclick="SelectStock({{$ext->sid}},'{{$ext->sname}}');">
      			<div class="container-fluid">
      				<div class="row ">
	      				<div class="col-2 text-center p-1">
	      					<img src="{{asset('svg/truck-moving-solid.svg')}}" style="width: 50px;height: 40px">
		      			</div>
		      			<div class="col-6 stock-name" >
		      				{{$ext->sname}}
		      			</div>
		      			<div class="col-4 stock-option-icon p-2">
  		      			<div class="container-fluid">
                    <div class="row">
                        <div class="col-3"><img onclick="window.location.href='{{route('extstock.show',$ext->sid)}}'" data-toggle="modal" src="{{asset('svg/eye-solid.svg')}}" class="es-action-icon"></div>
                        <div class="col-3"><img src="{{asset('svg/chart-column-solid.svg')}}" class="es-action-icon"></div>
                        <div class="col-3"><img onclick="window.location.href='{{route('extstock.edit',$ext->sid)}}'",'{{$ext->ename}}',{{$ext->eid}})" src="{{asset('svg/edit-solid.svg')}}" class="es-action-icon"></div>                        
                        <div onclick="DeleteExtStock({{$ext->sid}})" class="col-3"><img src="{{asset('svg/trash-solid.svg')}}" class="es-action-icon"></div>
                    </div>     
                  </div>
		      			</div>
      				</div>
      			</div>
      		</li>
   		@endforeach()
      </ul>
    </div>
</div>