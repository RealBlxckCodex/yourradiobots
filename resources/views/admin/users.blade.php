@extends('layouts.app')
@section('content')


    <div class="row row-sm mg-t-20">
        <div class="col-md-8 col-xl-8 ">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Benutzer</h6>

                <table id="instances" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Rolle</th>
                        <th>Erstelldatum</th>
                        <th>Aktionen</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach (\App\User::all() as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <button onclick="window.location.href='{{route('admin.user.login', [$user])}}'"
                                        class="btn btn-outline-danger">Einloggen
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('breadcrumbs', Breadcrumbs::render('admin'))
@section('style')
    <link href="{{asset('assets/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/starlight.css')}}" rel="stylesheet">
@endsection
@section('script')
    <script src="{{asset('assets/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('assets/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('assets/lib/select2/js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#instances').DataTable({
                bLengthChange: true,
                searching: true,
                responsive: true
            });
        });
    </script>
@endsection