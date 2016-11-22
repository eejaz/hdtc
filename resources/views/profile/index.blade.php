@extends('layouts.app')
@section('content')

    @if(Session::has('deleted_user'))

        {{session('deleted_user')}}

    @endif

    <div class="container">

    <h1>User</h1>

    <table class="table table-striped">
        <caption>Optional table caption.</caption>
        <thead>
        <tr>
            <th>#Id</th>
            <th>photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>City</th>
            <th>Gender</th>
            <th>Qualification</th>
            <th>Proficient</th>

        </tr>
        </thead>
        <tbody>
        @if($profiles)
            @foreach($profiles as $profile)
                <tr>
                    <th scope="row">{{$profile->id}}</th>
                    <th><img height="50" src="{{$profile->photo ? $profile->photo->file : 'http://placehold.it/350x150'}}" alt=""></th>


                    {{--<td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>--}}


                    <td><a href="/profile/{{$profile->id}}/edit"> {{$profile->fullname}} </a></td>

                    <td> </td>
                    <td>{{$profile->city->name}}</td>

                    <td>{{$profile->gender == 0 ? 'Mail' : 'Fimail' }}</td>

                    <td>{{$profile->qualification}}</td>
                    <td>{{$profile->proficient}}</td>

                    {{--<td>{{$user->created_at->diffForHumans()}}</td>--}}
                    {{--<td>{{$user->updated_at->diffForHumans()}}</td>--}}
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>

</div>
@endsection