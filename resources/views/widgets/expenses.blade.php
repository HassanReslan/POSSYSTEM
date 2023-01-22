<script>
    $(document).ready(function () {
        $('#example').DataTable({
            paging: true,
            ordering: false,
            info: false,
        });


        $('input[type=date]').on('change',function(){

            let date = $('input[type=date]').val();
            $('input[type=date]').val( $('input[type=date]').val() );
            var url =  date;
            window.location.href=  url;
        });

    });
</script>
<div class="container-fluid   bg-white  mt-3 p-3">
    <div class="row   mb-3">
        <div class="col-8" >
            <h3>Expenses</h3>
        </div>
        <div class="col-4 " id="date" style="" >
            <label class="float-left" style="font-size: 22px">Date:</label>
            <input type="date" id="date" value="{{request('date')}}" class="form-control float-right text-center" style="width: 200px;">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="button" onclick="window.location.href='{{route('expenses.create')}}'" class="btn btn-success float-right">Add Exepenses</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            @if ($message = Session::get('success'))

                <div class="alert alert-success" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <table class="table  table-striped table-bordered" id="example"  >
                <thead>
                <tr>
                    <th scope="col" colspan="8"> List Of Expenses - ( Total: {{ $expense_amount}}  LL / {{$cost_per_dollar}} $ )</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                    <th scope="col">Cost-L.L</th>
                    <th scope="col">Cost-$</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($expenses as $key => $expense)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$expense->type_name}}</td>
                        <td>{{$expense->expense_amount}}</td>
                        <td>{{$expense->cost_per_dollar}}</td>
                        <td>{{$expense->description}}</td>
                        <td width="5%">
                            <!--<button type="button" class="btn btn-info">Edit</button>-->
                            <a href="{{route('expenses.edit',$expense->id)}}"><button  type="button" class="btn btn-info">Edit</button></a>
                        </td>
                        <td width="5%">
                            @csrf
                            @method('delete')

                            <button  onclick="if(confirm('Are you sure you want to Delete?')){window.location.href='{{route('expenses.delete',['id'=>$expense->id,'date'=>request('date')])}}'}else{return false}"  type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

