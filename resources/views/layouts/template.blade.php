<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('parties.entete')


@yield('content')

@include('parties.footer')
@include('parties.pied')
