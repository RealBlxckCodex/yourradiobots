@extends('layouts.app')
@section('content')
    <div class="row row-sm mg-t-20">
        <div class="col-md-8 col-xl-8">
            <div class="card pd-20 pd-sm-40">
                <div class="mesgs">
                    <div class="msg_history">
                        <div class="outgoing_msg">
                            <div class="sent_msg">
                                <p>{{$support->description}}</p>
                                <span class="time_date">{{$support->created_at}}</span></div>
                        </div>
                        @foreach (\App\SupportAnswer::all()->where('support_id', $support->id) as $answer)
                            @if($answer->user_id == $support->creator_id)
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>{{$answer->description}}</p>
                                        <span class="time_date">{{$answer->created_at}}</span></div>
                                </div>
                            @else
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"><img
                                                src="https://ptetutorials.com/images/user-profile.png"
                                                alt="sunil"></div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>{{$answer->description}}</p>
                                            <span class="time_date">{{$answer->created_at}}</span></div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" placeholder="Type a message">
                            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o"
                                                                          aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-4">
            <div class="card pd-20 pd-sm-40">
                <dl class="row">

                    <dt class="col-sm-3 tx-inverse">Title</dt>
                    <dd class="col-sm-9">{{$support->title}}</dd>


                    <dt class="col-sm-3 tx-inverse">Ersteller</dt>
                    <dd class="col-sm-9">{{\App\User::all()->where('id', $support->creator_id)->first()->name}}</dd>

                    <dt class="col-sm-3 tx-inverse">Mitarbeiter</dt>
                    <dd class="col-sm-9">{{$support->editor_id !=null?\App\User::all()->where('id', $support->editor_id)->first()->name:"Niemanden"}}</dd>

                    <dt class="col-sm-3 tx-inverse">Erstelldatum</dt>
                    <dd class="col-sm-9">{{$support->created_at}}</dd>

                    <dt class="col-sm-3 tx-inverse">Priorität</dt>
                    <dd class="col-sm-9">{{$support->getPriority()}}</dd>

                    <dt class="col-sm-3 tx-inverse">Status</dt>
                    <dd class="col-sm-9">{{$support->getStatus()}}</dd>
                </dl>
            </div>
        </div>
    </div>
@endsection
@section('breadcrumbs', Breadcrumbs::render('support.create'))
@section('style')
    <link href="{{asset('assets/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/starlight.css')}}" rel="stylesheet">
    <style>
        .container {
            max-width: 1170px;
            margin: auto;
        }

        img {
            max-width: 100%;
        }

        .inbox_people {
            background: #f8f8f8 none repeat scroll 0 0;
            float: left;
            overflow: hidden;
            width: 40%;
            border-right: 1px solid #c4c4c4;
        }

        .inbox_msg {
            border: 1px solid #c4c4c4;
            clear: both;
            overflow: hidden;
        }

        .top_spac {
            margin: 20px 0 0;
        }


        .recent_heading {
            float: left;
            width: 40%;
        }

        .srch_bar {
            display: inline-block;
            text-align: right;
            width: 60%;
        }

        .headind_srch {
            padding: 10px 29px 10px 20px;
            overflow: hidden;
            border-bottom: 1px solid #c4c4c4;
        }

        .recent_heading h4 {
            color: #0866C6;
            font-size: 21px;
            margin: auto;
        }

        .srch_bar input {
            border: 1px solid #cdcdcd;
            border-width: 0 0 1px 0;
            width: 80%;
            padding: 2px 0 4px 6px;
            background: none;
        }

        .srch_bar .input-group-addon button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            padding: 0;
            color: #707070;
            font-size: 18px;
        }

        .srch_bar .input-group-addon {
            margin: 0 0 0 -27px;
        }

        .chat_ib h5 {
            font-size: 15px;
            color: #464646;
            margin: 0 0 8px 0;
        }

        .chat_ib h5 span {
            font-size: 13px;
            float: right;
        }

        .chat_ib p {
            font-size: 14px;
            color: #989898;
            margin: auto
        }

        .chat_img {
            float: left;
            width: 11%;
        }

        .chat_ib {
            float: left;
            padding: 0 0 0 15px;
            width: 88%;
        }

        .chat_people {
            overflow: hidden;
            clear: both;
        }

        .chat_list {
            border-bottom: 1px solid #c4c4c4;
            margin: 0;
            padding: 18px 16px 10px;
        }

        .inbox_chat {
            height: 550px;
            overflow-y: scroll;
        }

        .active_chat {
            background: #ebebeb;
        }

        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }

        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }

        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 3px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }

        .received_withd_msg {
            width: 57%;
        }

        .mesgs {
            float: left;
            padding: 30px 15px 0 25px;
        }

        .sent_msg p {
            background: #0866C6 none repeat scroll 0 0;
            border-radius: 3px;
            font-size: 14px;
            margin: 0;
            color: #fff;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .outgoing_msg {
            overflow: hidden;
            margin: 26px 0 26px;
        }

        .sent_msg {
            float: right;
            width: 46%;
        }

        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }

        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
        }

        .msg_send_btn {
            background: #0866C6 none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            top: 11px;
            width: 33px;
        }

        .messaging {
            padding: 0 0 50px 0;
        }

        .msg_history {
            height: 516px;
            overflow-y: auto;
        }
    </style>
@endsection
@section('script')
    <script src="{{asset('assets/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('assets/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('assets/lib/select2/js/select2.min.js')}}"></script>

    <script>
        $(document).ready(function () {

        });
    </script>
@endsection