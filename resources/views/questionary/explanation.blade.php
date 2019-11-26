@extends('layouts.base0')
@section('title','アンケートについて')
@section('content')
<div class="container">
　　<div class="row">
        <div class="offset-2">
        　　<div>
        　　      @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <h2>アンケートについて</h2>
                <h5>アンケートへご協力ありがとうございます。</h5>
                <h5>さらなるサービス向上のため、ご意見をください</h5>
        　　</div>
            <div>
                <h5>ご利用店舗、レシート番号を入力して回答へお進みください</h5>
            </div>
            <form action="{{ action('QuestionaryController@post1') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <h5>・【任意入力】都道府県プルダウン</h5>
                    @if (count($japan_area) > 0)
                    <select name="n1">
                        @foreach($japan_area as $area => $n1)
                            <option value="{{ $area }}">{{ $n1 }}</option>
                        @endforeach
                    </select>
                    @endif
                </div>
                <div class="form-group">
                    <h5>・【必須入力】店舗名プルダウン(上記の都道府県プルダウンと連動して店舗が絞られる)</h5>
                    @if (count($store) > 0)
                    <select name="n2">
                        @foreach($store as $st => $n2)
                            <option value="{{ $st }}">{{ $n2 }}</option>
                        @endforeach
                    </select>
                    @endif
                </div>
                <div class="form-group">
                    <h5>・【必須入力】レシート番号(6桁手入力)</h5>
                    <p><input type="text" name="n3" rows="100">{{ old('n3') }}</p>
            　　</div>
                <div class="mt-5">
                    <input type="submit" class="btn btn-primary" value="回答へ進む">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection