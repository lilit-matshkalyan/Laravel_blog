@extends('master')


@section('title')
    posts list
@endsection


@section('header')

@endsection


@section('body')
    <div class="container">
        <div class="center-block">
            <!-- <h3 style="float: right">To add posts, please <a href="{{url('auth/login')}}"><input class="btn btn-success" type="button" name="posts" value="Login"></a> or scroll down</h3> -->
            <table border="0px" class="table table-hover">
                <thead>
                    <tr>
                        <th><b>Author id</b></th>
                        <th><b>Title</b></th>
                        <th><b>Body</b></th>
                        <th><b>Updated at</b></th>
                        <th><b>Created at</b></th>
                    </tr>
                </thead>
                @foreach($posts as $post)
                    <tbody>
                        <tr>
                            <th>{{$post->author_id}}</th>
                            <th>{{$post->title}}</th>
                            <th>{{$post->content}}</th>
                            <th>{{$post->updated_at}}</th>
                            <th>{{$post->created_at}}</th>
                        </tr>
                    </tbody>
                @endforeach
                <thead>
                    <tr>
                        <td colspan="8"><a href='{{url("posts/create")}}'><input class="btn btn-success" type="button"  name="add" value="Add a post"></a></td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!--<a href="users/create"><input type="button"  name="register" value="Register"></a>-->

@endsection


@section('footer')

@endsection

@section('footer_examples')

@endsection

