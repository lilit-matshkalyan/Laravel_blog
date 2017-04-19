@extends('master')

@section('title')
    {{Help::languages('Log in')}} ::
@endsection

@section('header')
    <script>
        $(document).ready(function() {

            /*	 Form Submit */
            $(document).on('click', '.submit', function (e) {
                e.preventDefault();
                // ajax send values
                var formObj = $('#form');
                var formURL = formObj.attr("action");
                var formType = formObj.attr("method");
                var formData = new FormData(formObj[0]);
                var validated = formObj.valid();
                if ( validated ) {
                    $.ajax({
                        url: formURL, // form action url
                        type: formType, // form submit method get/post
                        dataType: 'json', // request type html/json/xml
                        data: formData,
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $('button').attr('disabled',true);
                        },
                        success: function (data) {
                            $('button').attr('disabled',false);
                            location.href=(data['data']);
                        },
                        error: function(xhr, status, error) {
                            $('button').attr('disabled',false);
                            //  alert message
                            new PNotify({
                                title: '{{Help::languages('Error')}}',
                                text: xhr.responseText,
                                type: 'error',
                                icon: 'fa fa-close',
                                addclass: 'stack-bottomright',
                                stack: stack_bottomright
                            });
                        }
                    });
                }
            });

        });
    </script>
@endsection

@section('body')

    <!-- start: page -->
    <section class="body-sign container appear-animation fadeInDown"    >

        <div class="center-sign " >

            <a href="{{$company->website}}" target="_blank" class="logo pull-left" >
                {!! Html::image('public/img/'.$company->logo,'Logo',['class'=>'logo']) !!}
            </a>

            <div class="panel panel-sign " >
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>  {{Help::languages('Log in')}} </h2>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'auth/login','method'=>'post','class'=>'form-horizontal','id'=>'form','files'=>'true','novalidate'=>'novalidate']) !!}
                        <div class="form-group mb-lg">
                            <label>{{Help::languages('Username')}}</label>
                            <div class="input-group input-group-icon">
                                <input name="username" type="text" class="form-control input-lg" required="required" autofocus />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
                            </div>
                        </div>

                        <div class="form-group mb-lg">
                            <div class="clearfix">
                                <label class="pull-left">{{Help::languages('Password')}}</label>
                            </div>
                            <div class="input-group input-group-icon">
                                <input name="password" type="password" class="form-control input-lg" required="required" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <a href="#" class="">{{Help::languages('Lost Password !')}}</a>
                            </div>
                            <div class="col-md-4 text-right">
                                <button type="submit" class="submit btn btn-primary hidden-xs">{{Help::languages('Log in')}}</button>
                                <button type="submit" class="submit btn btn-primary btn-block btn-lg visible-xs mt-lg">{{Help::languages('Log in')}}</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <p align="center">
                &copy; Copyright {{date('Y')}} by <a href="{{$company->website}}" target="_blank" >{{$company->shortname}}</a>,<br> All Rights Reserved, V 1.0
            </p>

        </div>
    </section>
    <!-- end: page -->

@endsection



@section('footer')
    <!-- Specific Page Vendor -->
    {!!  Html::script('vendor/assets_admin/vendor/jquery-validation/jquery.validate.js') !!}
@endsection

@section('footer_examples')
    {!!  Html::script('vendor/assets_admin/javascripts/forms/examples.validation.js') !!}
@endsection