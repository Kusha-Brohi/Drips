@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Request {{ $request->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/admin/request') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $request->id }}</td>
                            </tr>
                            <tr><th> Symtoms </th><td> {{ $request->symtoms }} </td></tr><tr><th> Attachments </th><td> {{ $request->attachments }} </td></tr><tr><th> Booking Type </th><td> {{ $request->booking_type }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.footer')
</div>
@endsection

