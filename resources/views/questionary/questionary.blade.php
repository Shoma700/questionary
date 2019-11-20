@extends('layouts.base0')
@section('title','アンケート回答')
@section('content')
　　
<div class="container">
    <div class="row">
    　　<div>
            <h2>アンケート回答</h2>
            <h5>すべての質問にお答えください</h5>
            <h5 class="mt-5">【質問１】</h5>
            <h5>満足度を5段階で評価してください</h5>
            <h5>・大変満足</h5>
            <h5>・満足</h5>
            <h5>・通常</h5>
            <h5>・不満足</h5>
            <h5>・大変不満足</h5>
        　　<h5>-----------------------</h5>
        　　<H5>【質問２】</h5>
        　　<H5>上記回答の理由を教えてください</h5>
        　　<div>
                <input type="text">
            </div>
            <h5>-----------------------</h5>
            <H5 class="mt-5">【質問３】</h5>
        　　<H5>サービスの改善についてアイデアを下さい</h5>
        　　<div>
                <input type="text">
            </div>
            <div class="mt-5">
            <a href="{{ action('QuestionaryController@next2') }}" role="button">回答する</a>
            </div>
            <div>
            <a href="{{ action('QuestionaryController@explanation') }}" role="button">戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection