@extends('layouts.app')

@section('content')
<v-container>
    <v-card class="pb-3">
        <v-card-title class="primary white--text">Backlogに新規登録</v-card-title>
        <v-card-text class="pt-3">
            <v-form ref="form">
                <v-text-field v-model="name" :rules="nameRules" label="ユーザID"></v-text-field>
                <v-text-field v-model="nickname" :rules="nicknameRules" label="ユーザ名"></v-text-field>
                <v-text-field v-model="email" type="email" :rules="emailRules" label="メールアドレス"></v-text-field>
                <v-text-field v-model="password" autocomplete :rules="passwordRules" type="password" label="パスワード">
                </v-text-field>
                <v-text-field v-model="passwordConfirmation" autocomplete :rules="passwordConfirmationRules"
                    type="password" label="パスワード(確認用)">
                </v-text-field>
            </v-form>
        </v-card-text>
        <v-card-actions>
            <v-btn color="primary" :loading="loading" class="mx-auto" v-on:click="register">登録</v-btn>
        </v-card-actions>
    </v-card>
</v-container>
@endsection

@section("scripts")
<script src="{{asset("js/register.js")}}"></script>
@endsection