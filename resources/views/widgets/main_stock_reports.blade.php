<style>
    table td{
        font-size: 18px;
        color: black;
        font-weight: bold;
    }
</style>
<div class="container-fluid">
    <div class="row ">
        <div class="col-12 External-stock-header">
            Report of Main Stock
        </div>
    </div>
    <div class="row gx-5 p-0 ">
        <div class="col-8 p-0">
            <div class="p-3 border bg-white">
                <table width='100%' border='1'>
                    <tr>
                    <td class="text-right">Sock Capital:</td>
                        <td class="text-left"> {{ $capitalandcount[0]->capital}} $</td>
                        <td class="text-right">In Stock:</td>
                        <td class="text-left">{{ $capitalandcount[0]->count}} Product</td>
                    </tr>
                    <tr>
                        <td class="text-right">Sales:</td>
                        <td class="text-left">{{(isset($totals[0]->total)  ? number_format($totals[0]->total,2,'.','') : 0)}} $</td>
                        <td class="text-right">Net:</td>
                        <td class="text-left">{{number_format($totals[0]->total - $totals[0]->p_total,2,'.','')}} $</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-4 pr-0">
            <div class="p-3 border bg-white">Details</div>
        </div>
    </div>
</div>