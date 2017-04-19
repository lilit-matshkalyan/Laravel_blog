@extends('master')


@section('title')
    {{Help::languages('Jobs')}} ::
@endsection


@section('header')
    <!-- Specific Page Vendor CSS -->
    {!!  Html::style('vendor/DataTables-1.10.12/media/css/jquery.dataTables.css') !!}
@endsection


@section('body')

    <section role="main" class="content-body">

        <header class="page-header">
            <h2>{{Help::languages('Jobs')}}</h2>
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>{{Help::languages('HR')}}</span></li>
                    <li><span>{{Help::languages('Jobs')}}</span></li>
                </ol>
                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- start: page -->
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <button class="btn btn-default simple-ajax-refresh" > <i class="fa fa-refresh  btn-link"></i></button>
                    <button class="btn btn-default simple-ajax-modal" href="jobs/create" > <i class="fa fa-plus btn-link"></i></button>
                </div>
                <h2 class="panel-title">{{Help::languages('List')}}</h2>
            </header>
            <div class="panel-body">

                <table id="basic-datatable" class="display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{Help::languages('Code')}}</th>
                            <th>{{Help::languages('Name')}}</th>
                            <th>{{Help::languages('Description')}}</th>
                            <th>{{Help::languages('Options')}}</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </section>
        <!-- end: page -->

    </section>



@endsection


@section('footer')
   <!-- Specific Page Vendor -->
   {!!  Html::script('vendor/DataTables-1.10.12/media/js/jquery.dataTables.js') !!}
   {!!  Html::script('vendor/assets_admin/vendor/jquery-validation/jquery.validate.js') !!}
@endsection

@section('footer_examples')
    {!!  Html::script('vendor/assets_admin/javascripts/forms/examples.validation.js') !!}
    {!!  Html::script('vendor/assets_admin/javascripts/ui-elements/examples.modals'.session('lang').'.js') !!}
    <script>
        $('.HR').addClass('nav-expanded nav-active');
        $( ".HR ul li:nth-child(2)" ).addClass('nav-active');
    </script>
@endsection
