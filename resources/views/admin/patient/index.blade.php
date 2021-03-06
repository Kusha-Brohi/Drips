@extends('layouts.app')

@push('before-css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Patient</h3>
                    
             <a class="btn btn-success pull-right" href="{{ url('/admin/add_patient') }}"><i
                                    class="icon-plus"></i> Add Patient</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table color-table table-bordered product-table table-hover dataTable no-footer" role="grid" aria-describedby="myTable_info" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Patient Id</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php

                                $i = 0;
                                @endphp
                            @foreach($patient as $item)
                         
                            <?php
                            $checkBlockList =  DB::table('users')->where('id',$item->user_id)->first();
                           // dd($checkBlockList);
                            ?>
                            @php
                            $i++
                            @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->fname }} {{ $item->lname }}</td>
                                    <td>

                                        <!--Block Patient ---->
                                        @if($checkBlockList->customer_status == 0)
                                            <a href="javascript:void()"  onclick="window.location.href='{{ route('UnblockUser',[$item->id ]) }}'" class=""><button class="btn btn-success btn-sm">
                                                    <i  aria-hidden="true"> </i> Unblock
                                                </button></a>
                                        @else
                                        <a href="javascript:void()"  onclick="window.location.href='{{ route('blockUser',[$item->id ]) }}'" class=""><button class="btn btn-danger btn-sm">
                                                    <i  aria-hidden="true"> </i> Block
                                                </button></a>
                                         @endif

                                            <a href="{{ url('/admin/patient/' . $item->id . '/edit') }}"
                                               title="Edit Patient">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"> </i> Edit
                                                </button>
                                            </a> 

                                        <a href="javascript:void()"  onclick="window.location.href='{{ route('makeAppointment',[$item->id ]) }}'" class=""><button class="btn btn-success">
                                                    <i  aria-hidden="true"> </i> Make Appointment
                                                </button></a>
                                            


                                        
                                            {!! Form::open([
                                       'method'=>'DELETE',
                                       'url' => ['/admin/patient', $item->id],
                                       'style' => 'display:inline'
                                   ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'Delete Patient',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                        
                                        {!! Form::close() !!}
                                        <a  id="link" href="{{ url('/admin/patient/view/' . $item->id ) }}" 

                                               title="Edit Doctor">

                                               
                                             <button class="btn btn-sm">

                                                      <i class="fa fa-eye" aria-hidden="true"></i>

                                                </button>

                                            </a>
                                    </td>
                                </tr>



                            @endforeach



                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $patient->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
        
    </div>

@endsection



@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {

            @if(\Session::has('message'))
      /*      $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });*/
            @endif
        })

        $(function () {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>

@endpush