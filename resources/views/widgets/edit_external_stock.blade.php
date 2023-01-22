
<div class="container form-shadow mt-5 bg-white">
    <div class="row">
        <div class="col-12 External-stock-header">
            Edit External Stock
        </div>
        <div class="col-12 border form-outline p-5 contetn-shadow">
            <form action="{{route('extstock.update',$stock_info[0]->sid)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="api_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <label for="exampleInputEmail1">Stock Name</label>
                    <input type="text" class="form-control" value="{{$stock_info[0]->sname}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" >
                    @if($errors->has('name'))
                        <strong class="error text-danger" >{{ $errors->first('name') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Employee Name</label>
                    <select  class="form-control" name="employee_id">
                        <option value="">Select Employee Name</option>
                        @foreach($employees as $emplpyee)
                        @if( $emplpyee->id == $stock_info[0]->eid )
                        <option selected value="{{$emplpyee->id}}">{{$emplpyee->name}}</option>
                        @else
                        <option  value="{{$emplpyee->id}}">{{$emplpyee->name}}</option>
                        @endif
                        @endforeach
                    </select>
                    <!--<input type="text" class="form-control" value="" required name="employee_name" id="employee_name"  placeholder="Enter Stock Name">-->
                </div>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>
</div>
