@extends('master')


@section('title')
    users list
@endsection


@section('header')

@endsection


@section('body')
    <table border="1px">
        <tr>
            <td><b>Post id</b></td>
            <td><b>Author id</b></td>
            <td><b>Title</b></td>
            <td><b>Body</b></td>
            <td><b>Updated at</b></td>
            <td><b>Created at</b></td>
        </tr>
    @foreach($users as $user)
        <!--@foreach($user->posts as $item)
            {{$item->title}}<br><br>
            @endforeach -->
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->author_id}}</td>
                <td>{{$user->title}}</td>
                <td>{{$user->content}}</td>
                <td>{{$user->updated_at}}</td>
                <td>{{$user->created_at}}</td>
                <!--<td><center>
                        <a href="users/{{$user->id}}/edit">Edit</a> <br>

                        {!! Form::open(['url'=>"users/$user->id",'method'=>'delete']) !!}

                        <input type="submit" name="delete" value="Delete">

                        {!! Form::close() !!}
                </center></td>-->

            </tr>
        @endforeach
    </table>

    <!--<a href="users/create"><input type="button"  name="register" value="Register"></a>-->

@endsection


@section('footer')

@endsection

@section('footer_examples')

@endsection

