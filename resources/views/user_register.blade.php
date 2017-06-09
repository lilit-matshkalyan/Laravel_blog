@extends('master')


@section('title')
    users register
@endsection


@section('header')

@endsection


@section('body')

        {!! Form::open(['url'=>'users','method'=>'post']) !!}
    <table border="1px">

        <tr>
            <td>Username</td>
            <td><input type="text" name="username" id="username"></td>
            <td>Edit | Delete</td>
        </tr>
        <tr>
            <td>Firstname</td>
            <td><input type="text" name="firstname" id="firstname"></td>
            <td>Edit | Delete</td>
        </tr>
        <tr>
            <td>Lastname</td>
            <td><input type="text" name="lastname" id="lastname"></td>
            <td>Edit | Delete</td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" id="password"></td>
            <td>Edit | Delete</td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" id="email"></td>
            <td>Edit | Delete</td>
        </tr>
        <tr>
            <td><input type="submit" name="submit"></td>
        </tr>

    </table>
        {!! Form::close() !!}@endsection


@section('footer')

@endsection

@section('footer_examples')

@endsection
