<script>
    $(document).ready(function () {
        $('#example').DataTable({
            paging: true,
            ordering: false,
            info: false,
        });
    });
</script>
<div class="container-fluid bg-white  mt-3 p-3" >
    <div class="row">
        <div class="col-12">
            <button type="button" onclick="window.location.href='{{route('customers.create')}}'" class="btn btn-success" style="float:right ">Add Customer</button>
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
                    <th scope="col" colspan="8"> List Of Customers - ( {{ count($customers) }} customers)</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">phone</th>
                    <th scope="col">image</th>
                    <th scope="col">address</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($customers as $key => $customer)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->image}}</td>
                        <td>{{$customer->address}}</td>
                        <td width="5%">
                            <!--<button type="button" class="btn btn-info">Edit</button>-->
                            <a href="{{route('customers.edit',$customer->id)}}"><button  type="button" class="btn btn-info">Edit</button></a>
                        </td>
                        <td width="5%">
                            @csrf
                            @method('delete')

                            <button  onclick="if(confirm('Are you sure you want to Delete?')){window.location.href='{{route('customers.delete',$customer->id)}}'}else{return false}"  type="button" class="btn btn-danger">Delete</button>
                        </td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
