@extends('layouts.base0')
@section('title','クーポンプレゼント')
@section('content')
<div class="container">
　　<div class="row">
        <div class="offset-2">
        　　<div>
                <h2>クーポン画面</h2>
                <h5>ご利用期間99999</h5>
                <h5>対象商品：ああああああ</h5>
                <h5>特典内容：ああああああ</h5>
        　　</div>  
            <div>
                <h5>★クーポンBCD</h5>
                <p>{!! DNS1D::getBarcodeHTML("1300013501754","EAN13") !!}</p>
            </div>
            <div>
                <a href="{{ action('QuestionaryController@explanation') }}" role="button">アンケートトップへ</a>
            </div>
        　　<div>
                <a href="{{ action('QuestionaryController@next2') }}" role="button">戻る</a>
            </div>

        </div>
    </div>
</div>
@endsection