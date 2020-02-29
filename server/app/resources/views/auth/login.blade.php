@extends('layouts.app')

@section('content')
<v-container>
    <v-card class="pb-3">
        <v-card-title class="primary white--text">Backlogにログイン</v-card-title>
        <v-card-text class="pt-3">
            <v-form ref="form">
                <v-text-field v-model="email" type="email" :rules="emailRules" label="メールアドレス"></v-text-field>
                <v-text-field v-model="password" autocomplete :rules="passwordRules" type="password" label="パスワード">
                </v-text-field>
            </v-form>
        </v-card-text>
        <v-card-actions>
            <v-btn color="primary" :loading="loading" class="mx-auto" v-on:click="login">ログイン</v-btn>
        </v-card-actions>
    </v-card>
</v-container>
@endsection

@section("scripts")
<script src="{{asset("js/login.js")}}"></script>
@endsection