@extends('layouts.app')
@section('content')

    <div class="row row-sm mg-t-20">
        <div class="col-md-8 col-xl-8 mg-t-20 mg-md-t-0">
            <div class="card pd-20 pd-sm-40">

                <h6 class="card-body-title pb-4">Ticket erstellen</h6>


                <form action="{{route('support.create.post')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                                <input type="text" class="form-control" disabled
                                       value="{{\Carbon\Carbon::now()->format('d.m.y')}}">
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-map-marker"></i></span>
                                <select id="support_category" name="support_category_id" class="form-control">
                                    @foreach (\App\SupportCategory::all() as $supportCategory)
                                        <option {{$supportCategory->id != old('support_category')?: 'selected'}} value="{{$supportCategory->id}}">{{$supportCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-flag"></i></span>
                                <input type="text" class="form-control" disabled value="Offen">
                            </div>
                            <br>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-fire"></i></span>
                                <select id="priority" name="priority" class="form-control">
                                    <option value="high" {{'high' != old('priority')?: 'selected'}}> Hoch</option>
                                    <option value="medium" {{'medium' != old('priority')?: 'selected'}}>Mittel</option>
                                    <option value="low" {{'low' != old('priority')?: 'selected'}}>Niedrig</option>
                                </select>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <label>Betreff:</label><br>
                            <input type="text" class="form-control" value="{{old('title')}}" name="title"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <label>Nachricht:</label><br>
                            <textarea name="description" class="form-control">{{old('description')}}</textarea><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <button class="btn btn-info" type="submit"><i class="fas fa-plus"></i> Erstellen</button>
                        </div>
                    </div>
                </form>

            </div>
        </div><!-- col-4 -->
    </div>

@endsection
@section('breadcrumbs', Breadcrumbs::render('support.create'))
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
            $('#support_category').select2({
                minimumResultsForSearch: -1
            });
            $('#priority').select2({
                minimumResultsForSearch: -1
            });
        });
    </script>
@endsection