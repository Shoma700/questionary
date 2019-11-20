@extends('layouts.base0')
@section('title','アンケート回答のお礼')
@section('content')

<div class="container">
    <div class="row">
    　　<div>
            <h2>貴重なご意見をありがとうございました</h2>
            <h5>下記にクーポンページへのリンクがございます。ぜひご利用ください</h5>
            <div>
            <a href="{{ action('QuestionaryController@next3') }}" role="button">クーポンへ</a>
            </div>
            <div>
            <a href="{{ action('QuestionaryController@next1') }}" role="button">戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection