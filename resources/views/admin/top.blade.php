@extends('layouts.base0')
@section('title','アンケート管理者画面')
@section('content')
<div class="container">
　　<div class="row">
        <div class="offset-2">
        　　<div>
                <h2>アンケート管理者画面</h2>
            </div>
            <div>
                <h5>テーブル1</h5>
                <table>
                    <thead>
                        <tr>
                            <th width="20%">都道府県CD</th>
                            <th width="15%">店舗CD</th>
                            <th width="30%">レシートNO</th>
                        </tr>
                        @if ($e_lists != NULL)
                            @foreach ($e_lists as $e)
                            <tr>
                                <td>{{ $e->n1 }}</td>
                                <td>{{ $e->n2 }}</td>
                                <td>{{ $e->n3 }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </thead>
                </table>
                {{ $e_lists->links() }}
                <hr color="#c0c0c0">
                <h5>テーブル2</h5>
                <table>
                    <thead class="theaed-default">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="10%">満足度</th>
                            <th width="20%">満足度の原因</th>
                            <th width="40%">コメント</th>
                        </tr>
                        @if ($lists != NULL)
                            @foreach ($lists as $i)
                                <tr>
                                    <td>{{ $i->id }}</td>
                                    <td>{{ $i->q1 }}</td>
                                    <td>{{ $i->q2 }}</td>
                                    <td>{{ $i->q3 }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </thead>
                </table>
                {{ $lists->links() }}
                <hr color="#c0c0c0">
                <h5>テーブル3(1+2)</h5>
                
                <div class="col-md-8">
                    <form action="{{ action('QuestionaryController@index') }}" method="get">
                        <div class="form-group row">
                            <label class="col-md-2"></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="cond_name" value={{ $cond_name }}>
                            </div>
                            <div class="col-md-2">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
                
                <table>
                    <thead class="theaed-default">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="10%">都道府県CD</th>
                            <th width="10%">店舗CD</th>
                            <th width="15%">レシートNO</th>
                            <th width="10%">満足度</th>
                            <th width="20%">満足度の原因</th>
                            <th width="40%">コメント</th>
                        </tr>
                        @if ($all_lists != NULL)
                            @foreach ($all_lists as $al)
                                <tr>
                                    <td>{{ $al->id }}</td>
                                    <td>{{ $al->n1 }}</td>
                                    <td>{{ $al->n2 }}</td>
                                    <td>{{ $al->n3 }}</td>
                                    <td>{{ $al->questionary->q1 }}</td>
                                    <td>{{ $al->questionary->q2 }}</td>
                                    <td>{{ $al->questionary->q3 }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </thead>
                </table>
            </div>
        　　<div>
                <h5>ページネーション機能を入れる</h5>
                <h5>CSV出力機能を入れる</h5>
                <h5>↓後でNAVバーに入れ込む</h5>
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
                    <a href="{{ action('QuestionaryController@extraction') }}" role="button">分析・出力画面へ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection