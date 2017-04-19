@extends('master')


@section('title')
    {{Help::languages('Employees')}} ::
@endsection


@section('header')
    <!-- Specific Page Vendor CSS -->
    {!!  Html::style('vendor/DataTables-1.10.12/media/css/jquery.dataTables.css') !!}
    {!!  Html::style('vendor/DataTables-1.10.12/extensions/Buttons/css/buttons.bootstrap.min.css') !!}
    {!!  Html::script('vendor/jQuery-Picture-Cut-master/src/jquery-ui-1.11.4.js') !!}
    {!!  Html::script('vendor/jQuery-Picture-Cut-master/src/jquery-picture-cut.js') !!}
@endsection


@section('body')

    <section role="main" class="content-body">

        <header class="page-header">
            <h2>{{Help::languages('Employees')}}</h2>
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>{{Help::languages('HR')}}</span></li>
                    <li><span>{{Help::languages('Employees')}}</span></li>
                </ol>
                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- start: page -->
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <button class="btn btn-default simple-ajax-refresh" > <i class="fa fa-refresh  btn-link"></i></button>
                    <button class="btn btn-default simple-ajax-modal" href="employees/create" > <i class="fa fa-plus btn-link"></i></button>
                </div>
                <h2 class="panel-title">{{Help::languages('List')}}</h2>
            </header>
            <div class="panel-body"> <div id="container_photo" ></div>

                <table id="advanced-datatable" class="display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{Help::languages('Badge Number')}}</th>
                            <th>{{Help::languages('Full Name')}}</th>
                            <th>{{Help::languages('Job Title')}}</th>
                            <th>{{Help::languages('Mobile')}}</th>
                            <th>{{Help::languages('Email')}}</th>
                            <th>{{Help::languages('Options')}}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>{{Help::languages('Badge Number')}}</th>
                            <th>{{Help::languages('Full Name')}}</th>
                            <th>{{Help::languages('Job Title')}}</th>
                            <th>{{Help::languages('Mobile')}}</th>
                            <th>{{Help::languages('Email')}}</th>
                            <th>{{Help::languages('Options')}}</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </section>
        <!-- end: page -->

    </section>

@endsection


@section('footer')
   <!-- Specific Page Vendor -->
   {!!  Html::script('vendor/DataTables-1.10.12/media/js/jquery.dataTables.js') !!}
   {!!  Html::script('vendor/DataTables-1.10.12/extensions/Buttons/js/dataTables.buttons.min.js') !!}
   {!!  Html::script('vendor/DataTables-1.10.12/extensions/Buttons/js/buttons.bootstrap.min.js') !!}
   {!!  Html::script('vendor/DataTables-1.10.12/jszip/dist/jszip.min.js') !!}
   {!!  Html::script('vendor/DataTables-1.10.12/extensions/Buttons/js/buttons.html5.min.js') !!}
   {!!  Html::script('vendor/DataTables-1.10.12/extensions/Buttons/js/buttons.print.min.js') !!}
   {!!  Html::script('vendor/assets_admin/vendor/jquery-validation/jquery.validate.js') !!}
@endsection

@section('footer_examples')
    {!!  Html::script('vendor/assets_admin/javascripts/forms/examples.validation.js') !!}
    {!!  Html::script('vendor/assets_admin/javascripts/ui-elements/examples.modals'.session('lang').'.js') !!}
    <script>
        $('.HR').addClass('nav-expanded nav-active');
        $( ".HR ul li:nth-child(1)" ).addClass('nav-active');
    </script>
@endsection
