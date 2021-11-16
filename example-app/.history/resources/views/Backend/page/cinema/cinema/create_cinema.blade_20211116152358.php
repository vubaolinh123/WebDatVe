@extends('Backend.layout_admin')
@section('conten.admin')
    @livewire('cinema.create', ['city_id' => 1] )
@endsection
