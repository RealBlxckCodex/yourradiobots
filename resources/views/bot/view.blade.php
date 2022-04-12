@extends('layouts.app')
@section('content')
    <div class="row row-sm mg-t-20">
        <div class="col-md-8 col-xl-8 ">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Bot</h6>

                <p class="mg-b-20 mg-sm-b-30">Verwalte deinen eigenen Bot</p>

                <div class="d-sm-flex wd-sm-300">
                    <div class="form-group mg-b-0">
                        <label><span class="">Eigener Stream / Youtube Link</span></label>
                        <input type="text" id="url" name="video" class="form-control wd-200 wd-xs-250" placeholder=""
                               required="">
                    </div><!-- form-group -->
                    <div class="mg-sm-l-10 mg-t-10 mg-sm-t-25 pd-t-4">
                        <button onclick="play(document.getElementById('url').value)" class="btn btn-success"><i
                                    class="fas fa-play mg-r-10"></i> Abspielen
                        </button>
                    </div>
                    <div class="mg-sm-l-10 mg-t-10 mg-sm-t-25 pd-t-4">
                        <button onclick="window.location.href='{{route('bot.stopaudioplay', [$bot->id])}}'"
                                class="btn btn-danger"><i
                                    class="fas fa-stop mg-r-10"></i> Stoppen
                        </button>
                    </div>
                </div>

                <div class="d-sm-flex wd-sm-300 pt-5" style="">
                    <div class="form-group">
                        <label><span class="">Lautstärke</span></label>
                        <input type="range" min="1" max="100" value="{{$bot->volume}}" class="slider" id="myRange">
                    </div><!-- form-group -->
                </div>
                <br>
                <br>
                <br>
                <button class="btn btn-info pd-x-20" data-toggle="modal" data-target="#settingsModel">Einstellungen
                </button>

            </div>
        </div><!-- col-4 -->
        <div class="col-md-6 col-xl-4">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Kontrolle</h6>

                <p class="mg-b-20 mg-sm-b-30">Kontrolliere deinen eigenen Bot</p>
                <div class="justify-content-between right">
                    <button onclick="window.location.href='{{route('bot.start', [$bot->id])}}'" class="btn btn-success">
                        <i class="fas fa-plug mg-r-10"></i> Bot starten
                    </button>
                    <button onclick="window.location.href='{{route('bot.stop', [$bot->id])}}'" class="btn btn-danger"><i
                                class="fas fa-power-off mg-r-10"></i> Bot stoppen
                    </button>
                    <button onclick="window.location.href='{{route('bot.restart', [$bot->id])}}'"
                            class="btn btn-primary"><i class="fas fa-undo mg-r-10"></i> Bot neustarten
                    </button>
                </div>

                <dl class="row mt-5">

                    <dt class="col-sm-3 tx-inverse">Name</dt>
                    <dd class="col-sm-9">{{$bot->bot_name}}</dd>

                    <dt class="col-sm-3 tx-inverse">Server</dt>
                    <dd class="col-sm-9">{{$bot->server_address}}</dd>

                    <dt class="col-sm-3 tx-inverse">Status</dt>
                    <dd class="col-sm-9">{{$bot->api->online()?"Online":"Offline"}}</dd>

                    <dt class="col-sm-3 tx-inverse">Uptime</dt>
                    <dd class="col-sm-9"
                        id="uptime">Keine</dd>

                    <dt class="col-sm-3 tx-inverse">Lautstärke</dt>
                    <dd class="col-sm-9">{{$bot->volume}}%</dd>
                </dl>
            </div>
        </div><!-- col-4 -->
        <div class="col-md-12 col-xl-12 pt-4">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Youtube Browser</h6>

                <p class="mg-b-20 mg-sm-b-30">Spiele direkt Youtube Videos ab</p>

                <input class="form-control" placeholder="Keyword" type="text" id="searchquery"/>
                <div class="row form-group" id="results">

                    <div class="row">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row row-sm mg-t-20">
        <div class="col-md-8 col-xl-8">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Radiobrowser</h6>

                <p class="mg-b-20 mg-sm-b-30">Such dir ein Radio aus unserer Liste raus</p>


                <div class="accordion accordion-bordered" id="accordion" role="tablist">
                    @foreach (\App\Radio::all()->where('visible', 1) as $radio)
                        <div class="card">
                            <div class="card-header" role="tab" id="heading-1">
                                <h6 class="mb-0">
                                    <a data-toggle="collapse" href="#{{$radio->name}}" aria-expanded="false"
                                       aria-controls="{{$radio->name}}" class="collapsed">
                                        {{$radio->name}} </a>
                                </h6>
                            </div>
                            <div id="{{$radio->name}}" class="collapse" role="tabpanel" aria-labelledby="heading-1"
                                 data-parent="#accordion" style="">
                                <div class="card-body">
                                    <table class="w-100 m-auto">
                                        <tbody>
                                        @foreach (\App\RadioSender::all()->where('radio_id', $radio->id) as $radioSender)
                                            <tr class="border-bottom">
                                                <td class="float-left m-2"
                                                    style="height: 20px;line-height: 35px;">{{$radioSender->name}}</td>
                                                <td class="float-right m-2">
                                                    <button class="btn btn-info btn-icon rounded-circle mg-r-5 mg-b-10"
                                                            onclick="play('{{$radioSender->url}}')">
                                                        <div><i class="fas fa-play"></i></div>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div><!-- col-4 -->
    </div>

    <div id="settingsModel" class="modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Einstellungen</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <form id="settingsForm" method="post" action="{{route('bot.settings', [$bot->id])}}">
                        @csrf
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Botname:</label>
                                    <input class="form-control" type="text" name="bot_name" value="{{$bot->bot_name}}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Server Adresse:</label>
                                    <input class="form-control" type="text" name="server_address"
                                           value="{{$bot->server_address}}"
                                           autocomplete="off"
                                           style="">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Server Passwort:</label>
                                    <input class="form-control" type="text" name="server_password"
                                           value="{{$bot->server_password}}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Volume: </label>
                                    <input class="form-control" type="text" name="volume" value="{{$bot->volume}}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Channel ID: </label>
                                    <input class="form-control" type="text" name="channel_name"
                                           value="{{$bot->channel_name}}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Channel Passwort: </label>
                                    <input class="form-control" type="text" name="channel_password"
                                           value="{{$bot->channel_password}}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Avatar URL: </label>
                                    <input class="form-control" type="text" name="avatar_url"
                                           value="{{$bot->avatar_url}}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Song URL: </label>
                                    <input class="form-control" type="text" name="song_url"
                                           value="{{$bot->song_url}}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input name="loop" {{$bot->loop? 'checked': ''}} type="checkbox">
                                        <span>Loop</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->

                        </div>
                    </form>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="button" onclick="document.getElementById('settingsForm').submit()"
                            class="btn btn-info pd-x-20">Speichern
                    </button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Abbrechen</button>
                </div>
            </div>

        </div><!-- modal-dialog -->
    </div>

@endsection
@section('breadcrumbs', Breadcrumbs::render('botView', $bot))
@section('style')
    <link href="{{asset('assets/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/starlight.css')}}" rel="stylesheet">

    <style>
        .slidecontainer {
            width: 100%; /* Width of the outside container */
        }

        /* The slider itself */
        .slider {
            -webkit-appearance: none; /* Override default CSS styles */
            appearance: none;
            width: 100%; /* Full-width */
            height: 25px; /* Specified height */
            background: #d3d3d3; /* Grey background */
            outline: none; /* Remove outline */
            opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
            -webkit-transition: .2s; /* 0.2 seconds transition on hover */
            transition: opacity .2s;
        }

        /* Mouse-over effects */
        .slider:hover {
            opacity: 1; /* Fully shown on mouse-over */
        }

        /* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */
        .slider::-webkit-slider-thumb {
            -webkit-appearance: none; /* Override default look */
            appearance: none;
            width: 25px; /* Set a specific slider handle width */
            height: 25px; /* Slider handle height */
            background: #5B93D3; /* Green background */
            cursor: pointer; /* Cursor on hover */
        }

        .slider::-moz-range-thumb {
            width: 25px; /* Set a specific slider handle width */
            height: 25px; /* Slider handle height */
            background: #5B93D3; /* Green background */
            cursor: pointer; /* Cursor on hover */
        }
    </style>

@endsection
@section('script')
    <script src="{{asset('assets/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('assets/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('assets/lib/select2/js/select2.min.js')}}"></script>
    <script>
        var slider = document.getElementById("myRange");
        var lastVolume = -1;
        slider.oninput = function () {
            if (lastVolume == this.value) return;
            lastVolume = this.value;
            volume(this.value);
        };

        function play(url) {
            if (!url.startsWith('http://')) url = "http://" + url;
            $.ajax({
                url: "{{route('bot.play', [$bot->id])}}",
                type: "post",
                data: {
                    "_token": "{{csrf_token()}}",
                    "url": url
                }
            });
        }

        function volume(volume) {
            $.ajax({
                url: "{{route('bot.volume', [$bot->id])}}",
                type: "post",
                data: {
                    "_token": "{{csrf_token()}}",
                    "volume": volume
                }
            });
        }

        $('#countdown').countdown("{{$bot->expire_at}}", function (event) {
            $('#countdown').text(
                event.strftime('Dein Bot läuft in %D Tage %H Stunden %M Minuten und %S Sekunden aus')
            );
        });
        jQuery(document).ready(function ($) {

            $('#searchquery').keyup(function () {

                var q = $('#searchquery').val().trim();
                var $results = $('#results');
                var test = "https://www.googleapis.com/youtube/v3/search?part=snippet&type=video&key=AIzaSyDhAS6I411yWMe5LWT08lsZEazB3NaGhw8&max-results=2&q=";

                $.getJSON(test + q, function (json) {
                    var count = 0;
                    if (json.items) {
                        var items = json.items;
                        var html = "";
                        items.forEach(function (item) {
                            console.log(item);
                            var duration = Math.round((item.duration) / (60 * 60));
                            var videoId = item.id.videoId;
                            html += '<div class="col-md-2"> ' +
                                '<div class="card"> ' +
                                '<img class="card-img-top" ' +
                                'src="http://i.ytimg.com/vi/' + videoId + '/default.jpg" ' +
                                'alt="Card image cap"> ' +
                                '<div class="card-body"> ' +
                                '<h4 class="card-title mb-2">' + item.snippet.title + '</h4> ' +
                                '<button class="btn btn-primary"' +
                                'onclick="play(\'https://www.youtube.com/watch?v=' + videoId + '\')"' +
                                '>Abspielen</button> ' +
                                '</div> ' +
                                '</div> ' +
                                '</div>';
                            count++;
                        });
                    }
                    if (count === 0) {
                        $results.html("No videos found");
                    } else {
                        $results.html(html);
                    }
                });
            });
        });

        $(document).keypress(function (e) {
            if (e.which === 13 && $('#settingsModel').is(':visible')) {
                document.getElementById('settingsForm').submit()
            }
        });

        var time = '{{$bot->api->uptime()}}';
        var uptime = new Date().getTime() - time * 1000;
        if (time != 0)
            setInterval(() => {
                $("#uptime").html(format(new Date().getTime() - uptime));
            }, 1000);

        function format(input) {
            totalSeconds = input / 1000;
            minutes = 0;
            hours = 0;
            days = 0;
            while (totalSeconds >= 60) {
                minutes++;
                totalSeconds -= 60;
            }
            while (minutes >= 60) {
                hours++;
                minutes -= 60;
            }
            while (hours >= 24) {
                days++;
                hours -= 24;
            }
            return days + " Tag" + (days === 1 ? "" : "e") + " "
                + hours + " Stunde" + (hours === 1 ? "" : "n") + " "
                + minutes + " Minute" + (minutes === 1 ? "" : "n") + " "
                + totalSeconds.toFixed(0) + " Sekunde" + (totalSeconds.toFixed(0) === 1 ? "" : "n") + " ";
        }

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