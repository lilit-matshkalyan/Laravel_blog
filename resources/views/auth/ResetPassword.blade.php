@extends('master')

@section('title')
    :: Reset Password
@endsection

@section('header')
{!!  Html::style('vendor/bootstrap-combined/combined.min.css') !!}
{!!  Html::script('vendor/bootstrap-combined/combined.min.js') !!}
        <script>
            $(document).ready(function() {

                //password
                var options = {
                    onKeyUp: function (evt) {
                        $(evt.target).pwstrength("outputErrorList");
                    }
                };
                $('#password').pwstrength(options);
            });
        </script>

@endsection

@section('body')

    <!-- start: page -->
    <section class="body-sign" >

        <div class="center-sign " >

            <a href="{{url('/')}}" class="logo pull-left">
                {!! Html::image('assets/images/'.$main_info->company_info_logo,'Logo',['class'=>'logo3']) !!}
            </a>

            <div class="panel panel-sign "  >
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none">
                        <a href="{!!url('/')!!}" ><i title=" Back " class="btn fa fa-arrow-circle-left" style="color: #fff"></i></a>Reset Password
                    </h2>
                </div>
                <div class="panel-body">
                    @if(isset($msg))
                        <div class="alert alert-success">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            {!!$msg!!}
                        </div>
                    @elseif(isset($error))
                        <div class="alert alert-danger">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            {!!$error!!}
                        </div>
                    @endif
                    {!! Form::open(['id'=>'form']) !!}
                    <div class="form-group mb-lg">
                        <label>Email</label>
                        <div class="input-group input-group-icon">
                            <input placeholder="Please enter your email address" name="email" type="email" class="form-control input-lg" required="required" autofocus />
							<span class="input-group-addon"><span class="icon icon-lg"><i class="fa fa-user"></i></span></span>
                        </div>
                    </div>
                    <div class="form-group mb-lg">
                        <label>New Password</label>
                        <div class="input-group input-group-icon">
                            <input placeholder="Please enter your new password" name="password" type="password" id="password" class="form-control input-lg" required="required" autofocus />
                            <span class="input-group-addon"><span class="icon icon-lg"><i class="fa fa-lock"></i></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary hidden-xs">Submit</button>
                            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Submit</button>
                            @if(isset($val))
                                <input type="hidden" value="{!! $val !!}" name="token">
                            @endif
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            @include('copyright')

        </div>
    </section>
    <!-- end: page -->

@endsection


@section('footer0')

@endsection