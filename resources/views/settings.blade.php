@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('settings'))
@section('content')
    <div class="row row-sm mg-t-20">
        <div class="col-md-8 col-xl-8">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Einstellungen</h6>

                <p class="mg-b-20 mg-sm-b-30">Verwalte dein Konto</p>
                <div class="row mg-b-25 pl-3">
                    <form method="post" id="settingsNAME" action="{{route('settings.change.name')}}">
                        @csrf
                        <div class="">
                            <div class="form-group">
                                <label class="form-control-label">Name: </label>
                                <input class="form-control" type="text" name="name"
                                       value="{{\Illuminate\Support\Facades\Auth::user()->name}}" style="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">E-Mail: </label>
                                <input class="form-control" type="email" name="email"
                                       value="{{\Illuminate\Support\Facades\Auth::user()->email}}" style="">
                            </div>
                        </div><!-- col-4 -->
                    </form>
                    <form method="post" id="settingsPW" action="{{route('settings.change.password')}}">
                        @csrf
                        <div class="pl-5">
                            <div class="form-group">
                                <label class="form-control-label">Passwort: </label>
                                <input class="form-control" type="password" name="newPassword" value=""
                                       placeholder="***************" autocomplete="off">
                            </div>
                        </div><!-- col-4 -->
                        <div class="pl-5">
                            <div class="form-group">
                                <label class="form-control-label">Passwort Confirm:</label>
                                <input class="form-control" type="password" name="newPassword_confirmation" value=""
                                       placeholder="***************" autocomplete="off">
                            </div>
                        </div><!-- col-4 -->
                    </form>
                </div><!-- row -->

                <div class="form-layout-footer">
                    <button class="btn btn-primary mg-r-5"
                            onclick="document.getElementById('settingsNAME').submit()">Name speichern
                    </button>
                    <button class="btn btn-warning mg-r-5" onclick="document.getElementById('settingsPW').submit()">
                        Password ändern
                    </button>
                </div><!-- form-layout-footer -->
            </div>
        </div><!-- col-4 -->
        <div class="col-md-6 col-xl-4 mg-t-20 mg-md-t-0">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Informationen</h6>

                <p class="mg-b-20 mg-sm-b-30">
                <dl class="row">

                    <dt class="col-sm-3 tx-inverse">Name</dt>
                    <dd class="col-sm-9">{{\Illuminate\Support\Facades\Auth::user()->name}}</dd>

                    <dt class="col-sm-3 tx-inverse">Email</dt>
                    <dd class="col-sm-9">{{\Illuminate\Support\Facades\Auth::user()->email}}</dd>

                    <dt class="col-sm-3 tx-inverse">Erstelldatum</dt>
                    <dd class="col-sm-9">{{str_replace('-', '.', \Illuminate\Support\Facades\Auth::user()->created_at)}}</dd>

                    <dt class="col-sm-3 tx-inverse">Bots</dt>
                    <dd class="col-sm-9">{{\App\Bot::all()->where('user_id', Auth::user()->id)->count()}}</dd>

                    <dt class="col-sm-3 tx-inverse">Tickets</dt>
                    <dd class="col-sm-9">0</dd>
                </dl>
            </div>
        </div><!-- col-4 -->
    </div>
@endsection
