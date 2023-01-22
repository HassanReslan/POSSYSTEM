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
            <button type="button" onclick="window.location.href='{{route('employees.create')}}'" class="btn btn-success" style="float:right ">Add Employee</button>
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
                    <th scope="col" colspan="8"> List Of Employees - ( {{ count( $employees) }} Employee)</th>
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

                @foreach($employees as $key => $employee)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>{{$employee->image}}</td>
                        <td>{{$employee->address}}</td>
                        <td width="5%">
                            <!--<button type="button" class="btn btn-info">Edit</button>-->
                            <a href="{{route('employees.edit',$employee->id)}}"><button  type="button" class="btn btn-info">Edit</button></a>
                        </td>
                        <td width="5%">
                            @csrf
                            @method('delete')

                            <button  onclick="if(confirm('Are you sure you want to Delete?')){window.location.href='{{route('employees.delete',$employee->id)}}'}else{return false}"  type="button" class="btn btn-danger">Delete</button>
                        </td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
