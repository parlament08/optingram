@extends('backend.body')

@section('header_title', trans('labels.backend.titles.dashboard'))

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('labels.backend.posts.titles.index')</h3>
                </div>
                <!-- /.box-header -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
