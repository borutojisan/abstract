@extends('templates.master')
@section('content')
@include('pages.carousel')
<h4>Tentatif program </h4>
<hr />
<a href="{{asset('img/tentatif.png')}}" target="new"><img src="{{asset('img/tentatif.png')}}" class="logo-iid" width="500" height="600" /></a>
@stop