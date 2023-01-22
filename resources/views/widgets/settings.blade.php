<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-3">
            @if ($message = Session::get('success'))

                <div class="alert alert-success" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3>Minimum Stock</h3>
        </div>
    </div>
    <div class="row ">
        <div class="col-12">
            <div  style="height: 150px;" class="w-50  border form-outline p-2 contetn-shadow bg-white">
               <form action="{{route('editstocksettings',1)}}" method="post" enctype="multipart/form-data">
                   @csrf
                   <input type="hidden" name="api_token" value="{{ csrf_token() }}" />
                   <div class="form-group">
                       <label for="exampleInputEmail1"><h4>Quantity</h4></label>
                       <input type="number" min="0" class="form-control " value="{{ $min_stock[0]->min_stock }}" name="min_stock" id="min_stock"  placeholder="0">
                       @if($errors->has('min_stock'))
                           <strong class="error text-danger" >{{ $errors->first('min_stock') }}</strong>
                       @endif
                   </div>
                   <button type="submit" class="btn btn-primary float-right"  style="">Save</button>
               </form>
            </div>
        </div>
    </div>

</div>
