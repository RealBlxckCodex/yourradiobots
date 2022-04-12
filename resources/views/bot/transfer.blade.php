@extends('layouts.app')
@section('content')
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong class="d-block d-sm-inline-block-force">Achtung!</strong> Du kannst nur alle 10 Minuten einen Bot
        transferieren.
    </div><!-- alert -->
    <div class="row row-sm mg-t-20">
        <div class="col-md-8 col-xl-8 ">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Transferieren</h6>

                <p class="mg-b-20 mg-sm-b-30">Transferiere deinen Bot auf einen anderen Standort</p>

                <form action="{{route('bot.transfer.post', [$bot])}}" method="post">
                    @csrf
                    <div class="row pb-4">
                        <label class="col-sm-4 form-control-label">Standort: </label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select id="hostsystem" name="hostsystem_id" class="form-control select2"
                                    data-placeholder="">
                                @foreach (\App\Hostsystem::all()->where('enabled', 1) as $hostsystem)
                                    <option {{$bot->hostsystem_id == $hostsystem->id?'selected':''}} value="{{$hostsystem->id}}">{{$hostsystem->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- row -->

                    <button class="btn btn-info">Transferieren</button>
                </form>

            </div>
        </div><!-- col-4 -->
    </div>

@endsection
@section('breadcrumbs', Breadcrumbs::render('botView', $bot))
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
            $('#hostsystem').select2({
                minimumResultsForSearch: Infinity,
                tokenSeparators: [',', ' ']
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