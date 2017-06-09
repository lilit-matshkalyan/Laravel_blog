@extends('master')


@section('title')
    edit user
@endsection


@section('header')

@endsection


@section('body')

    {!! Form::open(['url'=>"users/$user->id",'method'=>'put']) !!}
    <center>
        <table border="0px">
            <tr>
                <td colspan="2"><center><h3>Edit data</h3><br></center></td>
            </tr>
            <tr>
                <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                    <td>Firstname</td>
                    <td><input type="text" name="firstname" value="{{$user->firstname}}" id="firstname" class="form-control" placeholder="Enter Firstname"></td>
                </div>
            </tr>
            <tr>
                <td></td>
                <td><span class="text-danger"><br>{{ $errors->first('firstname') }}</span></td>
            </tr>



            <tr>
                <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
                    <td>Lastname</td>
                    <td><input type="text" name="lastname" value="{{$user->lastname}}" id="lastname" class="form-control" placeholder="Enter Lastname"></td>
                </div>
            </tr>
            <tr>
                <td></td>
                <td><span class="text-danger"><br>{{ $errors->first('lastname') }}</span></td>
            </tr>



            <tr>
                <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                    <td>Username</td>
                    <td><input type="text" name="username" value="{{$user->username}}" id="username" class="form-control" placeholder="Enter Username"></td>
                </div>
            </tr>
            <tr>
                <td></td>
                <td><span class="text-danger"><br>{{ $errors->first('username') }}</span></td>
            </tr>



            <tr>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <td>Email</td>
                    <td><input type="email" name="email" value="{{$user->email}}" id="email" class="form-control" placeholder="Enter Email"></td>
                </div>
            </tr>
            <tr>
                <td></td>
                <td><span class="text-danger"><br>{{ $errors->first('email') }}</span></td>
            </tr>



            <tr>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <td>Password</td>
                    <td><input type="password" name="password" value="{{$user->password}}" id="password" class="form-control" placeholder="Enter Password"></td>
                </div>
            </tr>
            <tr>
                <td></td>
                <td><span class="text-danger"><br>{{ $errors->first('password') }}</span></td>
            </tr>



            <tr>
                <td colspan="2"><a href='{{url("users/$user->id")}}'><br><input class="btn btn-success" type="submit" name="save" value="Save"></a></td>
            </tr>

        </table>
    </center>
    {!! Form::close() !!}
    <!--<tr><a href="users"><input type="button" name="save" value="Save"></a></tr>-->


@endsection


@section('footer')

@endsection

@section('footer_examples')

@endsection