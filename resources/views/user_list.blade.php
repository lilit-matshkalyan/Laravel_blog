@extends('master')


@section('title')
    users list
@endsection


@section('header')

@endsection


@section('body')
    <div class="container">
        <div class="center-block">
            <table border="1px" class="table table-hover">
                <thead>
                <tr>
                    <th><b>Firstname</b></th>
                    <th><b>Lastname</b></th>
                    <th><b>Username</b></th>
                    <th><b>Email</b></th>
                    <th><b>Password</b></th>
                    <th><b>CRUD</b></th>
                </tr>
                </thead>
            @foreach($users as $user)
                <!--@foreach($user->posts as $item)
                    {{$item->title}}<br><br>
                    @endforeach -->
                    <tbody>
                    <tr>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        <td><center>
                                <a href="users/{{$user->id}}/edit">Edit</a> <br>

                                {!! Form::open(['url'=>"users/$user->id",'method'=>'delete']) !!}

                                <input class="btn btn-danger" type="submit" name="delete" value="Delete">

                                {!! Form::close() !!}
                            </center></td>
                    </tr>
                    </tbody>
                @endforeach
            </table>

            <a href="users/create"><input class="btn btn-success" type="button"  name="register" value="Register"></a>
            <a href="posts"><input class="btn btn-success" type="button"  name="posts" value="View all posts"></a>
        </div>
    </div>
@endsection


@section('footer')

@endsection

@section('footer_examples')

@endsection

