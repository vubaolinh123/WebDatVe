@extends('Backend.layout_admin')
@section('conten.admin')
    @livewire('cinema.update', ['id' => $id] )
@endsection
