@extends('layouts.app')

@section('content')
        @if($ramen_array != null)
            <div class="col-12">
                <div class="col-8">ramenテーブルに保存されている情報の件数は</div>
                <div class="col-4">{{ count($ramen_array)}}</div>
            </div>
        @else
            <p class="col-12">ramensテーブルにデータが保存されていません</p>
        @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">店名</th>
                <th scope="col">カテゴリ</th>
                <th scope="col">ラーメン画像URL</th>
                <th scope="col">住所</th>
                <th scope="col">検索クエリ</th>
                <th scope="col">アカウント名</th>
                <th scope="col">ツイッターID</th>
            </tr>
        </thead>
        <tbody>
        @if($ramen_array != null)
            @foreach($ramen_array as $data)
                <tr>
                    <td>{{$data["ramen_id"]}}</td>
                    <td>{{$data["name"]}}</td>
                    <td>{{$data["category"]}}</td>
                    <td>{{$data["image_url"]}}</td>
                    <td>{{$data["address"]}}</td>
                    <td>{{$data["search_query"]}}</td>
                    <td>{{$data["account_name"]}}</td>
                    <td>{{$data["twitter_id"]}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
