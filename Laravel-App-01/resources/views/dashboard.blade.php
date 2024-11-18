@extends('layouts.master')

@section('profile')
  <!-- Passing the user data to the component -->
  <x-navBar :data="$user">
    <!-- Passing content to the para_child slot -->
    <x-slot name="para_child">
      <p>A paragraph child component</p>
    </x-slot>
  </x-navBar>
@endsection
