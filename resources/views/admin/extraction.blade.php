@extends('layouts.base0')
@section('title','アンケート回答抽出画面')
@section('content')
<div class="container">
　　<div class="row">
        <div class="offset-2">
        　　<div>
                <h2>アンケート管理者データ抽出画面</h2>
            </div>
                <h5>テーブル</h5>
        　　<div>
                <h5>ページネーション機能を入れる</h5>
                <h5>CSV出力機能を入れる</h5>
                <h5>↓後でNAVバーに入れ込む</h5>
                
                 <div>
                    <hr color="#c0c0c0">
                    <a href="" role="button">CSV出力</a>
                    <hr color="#c0c0c0">
                </div>               
                
                <div>
                    <a href="{{ action('QuestionaryController@explanation') }}" role="button">アンケートトップ</a>
                </div>
                <div>
                    <a href="{{ action('QuestionaryController@next1') }}" role="button">アンケート質問</a>
                </div>
                <div>
                    <a href="{{ action('QuestionaryController@next2') }}" role="button">お礼画面</a>
                </div>
                <div>
                    <a href="{{ action('QuestionaryController@next3') }}" role="button">クーポン画面</a>
                    <hr color="#c0c0c0">
                    <a href="{{ action('QuestionaryController@index') }}" role="button">戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection