
<script>
    $( document ).ready(function() {

        $('#dollar_value').change(function (){

            var cost = parseFloat($('#expense_amount').val()).toFixed(2);
            var dollar_value = parseFloat( $('#dollar_value').val()).toFixed(2);

            var cost_per_dollar = cost/dollar_value;
            var cost_per_dollar = parseFloat(cost_per_dollar).toFixed(2);
            $('#cost_per_dollar').val(cost_per_dollar);

        });

        $('#expense_amount').change(function (){

            var cost = parseFloat($('#expense_amount').val()).toFixed(2);
            var dollar_value = parseFloat( $('#dollar_value').val()).toFixed(2);

            var cost_per_dollar = cost/dollar_value;
            var cost_per_dollar = parseFloat(cost_per_dollar).toFixed(2);
            $('#cost_per_dollar').val(cost_per_dollar);

        });



    });
</script>
<div class="row">
        <div class="col-12 mt-2">
            @if ($message = Session::get('success'))

                <div class="alert alert-success" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
</div>
<div class="container form-shadow mt-2 pb-2 bg-white ">        
    <div class="row ">
        <div class="col-12 External-stock-header">
            Edit Expenses
        </div>
        <div class="col-12  form-outline pl-5  pt-3 contetn-shadow">
            <form action="{{route('expenses.update',$expenses[0]->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="api_token" value="{{ csrf_token() }}" />
                <div class="form-group ">
                    <div class="row ">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <label for="exampleInputEmail1">Expenses Type</label>
                            <select class="form-control " name="expenses_type_id">
                                <option value="0">Select Type</option>
                                @foreach($types as $type)
                                    @if( $expenses[0]->expenses_type_id == $type->id)
                                    <option selected='selected' value="{{$type->id}}">{{$type->type_name}}</option>
                                    @else
                                        <option  value="{{$type->id}}">{{$type->type_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('expenses_type_id'))
                                <strong class="error text-danger" >{{ $errors->first('expenses_type_id') }}</strong>
                            @endif
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 d-flex  align-items-end"  >

                            <!--<button type="button"  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style=" ">Add Type</button>-->
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Date Of the Expense</label>
                    <input type="date" class="form-control w-25" value="{{ $expenses[0]->date }}" name="date"  aria-describedby="emailHelp" placeholder="{{date('Y-m-d')}}">
                    @if($errors->has('date'))
                        <strong class="error text-danger" >{{ $errors->first('date') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Cost</label>
                    <input type="text" class="form-control w-25" value="{{ $expenses[0]->expense_amount }}" id="expense_amount" name="expense_amount" aria-describedby="emailHelp" placeholder="Ex: 100,000L.L">
                    @if($errors->has('expense_amount'))
                        <strong class="error text-danger" >{{ $errors->first('expense_amount') }}</strong>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1"> Dollar Value - ( قيمة الدولار )</label>
                    <input type="text" class="form-control w-25" value="{{ $expenses[0]->dollar_value }}" id="dollar_value" name="dollar_value" aria-describedby="emailHelp" placeholder="Ex: 30,000L.L">
                    @if($errors->has('dollar_value'))
                        <strong class="error text-danger" >{{ $errors->first('dollar_value') }}</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"> Cost Per $</label>
                    <input type="text" class="form-control w-25" value="{{ $expenses[0]->cost_per_dollar }}" id="cost_per_dollar" name="cost_per_dollar" aria-describedby="emailHelp" placeholder="Ex: 1$">
                    @if($errors->has('cost_per_dollar'))
                        <strong class="error text-danger" >{{ $errors->first('cost_per_dollar') }}</strong>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" name="description" >{{ $expenses[0]->description }}</textarea>
                    @if($errors->has('description'))
                        <strong class="error text-danger" >{{ $errors->first('description') }}</strong>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>
</div>
