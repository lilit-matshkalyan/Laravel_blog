@extends('master')


@section('title')
    add post
@endsection


@section('header')

@endsection


@section('body')
    <div class="container">
        <div class="center-block">
            {!! Form::open(['url'=>"posts",'method'=>'post']) !!} <!-- "users/$user->id",'method'=>'get' -->



            <center>
            <table border="0px">
                <tr>
                    <td colspan="2"><center><h3>Add a post</h3><br></center></td>
                </tr>



                <tr>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <td>Title</td>
                        <td><h5><input type="text" name="title" id="title" class="form-control" placeholder="Enter The Title" value="{{ old('title') }}"></h5></td>
                    </div>
                </tr>
                <tr>
                    <td></td>
                    <td><span class="text-danger"><br>{{ $errors->first('title') }}</span></td>
                </tr>



                <tr>
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                        <td>Content</td>
                        <td><h5><textarea name="content" cols="40" rows="5" class="form-control" placeholder="Enter The Content">{!! old('content') !!} </textarea></h5></td>
                    </div>
                    <!--<input type="text" name="content" id="content">-->
                </tr>
                <tr>
                    <td></td>
                    <td><span class="text-danger"><br>{{ $errors->first('content') }}</span></td>
                </tr>



                <tr>
                    <td colspan="2"><h5><input class="btn btn-success" type="submit" name="submit" value="Add"></h5></td>
                </tr>
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
