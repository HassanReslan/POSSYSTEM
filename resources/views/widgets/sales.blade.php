<script>
    $(document).ready(function () {
        $('#example').DataTable({
            paging: true,
            ordering: true,
            info: true,
        });
    });
</script>
<div class="container-fluid bg-white mt-3 ">
    <div class="row">
        <div class="col-12 External-stock-header  mb-2">
            List Of Invoices
        </div>
        <div class="col-12">
            <form action="{{route('search.invoices')}}" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="form-group ">
                    <div class="row ">
                        <div class="col-3">
                        <label for="exampleInputEmail1">Invoice Number</label>
                        <input name="invoice_number" value="{{ old('invoice_number') }}" type="text" class="form-control" placeholder="Invoice Number">
                        </div>
                        <div class="col-3">
                        <label for="exampleInputEmail1">Date</label>
                        <input name="date" value="{{ old('date') }}" type="date" class="form-control" placeholder="" >
                        </div>
                        <div class="col-3">
                        <label for="exampleInputEmail1">Customer</label>
                            <select class="form-control " name="customer_id">
                                <option value="0">Select Customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 m-auto">   
                              <button name="search" type="submit" class="btn"><img   class="d-flex flex-wrap align-items-center" src="{{asset('svg/search-solid.svg')}}" style="width:40px;height:40px"></button>
                        </div>
                    </div>
                 </div>
            </form>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
           <table class="table  table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th style="width:5%">#</th>
                        <th>Invoice Nb</th>
                        <th>Invoice Date</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $key => $invoice)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$invoice->invoice_nb}}</td>
                            <td>{{$invoice->date}}</td>
                            <td>{{$invoice->total}} $</td>
                            <td><button onclick="window.location.href='{{route('invoicedetails',$invoice->id)}}'" type="button" class="btn btn-info">Details</button></td>
                        </tr>
                    @endforeach
                </tbody>
           </table>
        </div>
    </div>
</div>