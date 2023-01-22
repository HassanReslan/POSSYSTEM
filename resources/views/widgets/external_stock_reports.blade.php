<style >
        table td{
            font-size: 18px;
        }
</style>
<div class="container-fluid">
        <div class="row ">
            <div class="col-12 External-stock-header">
                Report of external Stocks
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-1 p-3">
                @if( $total == 0 )
                    {{ "No External Stocks found!"}}
                @else

                
                @endif
               <ul class="p-0 m-auto w-100 float-left">
                  @foreach($external_stocks as $key =>$info )
                  <li class="p-2 cards-shadow e-stock-li" style="">
                    <table border="1" width='100%'>
                        <tr>
                            <td colspan="4" style="font-size:19px;color:black;font-weight:bold">{{$info->name}}</td>
                        </tr>
                        <tr style="height:50px;">
                            <td class="text-right">Capital :</td>
                            <?php
                          //echo "<pre>";print_r($capitalandcount);exit;
                            ?>
                            <td class="text-left">{{($capitalandcount[$key][0]->capital != '' ? $capitalandcount[$key][0]->capital : 0)}} $</td>
                            <td class="text-right"><span>In Stock: </span></td>
                            <td class="text-left">{{$capitalandcount[$key][0]->count}}  p</td>
                        </tr>
                        <tr style="height:50px;">
                            <td class="text-right"><span>Sales: </span></td>
                            <td class="text-left"><span style="color:red">{{(isset($total[$info->id]) ? number_format($total[$info->id],2,'.','') : 0)}} $</span></td>
                            <td class="text-right"><span>Net: </span></td>
                            <td class="text-left"><span  style="color:green">{{ ( isset($total[$info->id])  ?  number_format($total[$info->id] - $ptotal[$info->id],2,'.','') : 0 )}} $</span></td>
                        </tr>
                    </table>
                    </li>
                  @endforeach
               </ul>
            </div>
        </div>
    </div>
</div>