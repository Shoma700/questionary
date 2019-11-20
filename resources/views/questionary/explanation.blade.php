@extends('layouts.base0')
@section('title','アンケートについて')
@section('content')
<div class="container">
　　<div class="row">
        <div class="offset-2">
        　　<div>
                <h2>アンケートについて</h2>
                <h5>アンケートへご協力ありがとうございます。</h5>
                <h5>さらなるサービス向上のため、ご意見をください</h5>
        　　</div>  
            <div>
                <h5>ご利用店舗、レシート番号を入力して回答へお進みください</h5>
            </div>
            <div>
                <h5>・【任意入力】都道府県プルダウン</h5>
            </div>
            <div>
                <h5>・【必須入力】店舗名プルダウン(上記の都道府県プルダウンと連動して店舗が絞られる)</h5>
        　　</div>
        　　<div>
        　　    <h5>上記必須入力をチェックし、OKなら進む、NGならエラー表示しリダイレクト</h5>
                <a href="{{ action('QuestionaryController@next1') }}" role="button">回答へ進む</a>
            </div>
        </div>
    </div>
</div>
@endsection