@extends('layouts.app')
@section('content')

    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 pd-sm-25">
                <div class="d-flex align-items-center">
                    <div class="mg-l-15">
                        <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-gray-600 mg-b-8"><i
                                    class="fas fa-robot"></i> Bots</p>
                        <h3 class="tx-bold tx-lato tx-inverse mg-b-0">
                            {{\App\Bot::all()->count()}}
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
                                    class="fas fa-user"></i>

                            User</p>
                        <h3 class="tx-bold tx-lato tx-inverse mg-b-0">
                            {{\App\User::all()->count()}}
                        </h3>
                    </div>
                </div>
            </div><!-- card -->
        </div><!-- col-3 -->

    </div>

    <div class="row row-sm mg-t-20">
        <div class="col-md-8 col-xl-8">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title">Browser</h6>
                <span id="browser"></span>
            </div>
        </div>
    </div>

@endsection
@section('breadcrumbs', Breadcrumbs::render('admin'))
@section('style')
    <link href="{{asset('assets/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/starlight.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/morris.js/morris.css')}}" rel="stylesheet">
@endsection
@section('script')
    <script src="{{asset('assets/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('assets/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('assets/lib/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/lib/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/lib/morris.js/morris.js')}}"></script>
    <script src="{{asset('assets/js/ua-parser.min.js')}}"></script>
    {!! "<script>var data = ".json_encode(\App\Session::all(["user_agent"]))."; </script>" !!}
    <script>

        console.log(data);

        var donutData = [];

        data.forEach((agent) => {
            var browser = new UAParser(agent.user_agent).getBrowser();

            var filter = donutData.filter(value => value.label == browser.name);
            if (filter == 0) {
                donutData.push({
                    label: browser.name,
                    value: 1
                });
            } else {
                donutData.filter(value => value => value.label == browser.name)[0].value++;
            }
        });
        new Morris.Donut({
            element: 'browser',
            data: donutData,
            colors: ['#3D449C', '#268FB2', '#74DE00'],
            resize: true
        });
    </script>
@endsection