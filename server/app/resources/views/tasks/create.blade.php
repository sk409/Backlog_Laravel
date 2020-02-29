@extends("layouts.app")

@section("navbar")
<navbar-auth :user="{{json_encode(Auth::user())}}"></navbar-auth>
@endsection

@section("content")
<div ref="project" hidden>{{json_encode($project)}}</div>
<div ref="taskMilestones" hidden>{{json_encode($taskMilestones)}}</div>
<div ref="taskCategories" hidden>{{json_encode($taskCategories)}}</div>
<div ref="taskPriorities" hidden>{{json_encode($taskPriorities)}}</div>
<div ref="taskTypes" hidden>{{json_encode($taskTypes)}}</div>
<div ref="users" hidden>{{json_encode($users)}}</div>
<div class="d-flex h-100">
    <project-menu :project="{{json_encode($project)}}"></project-menu>
    <div class="fill overflow-y-auto pa-5 w-100">
        <div class="title">課題の追加</div>
        <div class="d-flex justify-end mt-3">
            <v-btn color="primary" :loading="loading" v-on:click="add">追加</v-btn>
        </div>
        <v-form>
            <v-select v-model="taskType" :items="taskTypes" label="課題の種類" style="width:128px;">
                <template v-slot:selection="{item}">
                    <span v-text="item.name"></span>
                </template>
                <template v-slot:item="{item}">
                    <span v-text="item.name"></span>
                </template>
            </v-select>
            <v-text-field v-model="subject" label="件名"></v-text-field>
            <div class="white px-3 py-4">
                <div class="d-flex">
                    <v-subheader>詳細</v-subheader>
                    <v-textarea v-model="details"></v-textarea>
                </div>
                <div class="d-flex justify-space-between">
                    <div class="w-45">
                        <div class="d-flex align-center">
                            <v-subheader>優先度</v-subheader>
                            <v-select v-model="taskPriority" :items="taskPriorities">
                                <template v-slot:selection="{item}">
                                    <span v-text="item.name"></span>
                                </template>
                                <template v-slot:item="{item}">
                                    <span v-text="item.name"></span>
                                </template>
                            </v-select>
                        </div>
                        <v-divider></v-divider>
                        <div class="d-flex align-center">
                            <v-subheader>マイルストーン</v-subheader>
                            <v-select v-model="taskMilestone" :items="taskMilestones">
                                <template v-slot:selection="{item}">
                                    <span v-text="item.name"></span>
                                </template>
                                <template v-slot:item="{item}">
                                    <span v-text="item.name"></span>
                                </template>
                            </v-select>
                            <v-tooltip bottom>
                                <template v-slot:activator="{on}">
                                    <v-btn icon small v-on="on" class="grey lighten-3"
                                        v-on:click="dialogTaskMilestone=true">
                                        <v-icon>mdi-plus</v-icon>
                                    </v-btn>
                                </template>
                                <span>マイルストーンを追加します</span>
                            </v-tooltip>
                        </div>
                        <v-divider></v-divider>
                        <div class="d-flex align-center">
                            <v-subheader>開始日</v-subheader>
                            <v-menu>
                                <template v-slot:activator="{on}">
                                    <v-text-field append-icon="mdi-calendar" :value="startOn" v-on="on"></v-text-field>
                                </template>
                                <v-date-picker v-model="startOn" class="w-100"></v-date-picker>
                            </v-menu>
                        </div>
                        <v-divider></v-divider>
                        <div class="d-flex align-center">
                            <v-subheader>予定時間</v-subheader>
                            <v-text-field v-model="scheduledTime" type="number"></v-text-field>
                            <div class="ml-3 caption">時間(hours)</div>
                        </div>
                        <v-divider></v-divider>
                        <div class="d-flex align-center">
                            <v-subheader>状態</v-subheader>
                            <div>未対応</div>
                        </div>
                        <v-divider></v-divider>
                    </div>
                    <div class="w-45">
                        <div class="d-flex align-center">
                            <v-subheader>担当者</v-subheader>
                            <v-select v-model="responsibleUser" :items="users">
                                <template v-slot:selection="{item}">
                                    <span v-text="item.nickname"></span>
                                    <span>@</span>
                                    <span v-text="item.name"></span>
                                </template>
                                <template v-slot:item="{ item }">
                                    <span v-text="item.nickname"></span>
                                    <span>@</span>
                                    <span v-text="item.name"></span>
                                </template>
                            </v-select>
                        </div>
                        <v-divider></v-divider>
                        <div class="d-flex align-center">
                            <v-subheader>カテゴリー</v-subheader>
                            <v-select v-model="taskCategory" :items="taskCategories">
                                <template v-slot:selection="{item}">
                                    <span v-text="item.name"></span>
                                </template>
                                <template v-slot:item="{item}">
                                    <span v-text="item.name"></span>
                                </template>
                            </v-select>
                            <v-tooltip bottom>
                                <template v-slot:activator="{on}">
                                    <v-btn icon small v-on="on" class="grey lighten-3"
                                        v-on:click="dialogTaskCategory=true">
                                        <v-icon>mdi-plus</v-icon>
                                    </v-btn>
                                </template>
                                <span>カテゴリを追加します</span>
                            </v-tooltip>
                        </div>
                        <v-divider></v-divider>
                        <div class="d-flex align-center">
                            <v-subheader>期限日</v-subheader>
                            <v-menu>
                                <template v-slot:activator="{on}">
                                    <v-text-field append-icon="mdi-calendar" :value="dueOn" v-on="on"></v-text-field>
                                </template>
                                <v-date-picker v-model="dueOn" class="w-100"></v-date-picker>
                            </v-menu>
                        </div>
                        <v-divider></v-divider>
                        <div class="d-flex align-center">
                            <v-subheader>実績時間</v-subheader>
                            <v-text-field v-model="actualTime" type="number"></v-text-field>
                            <div class="ml-3 caption">時間(hours)</div>
                        </div>
                        <v-divider></v-divider>
                    </div>
                </div>
            </div>
        </v-form>
        <div class="d-flex justify-end mt-3">
            <v-btn color="primary" :loading="loading" v-on:click="add">追加</v-btn>
        </div>
    </div>
</div>
<v-dialog v-model="dialogTaskCategory">
    <task-category-form-card :project="project" v-on:cancel="dialogTaskCategory=false"
        v-on:created="createdTaskCategory"></task-category-form-card>
</v-dialog>
<v-dialog v-model="dialogTaskMilestone">
    <task-milestone-form-card :project="project" v-on:cancel="dialogTaskMilestone=false"
        v-on:created="createdTaskMilestone">
        </milestone-form-card>
</v-dialog>
<snackbar-view :message="notification" :visible="snackbar"></snackbar-view>
@endsection

@section("scripts")
<script src="{{asset("js/tasks.create.js")}}"></script>
@endsection