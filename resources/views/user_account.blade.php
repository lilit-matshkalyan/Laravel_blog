@extends('master')


@section('title')
    users list
@endsection


@section('header')

@endsection


@section('body')
    <div class="container">
        <div class="center-block">

            {!! Form::open(['url'=>"users/$user->id",'method'=>'delete']) !!}

            <input class="btn btn-danger" type="submit" name="logout" value="Logout" style="float: right">

            {!! Form::close() !!}

            <table border="0px" class="table table-hover">
                <thead>
                <tr>
                    <th colspan="2"><center><h3>Personal data</h3></center></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Firstname</td>
                    <td>{{ Auth::user()->firstname }}</td>
                </tr>
                <tr>
                    <td>Lastname</td>
                    <td>{{ Auth::user()->lastname }}</td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>{{ Auth::user()->username }}</td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>{{ Auth::user()->password }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ Auth::user()->email }}</td>
                </tr>
                </tbody>
                <thead>
                <tr>
                    <td colspan="2">
                            <a href='{{url("users/$user->id/edit")}}'><input class="btn btn-success" type="button" name="edit" value="Edit"></a> <br>
                    </td>
                </tr>
                </thead>
            </table>


            <table border="0px" class="table table-hover">
                <thead>
                <tr>
                    <th colspan="5"><center><h3>Personal posts</h3></center></th>
                </tr>
                <tr>
                    <th><b>Title</b></th>
                    <th><b>Body</b></th>
                    <th><b>Updated at</b></th>
                    <th><b>Created at</b></th>
                    <th><b>CRUD</b></th>
                </tr>
                </thead>
                @foreach($posts as $post)
                    <tbody>
                    <tr>
                        <th>{{$post->title}}</th>
                        <th>{{$post->content}}</th>
                        <th>{{$post->updated_at}}</th>
                        <th>{{$post->created_at}}</th>
                        <th>
                            <a href='{{url("posts/$post->id/edit")}}'>Edit</a> <br>
                            {!! Form::open(['url'=>"posts/$post->id",'method'=>'delete']) !!}
                            <input class="btn btn-danger" type="submit" name="delete" value="Delete">
                            {!! Form::close() !!}
                        </th>
                    </tr>
                    </tbody>
                @endforeach
                <thead>
                <tr>
                    <td><a href='{{url("posts/create")}}'><input class="btn btn-success" type="button"  name="add" value="Add a post"></a></td>
                    <td colspan="7"><a href='{{url("posts")}}'><input class="btn btn-success" type="button"  name="add" value="All posts"></a></td>
                </tr>
                </thead>
            </table>
            </center>






        </div>
    </div>
@endsection


@section('footer')

@endsection

@section('footer_examples')

@endsection

