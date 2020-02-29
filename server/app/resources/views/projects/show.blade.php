@extends("layouts.app")

@section("links")
<link rel="stylesheet" href="{{asset("css/project.show.css")}}">
@endsection

@section("navbar")
<navbar-auth :user="{{json_encode(Auth::user())}}"></navbar-auth>
@endsection

@section("content")
<div class="d-flex h-100">
    <project-menu :project="{{json_encode($project)}}"></project-menu>
</div>
@endsection

@section("scripts")
<script src="{{asset("js/project.show.js")}}"></script>
@endsection