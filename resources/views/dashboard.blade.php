@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('/'))
@section('content')
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 pd-sm-25">
                <div class="d-flex align-items-center">
                    <div class="mg-l-15">
                        <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-gray-600 mg-b-8"><i
                                    class="fa fa-support"></i> Supporttickets</p>
                        <h3 class="tx-bold tx-lato tx-inverse mg-b-0">
                            0
                        </h3>
                    </div>
                </div>
            </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 pd-sm-25">
                <div class="d-flex align-items-center">
                    <div class="mg-l-15">
                        <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-gray-600 mg-b-8"><i
                                    class="fas fa-robot"></i>

                            Bots</p>
                        <h3 class="tx-bold tx-lato tx-inverse mg-b-0">
                            {{\App\Bot::all()->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->count()}}
                        </h3>
                    </div>
                </div>
            </div><!-- card -->
        </div><!-- col-3 -->

    </div>

    <div class="row row-sm pt-5">
        <div class="col-md-6 col-xl-4 mg-t-20 mg-md-t-0">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Sessions</h6>
                <div class="card-header bg-transparent pd-20 bd-b bd-gray-200">
                </div><!-- card-header -->
                <table class="table table-white table-responsive mg-b-0 tx-12">
                    <thead>
                    <tr class="tx-10">
                        <th class="pd-y-5">IP</th>
                        <th class="pd-y-5">User Agent</th>
                        <th class="pd-y-5">Datum</th>
                        <th class="pd-y-5">Aktionen</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach (\App\Session::all()->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->take(5) as $session)
                        <tr>
                            <td>{{$session->ip_address}}</td>
                            <td>
                                {{explode(' ', $session->user_agent)[0]}}
                            </td>
                            <td class="tx-12">
                                {{date("H:i:s d.m.Y", $session->last_activity)}}
                            </td>
                            <td>
                                <button class="btn btn-danger"
                                        onclick="window.location.href = '{{route('session.delete', [Session::getId()])}}'">
                                    <i class="fa fa-remove"></i> Beenden
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--                <div class="card-footer tx-12 pd-y-15 bg-transparent bd-t bd-gray-200">--}}
                {{--                    <a href=""><i class="fa fa-angle-down mg-r-5"></i>View All Transaction History</a>--}}
                {{--                </div><!-- card-footer -->--}}
            </div>
        </div><!-- col-4 -->
        <div class="col-md-6 col-xl-4 mg-t-20 mg-md-t-0">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">News</h6>
                <div class="card-header bg-transparent pd-20 bd-b bd-gray-200">
                </div><!-- card-header -->
                @if(\App\News::all()->count() > 0)
                    <table class="table table-white table-responsive mg-b-0 tx-12">
                        <thead>
                        <tr class="tx-10">
                            <th class="pd-y-5">Title</th>
                            <th class="pd-y-5">Aktionen</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach (\App\News::all() as $news)
                            <tr>
                                <td>{{$news->title}}</td>
                                <td>
                                    <button class="btn btn-outline-primary" data-toggle="modal"
                                            data-target="#editUser{{$news->id}}">
                                        <i class="fa fa-newspaper-o"></i> Anschauen
                                    </button>
                                </td>
                            </tr>

                            <div id="editUser{{$news->id}}" class="modal fade" style="display: none;"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content tx-size-sm">
                                        <div class="modal-header pd-x-20">
                                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">{{$news->title}}</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body pd-20 pr-md-5 pl-md-5">
                                            {!! $news->description !!}
                                        </div><!-- modal-body -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary pd-x-20"
                                                    data-dismiss="modal">
                                                Schließen
                                            </button>
                                        </div>
                                    </div>
                                </div><!-- modal-dialog -->
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="d-flex align-items-center justify-content-start">
                            <i class="icon ion-ios-information alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                            <span><strong>Info!</strong> Zurzeit gibt es keine News</span>
                        </div><!-- d-flex -->
                    </div>
                @endif
                {{--                <div class="card-footer tx-12 pd-y-15 bg-transparent bd-t bd-gray-200">--}}
                {{--                    <a href=""><i class="fa fa-angle-down mg-r-5"></i>View All Transaction History</a>--}}
                {{--                </div><!-- card-footer -->--}}
            </div>
        </div><!-- col-4 -->
    </div>



@endsection
