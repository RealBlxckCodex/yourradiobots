@extends('layouts.app')
@section('content')

    <div class="row row-sm mg-t-20">
        <div class="col-md-8 col-xl-8 ">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Commands</h6>

                <p class="mg-b-20 mg-sm-b-30">Verwalte, wer mit deinem Bot interagieren darf</p>


                <table id="instances" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>UID</th>
                        <th>Permissions</th>
                        <th>Aktionen</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach (\App\BotUser::all()->where('bot_id', $bot->id) as $botUser)
                        <tr>
                            <td>{{$botUser->name}}</td>
                            <td>{{$botUser->uid}}</td>
                            <td>
                                @foreach (\App\BotUserPermission::all()->where('bot_user_id', $botUser->id) as $botUserPermission)
                                    <span class="square-8 bg-success mg-r-5 rounded-circle"></span>{{$botUserPermission->permission}}
                                @endforeach
                            </td>
                            <td>
                                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#editUser{{$botUser->id}}">Editieren
                                </button>
                                <button onclick="window.location.href='{{route('bot.command.deleteuser', [$bot->id, $botUser->id])}}'"
                                        class="btn btn-outline-danger">Löschen
                                </button>
                            </td>
                        </tr>

                        <div id="editUser{{$botUser->id}}" class="modal fade" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-header pd-x-20">
                                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Benutzer editieren</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body pd-20 pr-md-5 pl-md-5">
                                        <form id="userEditForm{{$botUser->id}}" method="post" action="{{route('bot.command.edituser', [$bot, $botUser])}}">
                                            @csrf
                                            <div class="row">
                                                <label class="col-sm-4 form-control-label">Name: </label>
                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <input type="text" class="form-control" name="name" value="{{$botUser->name}}">
                                                </div>
                                            </div><!-- row -->
                                            <div class="row mg-t-20">
                                                <label class="col-sm-4 form-control-label">UID: </label>
                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <input type="text" class="form-control" name="uid"
                                                           value="{{$botUser->uid}}">
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="form-group">
                                                    <label class="ckbox">
                                                        <input name="play" {{$botUser->hasPermission('play')? 'checked': ''}} type="checkbox">
                                                        <span>Play</span>
                                                    </label>
                                                </div>
                                            </div><!-- col-4 -->
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="ckbox">
                                                        <input name="stop" {{$botUser->hasPermission('stop')? 'checked': ''}} type="checkbox">
                                                        <span>Stop</span>
                                                    </label>
                                                </div>
                                            </div><!-- col-4 -->
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="ckbox">
                                                        <input name="pause" {{$botUser->hasPermission('pause')? 'checked': ''}} type="checkbox">
                                                        <span>Pause</span>
                                                    </label>
                                                </div>
                                            </div><!-- col-4 -->

                                            {{--                        <div class="row mg-t-20">--}}
                                            {{--                            <label class="col-sm-4 form-control-label">Serverpassword:</label>--}}
                                            {{--                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">--}}
                                            {{--                            </div>--}}
                                            {{--                        </div>--}}
                                        </form>
                                    </div><!-- modal-body -->
                                    <div class="modal-footer">
                                        <button type="button" onclick="document.getElementById('userEditForm{{$botUser->id}}').submit();"
                                                class="btn btn-success pd-x-20">Speichern</button>
                                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Abbrechen</button>
                                    </div>
                                </div>
                            </div><!-- modal-dialog -->
                        </div>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-6 col-xl-4 mg-t-20 mg-md-t-0">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Benutzer hinzufügen</h6>

                <p class="mg-b-20 mg-sm-b-30">Füge einen Benutzer hinzu.</p>
                <div class="justify-content-between right">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#userCreate"><i
                                class="fa fa-send mg-r-10"></i> Benutzer hinzufügen</a>

                </div>

            </div>
        </div><!-- col-4 -->
    </div>


    <div id="userCreate" class="modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Benutzer erstellen</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pd-20 pr-md-5 pl-md-5">
                    <form id="userCreateForm" method="post" action="{{route('bot.command.create', [$bot])}}">
                        @csrf
                        <div class="row">
                            <label class="col-sm-4 form-control-label">Name: </label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" name="name" placeholder="Max Mustermann">
                            </div>
                        </div><!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">UID: </label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" name="uid"
                                       placeholder="j8HZJTxLlma/Wa+rcPJxSw4XenE=">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="form-group">
                                <label class="ckbox">
                                    <input name="play" type="checkbox">
                                    <span>Play</span>
                                </label>
                            </div>
                        </div><!-- col-4 -->
                        <div class="row">
                            <div class="form-group">
                                <label class="ckbox">
                                    <input name="stop" type="checkbox">
                                    <span>Stop</span>
                                </label>
                            </div>
                        </div><!-- col-4 -->
                        <div class="row">
                            <div class="form-group">
                                <label class="ckbox">
                                    <input name="pause" type="checkbox">
                                    <span>Pause</span>
                                </label>
                            </div>
                        </div><!-- col-4 -->

{{--                        <div class="row mg-t-20">--}}
{{--                            <label class="col-sm-4 form-control-label">Serverpassword:</label>--}}
{{--                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </form>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="button" onclick="document.getElementById('userCreateForm').submit();"
                            class="btn btn-success pd-x-20">Hinzufügen</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Abbrechen</button>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div>

@endsection
@section('breadcrumbs', Breadcrumbs::render('commandView', $bot))
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
                searching: true,
                responsive: true
            });
            $('.select2').select2({
                minimumResultsForSearch: Infinity,
                tokenSeparators: [',', ' '],
                multiple: true,
                dropdownParent: $('#userCreate')
            });
        });

    </script>
@endsection
@section('sidebar')
    <label class="sidebar-label">Bot #{{$bot->id}}</label>
    <div class="sl-sideleft-menu">
        <a href="{{route('bot.view', [$bot])}}"
           class="sl-menu-link {{ Route::currentRouteName() != 'bot.view'?: 'active' }}">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-disc tx-22"></i>
                <span class="menu-item-label">Bot</span>
            </div>
        </a>
        <a href="{{route('bot.command', [$bot])}}"
           class="sl-menu-link {{ Route::currentRouteName() != 'bot.command'?: 'active' }}">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-person-add tx-22"></i>
                <span class="menu-item-label">Rechte</span>
            </div>
        </a>
        <a href="{{route('bot.transfer', [$bot])}}"
           class="sl-menu-link {{ Route::currentRouteName() != 'bot.transfer'?: 'active' }}">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios7-cloud-upload tx-22"></i>
                <span class="menu-item-label">Transferieren</span>
            </div>
        </a>
    </div>
@stop