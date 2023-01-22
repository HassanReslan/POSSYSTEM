<script>
    $(document).ready(function () {
        $('#example').DataTable({
            paging: true,
            ordering: false,
            info: false,
        });
    });
</script>
<div class="container-fluid bg-white mt-3 p-3" >
    <div class="row">
        <div class="col-12">
            <button type="button" onclick="window.location.href='{{route('suppliers.create')}}'" class="btn btn-success float-right">Add Supplier</button>
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
    <div class="row" style="overflow-y: auto;">
        <div class="col-12 content-shadow">
            <table class="table  table-striped table-bordered" id="example"  >
                <thead>
                <tr>
                    <th scope="col" colspan="8"> List Of Suppliers - ( {{ count($suppliers) }} suppliers)</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">phone</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">address</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($suppliers as $key => $supplier)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$supplier->suplier_f_name }} {{$supplier->suplier_l_name}}</td>
                        <td>{{$supplier->email}}</td>
                        <td>{{$supplier->suplier_phone}}</td>
                        <td>{{$supplier->company_name}}</td>
                        <td>{{$supplier->address}}</td>
                        <td width="5%">
                            <!--<button type="button" class="btn btn-info">Edit</button>-->
                            <a href="{{route('suppliers.edit',$supplier->id)}}"><button  type="button" class="btn btn-info">Edit</button></a>
                        </td>
                        <td width="5%">
                            @csrf
                            @method('delete')

                            <button  onclick="if(confirm('Are you sure you want to Delete?')){window.location.href='{{route('suppliers.delete',$supplier->id)}}'}else{return false}"  type="button" class="btn btn-danger">Delete</button>
                        </td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
