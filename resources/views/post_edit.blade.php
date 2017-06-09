@extends('master')


@section('title')
    edit post
@endsection


@section('header')

@endsection


@section('body')

    {!! Form::open(['url'=>"posts/$post->id",'method'=>'put']) !!}
    <center>
    <table border="0px">
        <tr>
            <td colspan="2"><center><h3>Edit data</h3><br></center></td>
        </tr>




        <tr>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <td><label for="title"><h5>Title</h5></label></td>
                <td><input type="text" name="title" value="{{$post->title}}" id="title" class="form-control" placeholder="Enter The Title"></td>
            </div>
        </tr>
        <tr>
            <td></td>
            <td><span class="text-danger"><br>{{ $errors->first('title') }}</span></td>
        </tr>



        <tr>
            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <td>Content</td>
            <!--<td><input type="text" name="content" value="{{$post->content}}" id="content" class="form-control" placeholder="Enter The Content"></td>-->
                <td><textarea name="content" cols="40" rows="5" class="form-control" placeholder="Enter The Content">{{$post->content}}</textarea></td>
            </div>

        </tr>
        <tr>
            <td></td>
            <td><span class="text-danger"><br>{{ $errors->first('content') }}</span></td>
        </tr>



        <tr>
            <td colspan="2"><a href="users"><br><input class="btn btn-success" type="submit" name="save" value="Save"></a></td>
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
