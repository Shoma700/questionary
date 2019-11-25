@extends('layouts.base0')
@section('title','アンケート回答')
@section('content')

<div class="container">
    <div class="row">
    　　<div>
            <form method="post" href="{{ action('QuestionaryController@post') }}">
                <h2>アンケート回答</h2>
                <h5>すべての質問にお答えください</h5>
                <h5 class="mt-5">【質問１】</h5>
                <h5>満足度を5段階で評価してください</h5>
                <h5><input type="radio" name="q1" value="5">大変満足</h5>
                <h5><input type="radio" name="q1" value="4">満足</h5>
                <h5><input type="radio" name="q1" value="3">通常</h5>
                <h5><input type="radio" name="q1" value="2">不満足</h5>
                <h5><input type="radio" name="q1" value="1">大変不満足</h5>
            　　<h5>-----------------------</h5>
            　　<H5>【質問２】</h5>
            　　<H5>上記回答となった一番の理由を下記より選択してください</h5>
                <h5><input type="radio" name="q2" value="人">スタッフの接客の質</h5>
                <h5><input type="radio" name="q2" value="商品・サービス">商品・サービスの質</h5>
                <h5><input type="radio" name="q2" value="設備">店舗設備の質</h5>
                <h5><input type="radio" name="q2" value="その他">その他</h5>
                <h5>-----------------------</h5>
                <H5 class="mt-5">【質問３】</h5>
            　　<H5>サービスの改善についてアイデアを下さい</h5>
            　　<div class="form-group">
                    <h5><input type="text" name="q3" rows="10">{{ old('q3') }}</h5>
                </div>
            </form>
            <div class="mt-5">
            <a href="{{ action('QuestionaryController@next2') }}" type="submit" class="btn btn-primary" role="button">回答する</a>
            </div>
            <div>
            <a href="{{ action('QuestionaryController@explanation') }}"  class="btn btn-primary" role="button">戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection