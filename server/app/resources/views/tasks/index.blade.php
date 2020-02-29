@extends("layouts.app")

@section("links")
<link rel="stylesheet" href="{{asset("css/tasks.index.css")}}">
@endsection

@section("navbar")
<navbar-auth :user="{{json_encode(Auth::user())}}"></navbar-auth>
@endsection

@section("content")
<div class="d-flex h-100">
    <project-menu :project="{{json_encode($project)}}"></project-menu>
    <div class="ml-5 mt-5 overflow-auto">
        <div class="d-flex">
            <span class="subtitle-1">状態:</span>
            <div class="ml-5 d-flex">
                <v-btn rounded>すべて</v-btn>
                <v-btn rounded>未対応</v-btn>
                <v-btn rounded>処理中</v-btn>
                <v-btn rounded>処理済み</v-btn>
                <v-btn rounded>完了</v-btn>
                <v-btn rounded>完了以外</v-btn>
            </div>
        </div>
        <div class="mt-5 d-flex align-center">
            <span>全{{$totalNumber}}件中{{$displayStartAt}}~{{$displayEndAt}}件を表示</span>
            @if($showPreButton)
            <v-btn depressed href="{{route("tasks.index", ["project_id" => $project->id, "page" => $currentPage - 1])}}"
                outlined rounded small class="ml-3">前へ</v-btn>
            <span class="ml-3">...</span>
            @endif
            <div class="ml-2">
                @for($page = $pageStartAt; $page <= $pageEndAt; ++$page) @if(Request::input("page")==$page) <v-btn
                    color="primary" icon outlined small>{{$page}}</v-btn>
                    @else
                    <v-btn href="{{route("tasks.index", ["projectId" => $project->id, "page" => $page])}}" icon outlined
                        small>{{$page}}</v-btn>
                    @endif
                    @endfor
            </div>
            @if($showNextButton)
            <span class="ml-2">...</span>
            <v-btn depressed href="{{route("tasks.index", ["project_id" => $project->id, "page" => $currentPage + 1])}}"
                outlined rounded small class="ml-3">次へ</v-btn>
            @endif
        </div>
        <table class="pt-3 mt-4 task-table">
            <thead>
                <tr>
                    <th>種別</th>
                    <th>件名</th>
                    <th>担当者</th>
                    <th>状態</th>
                    <th>優先度</th>
                    <th>登録日</th>
                    <th>開始日</th>
                    <th>期限日</th>
                    <th>予定時間</th>
                    <th>実績時間</th>
                    <th>更新日</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr class="task-table-data">
                    <td>{{$task->type->name}}</td>
                    <td>{{$task->subject}}</td>
                    <td>{{$task->responsibleUser->name}}</td>
                    <td>{{$task->status->name}}</td>
                    <td>{{$task->priority->name}}</td>
                    <td>{{$task->created_at}}</td>
                    <td>{{$task->start_on}}</td>
                    <td>{{$task->due_on}}</td>
                    <td>{{$task->scheduled_time}}</td>
                    <td>{{$task->actual_time}}</td>
                    <td>{{$task->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section("scripts")
<script src="{{asset("js/tasks.index.js")}}"></script>
@endsection