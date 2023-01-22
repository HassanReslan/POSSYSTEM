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
            <h5><a href="{{route('report.sales',request('year'))}}">Yearly</a> > <a href="{{route('mounthlysalesreport',["month"=>request('month'),"year"=>request('year')])}}">Monthly</a> > Daily</h5>
        </div>
    </div>
    <div class="row gx-5 p-0">
        <div class="col-8 p-0" >
            <div class="p-3 border bg-white">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                        <h3>Sales Report Of {{ request('day')}} - {{request('month')}} - {{request('year')}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                           
                          @if( count($sales) > 0 )
                                <table id="example" class="table  table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:5%">#</th>
                                            <th>Invoice Nb</th>
                                            <th class="text-center">Stock</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Net</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sales as $key =>$val)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td class="text-left">{{$val->invoice_nb}}</td>
                                                <td>{{($val->stock_id == 0 ? 'Main Stock' : $val->name )}}</td>
                                                <td>{{$val->total}} $</td>
                                                <td>{{$val->total - $val->p_total}} $</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            
                          @else
                            <h5 style="color:red">No Sales Found!</h5>
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
                                                 <th>{{($filtertotal - $filterptotal )}}$</th>
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