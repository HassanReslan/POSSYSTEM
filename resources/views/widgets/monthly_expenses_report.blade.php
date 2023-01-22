<style>
    .datepicker table thead{
        visibility:hidden;
    }
    .datepicker table thead .next{
        visibility:hidden !important;
    }
    .datepicker table thead .prev{
        visibility:hidden !important;
    }
</style>
<script>
        $(document).ready(function(){
           
            $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: false,
                format: "m",
                viewMode: "months", 
                minViewMode: "months",
               
                autoclose:false //to close picker once year is selected 
            });
            
            $("#datepicker").one('change', function(e) {
                const month = $("#datepicker").val();
                const year = "{{request('year')}}";
               
                url = "{{route('mounthlyexpensesreport',[':month',':year'])}}";
                url = url.replace(':month', month);
                url = url.replace(':year', year);
                window.location.href = url;
            });
    
        });
    </script>
<div class="container-fluid    mt-3 p-3">
    <div class="row mb-2 ">
        <div class="col-12 p-0 " style="color:blue" >
            <h5><a href="{{route('report.expenses',request('year'))}}">Yearly</a> > Monthly</h5>
        </div>
    </div>
    <div class="row mb-2 ">
        <div class="col-1 p-0 " style="color:blue" >
            <input type="text" class="form-control" name="datepicker" id="datepicker" placeholder="Select Month"/>
        </div>
        <div class="col-11"></div>
    </div>
    
    <div class="row gx-5 p-0">
        <div class="col-8 p-0" >
            <div class="p-3 border bg-white">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                        <h3>Expenses Report Of {{date('F', mktime(0, 0, 0, request('month'), 10))}} - {{request('year')}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="w-100 p-1 m-0  align-center">
                                @for($i=1;$i<=$days;$i++)
                                <li onclick="window.location.href='{{route('dailyexpensesreport',["day"=>$i,"month"=>request('month'),"year"=>request('year')])}}'" class="border border-dark float-left p-2 {{(date('d') == $i ? 'monthly-expenses-li-active' : 'monthly-expenses-li')}}" style="">
                                    <h3>{{$i}}</h3>
                                    <span style="color:green;font-size:14px;">{{(isset($daily_result_lira[$i]) ? $daily_result_lira[$i]: 0)}} L.L</span>
                                    <br>
                                    <span style="color:green;font-size:14px;">{{(isset($daily_result_dolar[$i]) ? $daily_result_dolar[$i]: 0)}} $</span>
                                </li>
                                @endfor
                            </ul>
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
                                <h4>Filter By Expenses Types</h4>
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