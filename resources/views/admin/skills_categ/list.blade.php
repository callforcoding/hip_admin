@extends("admin.layouts.app")
@section("title","Skills Catgory")
@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        {{ __('Skills Category') }}
                        <button style="float: right; font-weight: 900;" class="btn btn-info btn-sm" type="button"  data-toggle="modal" data-target="#CreateModal">
                          ( <i class="fa fa-plus"></i>) Add Skills Category
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th width="150" class="text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create skill Modal -->
<div class="modal" id="CreateModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="CreateModalForm">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Skill Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert-danger alert-dismissible fade show mb-3" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="alert-success alert-dismissible fade show mb-3" role="alert" style="display: none;">
                    <strong>Success!</strong>Gategory added successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Skills Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter Slug">
                </div>
                <div class="form-group">
                    <textarea  class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="SubmitCreateModal">Create</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>

    </div>
</div>

<!-- Edit Article Modal -->
<div class="modal" id="EditLocationModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" name="editForm">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Category</h4>
                <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert-danger alert-dismissible fade show mb-3" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="alert-success alert-dismissible fade show mb-3" role="alert" style="display: none;">
                    <strong>Success!</strong> Category Updated successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="EditLocationModalBody"></div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="SubmitEditFreelancerForm">Update</button>
                <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Delete Article Modal -->
<div class="modal delete" id="DeleteArticleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Category Delete</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h4>Are you sure want to delete?</h4>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="SubmitDeleteArticleForm">Yes</button>
                <button type="button" class="btn btn-default dltbtn" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('page_js')
<script type="text/javascript">
    $(document).ready(function() {
        // init datatable.
        var dataTable = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 5,
            // scrollX: true,
            "order": [[ 0, "desc" ]],
            ajax: '{{ route("get-skills-category") }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'Actions', name: 'Actions',orderable:false,serachable:false,sClass:'text-center'},
            ]
        });

        function getMessage(s,p,t) {
            return $.toast({
                heading: s,
                position:p,
                text: t,
                showHideTransition: 'plain',
                icon: s.toLowerCase()
            });
        }
        function resetFormFields(id) {
            document.getElementById(`${id}`).reset();
        }

        // Create article Ajax request.
        $('#SubmitCreateModal').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('skills_categ.store') }}",
                method: 'post',
                data: $('#CreateModalForm').serialize(),
                success: function(result) {
                    if(result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.datatable').DataTable().ajax.reload();
                        $('.alert-success').hide();
                        $('#CreateModal').modal('hide');
                        //reset-form-fields
                        resetFormFields('CreateModalForm');
                        getMessage('Success','top-right','Category Added Successfully');
                    }
                }
            });
        });

        // Get a single EditModel
        $('.modelClose').on('click', function(){
            $('#EditLocationModal').hide();
        });
        var id;
        $('body').on('click', '#getEditLocationData', function(e) {
            e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');

            $.ajax({
                url: "skills_categ/"+id+"/edit",
                method: 'GET',
                success: function(result) {
                    console.log(result);
                     $('#EditLocationModalBody').html(result.html);
                     $('#EditLocationModal').show();
                }
            });
        });

        // Update article Ajax request.
        $('#SubmitEditFreelancerForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "skills_categ/"+id,
                method: 'PUT',
                data: $('#editForm').serialize(),
                success: function(result) {
                    if(result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.datatable').DataTable().ajax.reload();
                        $('.alert-success').hide();
                        $('#EditLocationModal').hide();
                        getMessage('Success','top-right','Category Updated Successfully');
                    }
                }
            });
        });

        // Delete article Ajax request.
        var deleteID;
        $('body').on('click', '#getDeleteId', function(){
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteArticleForm').click(function(e) {
            e.preventDefault();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "skills_categ/"+id,
                method: 'DELETE',
                success: function(result) {
                    $('#DeleteArticleModal').removeClass('show');
                    $('.datatable').DataTable().ajax.reload();
                    getMessage('Success','top-right','Record deleted Successfully');
                }
            });
        });
    });
</script>
@endsection
