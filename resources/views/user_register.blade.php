@extends('master')


@section('title')
    users register
@endsection


@section('header')
    <style>
        tr {
            width: 1000px;
        }
    </style>
@endsection


@section('body')
    <div class="container">
        <div class="center-block">


            {!! Form::open(['url'=>'users','method'=>'post']) !!}

            <center>
                <table border="1px" class="">
                    <thead>
                    <tr>
                        <th colspan="2"><h1>Root page</h1></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                            <td><label for="username"><h5>Username<br></h5></label></td>
                            <td><input type="text" name="username" id="username" class="form-control" placeholder="Enter First Name" value="{{ old('username') }}"></td>
                        </div>
                    </tr>
                    <tr>
                        <td></td>
                        <td><span class="text-danger"><br>{{ $errors->first('username') }}</span></td>
                    </tr>



                    <tr>
                        <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                            <td><label for="firstname"><h5>Firstname</h5></label></td>
                            <td><input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter First Name" value="{{ old('firstname') }}"></td>
                        </div>
                    </tr>
                    <tr>
                        <td></td>
                        <td><span class="text-danger"><br>{{ $errors->first('firstname') }}</span></td>
                    </tr>



                    <tr>
                        <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
                            <td><h5>Lastname</h5></td>
                            <td><input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter First Name" value="{{ old('lastname') }}"></td>
                        </div>
                    </tr>
                    <tr>
                        <td></td>
                        <td><span class="text-danger"><br>{{ $errors->first('lastname') }}</span></td>
                    </tr>



                    <tr>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <td><h5>Password</h5></td>
                            <td><input type="password" name="password" id="password" class="form-control" placeholder="Enter First Name" value="{{ old('password') }}"></td>
                        </div>
                    </tr>
                    <tr>
                        <td></td>
                        <td><span class="text-danger"><br>{{ $errors->first('password') }}</span></td>
                    </tr>


                    <tr>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <td><h5>Email</h5></td>
                            <td><input type="email" name="email" id="email" class="form-control" placeholder="Enter First Name" value="{{ old('email') }}"></td>
                        </div>
                    </tr>
                    <tr>
                        <td></td>
                        <td><span class="text-danger"><br>{{ $errors->first('email') }}</span></td>
                    </tr>


                    <tr>
                        <td colspan="2">
                            <h3><input class="btn btn-success" type="submit" name="submit" value="Register"></h3>
                            <h5>or</h5>
                            <a href="{{url('auth/login')}}"><input class="btn btn-success" type="button" name="posts" value="Login"></a>
                            if you have an account
                        </td>
                    </tr>
                    </tbody>
                </table>
            </center>
            {!! Form::close() !!}



        </div>
    </div>
@endsection


@section('footer')

@endsection

@section('footer_examples')

@endsection
