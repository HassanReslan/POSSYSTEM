<script>
$( document ).ready(function() {

    $('#example').DataTable({
        paging: true,
        ordering: false,
        info: false,
    });


    $('#cat_msg').hide();
    $('#cat_msg_edit').hide();
    $('#exampleModal').on('show.bs.modal', function (event) {
    });
    $.ajaxSetup({
        headers: {
            'X-CSSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#formcategory').on('click',function(){

        var category = $('#category_name').val();

        //console.log('{{route('categories.store')}}');
        //alert('{{route('categories.store')}}');
        console.error();
        $.ajax({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
            type: "GET",
            url: "{{route('categories.store')}}",
            data: {'category_name' : category },
            success: function(ajaxresponse) {

                $('#cat_msg').html(ajaxresponse);
                $('#cat_msg').show();
                setInterval(function () {$('#cat_msg').hide()}, 2000);
                window.location.href = '{{route('categories')}}';
            }
        });
    });

});
function OpenEditModal(categpry_name,category_id)
{
    $('#exampleModal_edit').show();
    $('#category_name_edit').val(categpry_name);


    $('#formcategory_edit').on('click',function(){
        var new_category = $('#category_name_edit').val();
        $.ajax({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
            type: "GET",
            url: "{{route('categories.edit')}}",
            data: {'category_name' : new_category,category_id:category_id },
            success: function(ajaxresponse) {

                $('#cat_msg_edit').html(ajaxresponse);
                $('#cat_msg_edit').show();
                setInterval(function () {$('#cat_msg_edit').hide()}, 2000);
                window.location.href = '{{route('categories')}}';
            }
        });
    });

}

</script>


<div class="modal fade" id="exampleModal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header External-stock-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mt-3" >
                        <div class="alert alert-success" role="alert" id="cat_msg_edit"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" value="" required name="category_name" id="category_name_edit" aria-describedby="emailHelp" placeholder="Enter Category Name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button"  id="formcategory_edit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form >
</div>




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header External-stock-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mt-3" >
                        <div class="alert alert-success" role="alert" id="cat_msg"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" value="" required name="category_name" id="category_name" aria-describedby="emailHelp" placeholder="Enter Category Name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="formcategory" class="btn btn-primary">Save</button>
            </div>
        </div>
        </form >
</div>
<div class="container-fluid  bg-white p-2 mt-3" >
    <div class="row">
        <div class="col-12">
            <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  class="btn btn-success" style="float:right ">Add Category</button>
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
        <div class="col-12 content-shadow category-div">
            <table class="table  table-striped table-bordered" id="example" >
                <thead>
                <tr>
                    <th scope="col" colspan="8"> List Of Categories</th>
                </tr>
                <tr>
                    <th scope="col" style="width: 5%">#</th>
                    <th scope="col">Name</th>

                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $key => $categorie)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$categorie->category_name}}</td>

                        <td width="5%">
                            <button onclick="OpenEditModal('{{$categorie->category_name}}','{{$categorie->id}}')" type="button" data-toggle="modal" data-target="#exampleModal_edit" data-whatever="@mdo" class="btn btn-info">Edit</button>
                        </td>
                        <td width="5%">
                            @csrf
                            @method('delete')
                            <button  onclick="if(confirm('Are you sure you want to Delete?')){window.location.href='{{route('categories.delete',$categorie->id)}}'}else{return false}"  type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
