@extends('layouts.app')

@push('after-css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                    <div class="card-body">
                        <h3 class="box-title pull-left">Users List</h3>
                        
                        <div class="clearfix"></div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Role</th>
											 <th>Status</th>
                                              <th>Approval</th>
                                              <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $key=>$user)

                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->roles()->pluck('name')->implode(', ')}}</td>
                                              
												<td>{{$user->Is_approved}}</td>
												
												<td>
                                      
										<!---approval-->	
							
							<button style="height:39px; width: 79%; font-size: 14px; " aria-expanded="false" data-toggle="dropdown" class="btn waves-effect waves-light btn-rounded btn-outline-primary dropdown-toggle m-t-10" type="button">Approval<span class="caret"></span></button>
								<ul role="menu" class="dropdown-menu"> 
								<li><a href="javascript:void()"  onclick="window.location.href='{{ route('status.completed',[($user->id),'rejected']) }}'" class="">Reject</a></li>
							<li><a href="javascript:void()"  onclick="window.location.href='{{ route('status.completed',[($user->id),'Approved']) }}'" class="">Approved</a></li>
						
							</ul>
						
							<!---aprooval end-->	
	
												</td>
                                                <td>
                                        
                                                    <a class="delete btn btn-danger"
                                                       href="{{url('admin/users/delete/'.$user->id)}}"><i
                                                                class="fa fa-trash"></i> Delete</a> 
                                            

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.admin.footer')
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.delete', function (e) {
                if (confirm('Are you sure want to delete?')) {
                }
                else {
                    return false;
                }
            });
            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            @endif
        })

        $(function () {
            $('#myTable').DataTable({
                "columns": [
                    null, null, null, {"orderable": false}
                ]
            });

        });
    </script>

@endpush