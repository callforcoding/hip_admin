@extends("admin.layouts.app")
@section("title","Profile")
@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        {{ __('Admin User') }}
                        {{-- <button style="float: right; font-weight: 900;" class="btn btn-info btn-sm" type="button"  data-toggle="modal" data-target="#CreateFreelanceModel">
                          ( <i class="fa fa-plus"></i>) Add Freelancer
                        </button> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('First Name') }}</th>
                                    <th>{{ __('Last Name') }}</th>
                                    <th>{{ __('email') }}</th>
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

<!-- Create Freelance Modal -->
<div class="modal" id="CreateFreelanceModel">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="CreateFreelanceForm">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Freelancer</h4>
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
                    <strong>Success!</strong>Location was added successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- first_name -->
                <div class="form-group">
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name">
                </div>
                <!-- last_name -->
                <div class="form-group">
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name">
                </div>
                <!-- email -->
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email (abc@xyz.com)">
                </div>
                <div class="form-group">
                    <select class="form-control" name="role" id="role">
                        <option value="3">Freelancer</option>
                        <option value="2">Employeer</option>
                    </select>
                </div>
                {{-- address --}}
                <div class="form-group">
                    <textarea  class="form-control" name="address" id="address" placeholder="Enter Address"></textarea>
                </div>
                {{-- about --}}
                <div class="form-group">
                    <textarea  class="form-control" name="about" id="about" placeholder="Introduce yourself"></textarea>
                </div>

                {{-- location --}}
                <div class="form-group">
                    <select class="form-control" name="location_id" id="location_id">
                        <option value="1">Karachi</option>
                        <option value="2">Hyderabad</option>
                    </select>
                </div>
            </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="SubmitCreateFreelanceForm">Create</button>
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
                <h4 class="modal-title">Update Info</h4>
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
                    <strong>Success!</strong>Freelancer was added successfully.
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
<div class="modal" id="DeleteArticleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Freelancer Delete</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h4>Are you sure want to delete this Freelancer?</h4>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="SubmitDeleteArticleForm">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
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
            ajax: '{{ route("get-profile") }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'email', name: 'email'},
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
        $('#SubmitCreateFreelanceForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('profile.store') }}",
                method: 'post',
                data: $('#CreateFreelanceForm').serialize(),
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
                        $('#CreateFreelanceModel').modal('hide');
                        //reset-form-fields
                        resetFormFields('CreateFreelanceForm');
                        getMessage('Success','top-right','Information Added Successfully');
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
                url: "profile/"+id+"/edit",
                method: 'GET',
                success: function(result) {
                    //console.log(result);
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
                url: "profile/"+id,
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
                        getMessage('Success','top-right','Information Updated Successfully');
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
                url: "profile/"+id,
                method: 'DELETE',
                success: function(result) {
                    $('#DeleteArticleModal').hide();
                    $('.datatable').DataTable().ajax.reload();
                    getMessage('Success','top-right','User deleted Successfully');
                }
            });
        });
    });
</script>
@endsection
