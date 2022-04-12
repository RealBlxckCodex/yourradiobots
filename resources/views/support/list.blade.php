@extends('layouts.app')
@section('content')

    <div class="row row-sm mg-t-20">
        <div class="col-md-8 col-xl-8">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Support</h6>

                <p class="mg-b-20 mg-sm-b-30">Deine erstellten Tickets</p>

                <table id="instances" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Abteilung</th>
                        <th>Betreff</th>
                        <th>Status</th>
                        <th>Priorität</th>
                        <th>Aktualisierungsdatum</th>
                        <th>Aktionen</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach (\App\Support::all()->where('creator_id', \Illuminate\Support\Facades\Auth::user()->id) as $support)
                        <tr>
                            <td>{{$support->getSupportCategory()->name}}</td>
                            <td>{{$support->title}}</td>
                            <td>{{$support->getStatus()}}</td>
                            <td>{{$support->getPriority()}}</td>
                            @if(\App\SupportAnswer::all()->where('support_id', $support->id)->count() != 0)
                                <td>{{\App\SupportAnswer::all()->where('support_id', $support->id)->last()->first()->created_at}}</td>
                            @else
                                <td></td>
                            @endif
                            <td><button class="btn btn-info" onclick="window.location.href = '{{route('support.view', [$support])}}'">Ansehen</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- col-4 -->
        <div class="col-md-6 col-xl-4 mg-t-20 mg-md-t-0">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Ticket erstellen</h6>

                <p class="mg-b-20 mg-sm-b-30">Du brauchst Hile? Erstelle ein Ticket!</p>
                <div class="justify-content-between right">
                    <button
                            onclick="window.location.href = '{{route('support.create')}}'" class="btn btn-primary"><i
                                class="fa fa-send mg-r-10"></i> Ticket erstellen
                    </button>
                </div>

            </div>
        </div><!-- col-4 -->
    </div>

@endsection
@section('breadcrumbs', Breadcrumbs::render('support'))
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
                bLengthChange: false,
                searching: false,
                responsive: true
            });
        });
    </script>
@endsection