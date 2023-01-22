
<div class="container form-shadow mt-5 bg-white">
    <div class="row">
        <div class="col-12 External-stock-header">
            Edit Product in Stock
        </div>

        <div class="col-12 border form-outline p-3 contetn-shadow">
            <form action="{{route("stock.update",$product_info[0]->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="api_token" value="{{ csrf_token() }}" />
                <div class="form-group" style="font-size:18px;">
                    Product Name : {{$product_info[0]->product_name}}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="number" class="form-control" value="{{$product_info[0]->quantity}}" name="quantity" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                    @if($errors->has('name'))
                        <strong class="error text-danger" >{{ $errors->first('name') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Purchasing Price-$</label>
                    <input type="number" class="form-control" value="{{$product_info[0]->purchasing_price}}" name="purchasing_price" id="exampleInputEmail1"  step="any">
                    @if($errors->has('email'))
                        <strong class="error text-danger" >{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Sale Price - $</label>
                    <input type="number" class="form-control" value="{{$product_info[0]->sale_price}}" name="sale_price" id="exampleInputEmail1" step="any">
                    @if($errors->has('phone'))
                        <strong class="error text-danger" >{{ $errors->first('phone') }}</strong>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>
</div>
