<script>
    $(document).ready(function () {
        $('#example').DataTable({
            paging: true,
            ordering: false,
            info: false,
        });
    });
</script>
<div class="container-fluid    mt-3 p-3">
    <div class="row mb-2 ">
        <div class="col-12 p-0" style="color:blue" >
            <!--header-->
            <h5><a href="{{route('report.expenses',request('year'))}}">Yearly</a> > <a href="{{route('mounthlyexpensesreport',["month"=>request('month'),"year"=>request('year')])}}">Monthly</a> > Daily</h5>
        </div>
    </div>
    <div class="row gx-5 p-0">
        <div class="col-8 p-0" >
            <div class="p-3 border bg-white">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                        <h3>Expenses Report Of {{ request('day')}} - {{request('month')}} - {{request('year')}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                           @if(count($expenses) >0)
                            <table id="example" class="table  table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-right h6" colspan="4">Total</td>
                                        <td class="h6 text-center">{{number_format(array_sum(array_column($expenses,'cost_per_dollar')), 1, ',', ' ')}} $</td>
                                        <td class="h6 text-center">{{number_format(array_sum(array_column($expenses,'expense_amount')), 1, ',', ' ')}} L.L</td>
                                    </tr>
                                    <tr>
                                        <th style="width:5%">#</th>
                                        <th style="width:55%">Description</th>
                                        <th>Type</th>
                                        <th>Dolar Value</th>
                                        <th>Ammount $</th>
                                        <th>Ammount L.L</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($expenses as $key =>$val)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td class="text-left">{{$val->description}}</td>
                                            <td>{{$val->type_name}}</td>
                                            <td>{{$val->dollar_value}} L.L</td>
                                            <td>{{$val->cost_per_dollar}}$</td>
                                            <td>{{number_format($val->expense_amount, 1, ',', ' ')}} L.L</td>
                                           
                                        </tr>
                                    @endforeach
                                    <tfoot>
                                        <tr>
                                            <td class="text-right h6" colspan="4">Total</td>
                                            <td class="h6 text-center">{{number_format(array_sum(array_column($expenses,'cost_per_dollar')), 1, ',', ' ')}} $</td>
                                            <td class="h6 text-center">{{number_format(array_sum(array_column($expenses,'expense_amount')), 1, ',', ' ')}} L.L</td>
                                        </tr>
                                    </tfoot>
                                </tbody>
                            </table>
                           @else
                            <h5 style="color:red">No Expenses Found!</h5>
                           @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 pr-0">
                <div class="p-3 border bg-white">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <h4>Filter By Expenses Type</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
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
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>