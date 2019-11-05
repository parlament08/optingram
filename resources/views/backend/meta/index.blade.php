@extends('backend.body')

@section('header_title', trans('labels.backend.metas.titles.main'))
@section('header_description', trans('labels.backend.metas.titles.index'))

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('labels.backend.metas.titles.index')</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! $html->table() !!}
                    <a href="{{ route('admin.meta.create') }}" class="btn btn-success btn-xs">@lang('buttons.create')</a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('scripts')
    {!! $html->scripts() !!}
@endsection