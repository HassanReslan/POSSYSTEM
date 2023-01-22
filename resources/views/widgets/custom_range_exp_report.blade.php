<h5>Result Between {{request('from')}} / {{request('to')}}</h5>
@if(count($bytype) >0)
<table id="example" class="table  table-striped table-bordered">
    <thead>
        <tr>
            <td class="text-right h6" colspan="2">Total</td>
            <td class="h6 text-center">{{number_format(array_sum(array_column($bytype,'ammountlira')), 1, ',', ' ')}} L.L</td>
            <td class="h6 text-center">{{number_format(array_sum(array_column($bytype,'ammountdolar')), 1, ',', ' ')}} $</td>
        </tr>
        <tr>
            <th style="width:5%">#</th>
            <th>Type</th>
            <th>Ammount LL</th>
            <th>Ammount $</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bytype as $key =>$val)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$val->type_name}}</td>
                <td>{{$val->ammountlira}} L.L</td>
                <td>{{$val->ammountdolar}}$</td>
            </tr>
        @endforeach
        <tfoot>
            <tr>
                <td class="text-right h6" colspan="2">Total</td>
                <td class="h6 text-center">{{number_format(array_sum(array_column($bytype,'ammountlira')), 1, ',', ' ')}} L.L</td>
                <td class="h6 text-center">{{number_format(array_sum(array_column($bytype,'ammountdolar')), 1, ',', ' ')}} $</td>
            </tr>
        </tfoot>
    </tbody>
</table>
@else
<h5 style="color:red">No Expenses Found!</h5>
@endif