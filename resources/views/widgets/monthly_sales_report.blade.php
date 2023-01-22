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
               
                url = "{{route('mounthlysalesreport',[':month',':year'])}}";
                url = url.replace(':month', month);
                url = url.replace(':year', year);
                window.location.href = url;
            });
    
        });
    </script>
<div class="container-fluid    mt-3 p-3">
    <div class="row mb-2 ">
        <div class="col-12 p-0 " style="color:blue" >
            <h5><a href="{{route('report.sales',request('year'))}}">Yearly</a> > Monthly</h5>
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
                        <h3>Sales Report Of {{date('F', mktime(0, 0, 0, request('month'), 10))}} - {{request('year')}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="w-100 p-1 m-0  align-center">
                                @for($i=1;$i<=$days;$i++)
                                <li onclick="window.location.href='{{route('dailysalesreport',["day"=>$i,"month"=>request('month'),"year"=>request('year')])}}'" class="border border-dark float-left p-2 {{(date('d') == $i ? 'monthly-expenses-li-active' : 'monthly-expenses-li')}}" style="">
                                    <h3>{{$i}}</h3>
                                    <span style="color:red;font-size:14px;">Sales:{{(isset($daily_result_total[$i]) ? $daily_result_total[$i]: 0)}} $</span>
                                    <br>
                                    <span style="color:green;font-size:14px;">Net:{{(isset($net[$i]) ? $net[$i] : 0)}} $</span>
                                    
                                        @if($i>1)
                                        <?php
                                        if($net[$i] > $net[$i-1])
                                        {
                                            ?>
                                           <span style="color:green"> &#11165;</span>
                                            <?php
                                        }else if($net[$i] < $net[$i-1]){
                                            ?>      
                                            <span style="color:red">	&#11167;</span>
                                            <?php
                                        }
                                        ?>
                                        @endif
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
                                <h4>Filter By Products</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                               @if(count($byproducts) > 0 )
                               <?php 
                                $filtertotal = floatval(number_format(array_sum(array_column($byproducts,'total')), 1, ',', ' '));
                                $filterptotal = floatval(number_format(array_sum(array_column($byproducts,'p_total')), 1, ',', ' '));
                               ?>
                               <table id="example" class="table  table-striped table-bordered">
                                   <thead>
                                       <tr>
                                           <th colspan="3"></th>
                                           <th>{{number_format(array_sum(array_column($byproducts,'total')), 1, ',', ' ')}} $</th>
                                           <th>{{ ($filtertotal - $filterptotal )}}$</th>
                                       </tr>
                                      <tr>
                                        <th style="width:5%">#</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Net</th>
                                      </tr>
                                   </thead>
                                   <tbody>
                                    @foreach($byproducts as $key => $avl)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$avl->product_name}}</td>
                                            <td>{{$avl->quantity}}</td>
                                            <td>{{$avl->total}} $</td>
                                            <td>{{$avl->total - $avl->p_total}} $</td>
                                        </tr>
                                    @endforeach
                                   </tbody>
                               </table>
                               @endif
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>