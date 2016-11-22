@extends('layouts.app')
@section('content')


    <div class="container">

    <h1>Edit Profile</h1>

    <div class="row">
        <div class="col-sm-3">
            <img src="{{$profile->photo ? $profile->photo->file : 'http://placehold.it/350x150'}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">

            {{--{!! Form::model($post, ['method' => 'PATCH' , 'action' => ['AdminUsersController@update', $post->id] , 'files' => true]) !!}--}}
            {!! Form::model($profile,['method' => 'PATCH', 'action' => ['ProfileController@update', $profile->id ], 'files' => true ]) !!}

            <div class="form-group">

                {!! Form::label('fullname', 'Full Name') !!}
                {!! Form::text('fullname', $profile->name , ['class' => 'form-control']) !!}

            </div>

            <div class="form-group">

                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', $profile->email, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">

                {!! Form::label('city_id' , 'City') !!}
                {!! Form::select('city_id' , $cities ,null, ['class' => 'form-control']) !!}

            </div>

            <div class="form-group">

                {!! Form::label('gender', 'Gender') !!}
                {!! Form::select('gender', [0 => 'Male', 1 => 'Fimale'],$profile->gender, ['class' => 'form-control']) !!}

            </div>

            <div class="form-group">
                {!! Form::label('qualification', 'Qualification ') !!}
                {!! Form::text('qualification', $profile->qualification , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('proficient', 'Proficient ') !!}
                {!! Form::text('proficient', $profile->proficient , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">

                {!! Form::submit('Update User',['class'=>'btn btn-primary col-sm-6']) !!}

            </div>

            {!! Form::close() !!}

            {{--.........................................................................................--}}
            {{--DELETE FORM--}}
            {{--.........................................................................................--}}

            {!! Form::model($profile,['method' => 'DELETE', 'action' => ['ProfileController@destroy', $profile->id ], 'files' => true ]) !!}

            <div class="form-group">

                {!! Form::submit('Delete User',['class'=>'btn btn-danger col-sm-6']) !!}

            </div>

            {!! Form::close() !!}
        </div>

    </div>
    </div>


    @include('inc.form_error')


@endsection