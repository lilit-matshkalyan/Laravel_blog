@extends('master')


@section('title')
    users register
@endsection


@section('header')

@endsection


@section('body')
    <div class="container">
        <div class="center-block">



            {!! Form::open(['url'=>'auth/login','method'=>'post']) !!}
                <center><table border="0px">
                    <tr>
                        <td colspan="2"><center><h2>Login page</h2></center></td>
                    </tr>
                    <tr>
                            <td><h5>Username<br></h5></td>
                            <td><input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" value="{{ old('username') }}"></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td><span class="text-danger"><br>{{ $errors->first('username') }}</span></td>
                    </tr>



                    <tr>
                        <td><h5>Password</h5></td>
                        <td><input type="password" name="password" id="password" class="form-control" placeholder="Enter Password"></td>
                    </tr>


                    <tr>
                        <td></td>
                        <td>
                            @if($errors->any())
                                <h5 style="color: #a94442;">{{$errors->first()}}</h5>
                            @endif
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2"><input class="btn btn-success" type="submit" name="submit" value="Login"></td>
                    </tr>

                </table></center>
            {!! Form::close() !!}

        </div>
    </div>
@endsection


@section('footer')

@endsection

@section('footer_examples')

@endsection
