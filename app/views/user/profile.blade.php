@extends('main')

@section('content')
  <h2>Welcome "{{ Auth::user()->username }}" to the protected page!</h2>
  <p>Your user ID is: {{ Auth::user()->id }}</p>

  <a href="{{route('editProfile')}}" class="btn btn-default">Edit Profile</a>
@stop