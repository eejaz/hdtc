@extends('layouts.app')

@section('content')

    <div class="container">

    {!! Form::open(['method' => 'POST', 'action' => 'ProfileController@store', 'files' => true ]) !!}

    <div class="form-group">

        {!! Form::label('fullname', 'Full Name') !!}
        {!! Form::text('fullname', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city_id' , 'City') !!}
        {!! Form::select('city_id' ,['' => 'Choose Options'] + $cities ,null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('gender', 'Gender') !!}
        {!! Form::select('gender', [0 => 'Male', 1 => 'Fimale'],0, ['class' => 'form-control']) !!}
    </div>

        <div class="form-group">

            {!! Form::label('qualification', 'Qualification') !!}
            {!! Form::text('qualification', '', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">

            {!! Form::label('proficient', 'Proficient') !!}
            {!! Form::text('proficient', '', ['class' => 'form-control']) !!}
        </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Profile Photo') !!}
        {!! Form::file('photo_id',null,['class' => 'form-control'])!!}
    </div>

    <div class="form-group">

        {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}

    </div>



    {!! Form::close() !!}


    </div>


    @include('inc.form_error')

@endsection

