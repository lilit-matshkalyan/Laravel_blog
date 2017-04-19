@extends('master')

@section('title')
    :: Lost Password
@endsection

@section('header')

@endsection

@section('body')

    <!-- start: page -->
    <section class="body-sign" >

        <div class="center-sign " >

            <a href="{{url('/')}}" class="logo pull-left">
                {!! Html::image('assets/images/'.$main_info->company_info_logo,'Logo',['class'=>'logo3']) !!}
            </a>

            <div class="panel panel-sign " >
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none">
                        <a href="{!!url('/')!!}" ><i title=" Back " class="btn fa fa-arrow-circle-left" style="color: #fff"></i></a>Lost Password
                    </h2>
                </div>
                <div class="panel-body">
                    @if(isset($msg))
                            {!!$msg!!}
                    @endif
                    {!! Form::open(['id'=>'form']) !!}
                    <div class="form-group mb-lg">
                        <label>Email</label>
                        <div class="input-group input-group-icon">
                            <input placeholder="Please enter your email address" name="email" type="email" class="form-control input-lg" required="required" autofocus />
							<span class="input-group-addon"><span class="icon icon-lg"><i class="fa fa-user"></i></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary hidden-xs">Submit</button>
                            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Submit</button>
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