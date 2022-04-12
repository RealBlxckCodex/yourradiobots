@extends('layouts.app')
@section('content')

    @if(\Illuminate\Support\Facades\Auth::user()->email_verified_at == null)
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong class="d-block d-sm-inline-block-force">Info!</strong> Bitte verifiziere deine Email.
            <button class="btn btn-info mr-5"
                    onclick="window.location.href = '{{ route('verification.resend') }}'">Nochmal senden</button>
        </div><!-- alert -->
    @endif

    <div class="row row-sm mg-t-20">
        <div class="col-md-8 col-xl-8">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Bots</h6>

                <p class="mg-b-20 mg-sm-b-30">Eine Übersicht deiner erstellten Bots</p>

                <table id="instances" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Botname</th>
                        <th>Serveraddresse</th>
                        <th>Region</th>
                        <th>Erstelldatum</th>
                        <th>Status</th>
                        <th>Aktionen</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach (\App\Bot::all()->where('user_id', Auth::user()->id) as $bot)
                        <tr>
                            <td>{{$bot->bot_name}}</td>
                            <td>{{$bot->server_address}}</td>
                            <td>{{\App\Hostsystem::all()->where('id', $bot->hostsystem_id)->first()->name}}</td>
                            <td>{{$bot->created_at}}</td>
                            @php($online = $bot->api->online())
                            <td>
                                <span class="square-8 bg-{{$online? 'success' : 'danger'}} mg-r-5 rounded-circle"></span> {{$online? 'Online' : 'Offline'}}
                            </td>
                            <td>
                                <button onclick="window.location.href='{{route('bot.view', [$bot->id])}}'"
                                        class="btn btn-outline-primary">Ansehen
                                </button>
                                <button onclick="window.location.href='{{route('bot.delete', [$bot->id])}}'"
                                        class="btn btn-outline-danger">Löschen
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- col-4 -->
        <div class="col-md-6 col-xl-4 mg-t-20 mg-md-t-0">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Bot erstellen</h6>

                <p class="mg-b-20 mg-sm-b-30">Erstelle deinen eigenen Bot im Handumdrehen!</p>
                <dl class="row">

                    <dt class="col-sm-3 tx-inverse">Bots</dt>
                    <dd class="col-sm-9">{{\App\Bot::all()->where('user_id', Auth::user()->id)->count()}} / 10</dd>
                </dl>
                <div class="justify-content-between right">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createBot"><i
                                class="fa fa-send mg-r-10"></i> Bot erstellen</a>
                </div>
            </div>
        </div><!-- col-4 -->
    </div>

    <div id="createBot" class="modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Bot erstellen</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <form id="createBotForm" method="post" action="{{route('bot.create')}}">
                        @csrf
                        <div class="row pb-4">
                            <label class="col-sm-4 form-control-label">Standort: </label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select id="hostsystemSelector" name="hostsystem_id" class="form-control" data-placeholder="">
                                    @foreach (\App\Hostsystem::all()->where('enabled', 1) as $hostsystem)
                                        <option value="{{$hostsystem->id}}">{{$hostsystem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- row -->
                        <div class="row">
                            <label class="col-sm-4 form-control-label">Botname: </label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" name="bot_name"
                                       placeholder="YourRadioBots.eu | Bot">
                            </div>
                        </div><!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Serveraddresse: </label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" name="server_address"
                                       placeholder="ts.yourradiobots.eu">
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Serverpassword:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" name="server_password" placeholder="">
                            </div>
                        </div>
                    </form>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="button" onclick="document.getElementById('createBotForm').submit();"
                            class="btn btn-info pd-x-20">Bot erstellen
                    </button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Abbrechen</button>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div>

@endsection
@section('breadcrumbs', Breadcrumbs::render('bots'))
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