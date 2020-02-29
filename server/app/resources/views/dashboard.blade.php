@extends('layouts.app')

@section("links")
<link rel="stylesheet" href="{{asset("css/dashboard.css")}}">
@endsection

@section("navbar")
<navbar-auth :user="{{json_encode(Auth::user())}}"></navbar-auth>
@endsection

@section('content')
<v-container>
    <div>
        <v-subheader>プロジェクト</v-subheader>
        <div class="project-list">
            @foreach($projects as $project)
            <project-list-item :project="{{json_encode($project)}}"></project-list-item>
            @if(!$loop->last)
            <v-divider></v-divider>
            @endif
            @endforeach
        </div>
    </div>
</v-container>
@endsection

@section("scripts")
<script src="{{asset("js/dashboard.js")}}"></script>
@endsection