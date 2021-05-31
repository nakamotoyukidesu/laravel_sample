@extends('layouts.app')

@section('content')
        @if($ramen_array != null)
            <div class="row">
                <div class="col-8">ramenテーブルに保存されている情報の件数は</div>
                <div class="col-4">{{ count($ramen_array)}}</div>
            </div>
        @else
            <p class="col-12">ramensテーブルにデータが保存されていません</p>
        @endif
        <div class="row">
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
{{--                            <td><a href="{!! url("api/ramen/edit/{$data["ramen_id"]}") !!}">編集</a></td>--}}
                            <td><button type="button" class="btn btn-primary" id="ramen_edit_button">編集</button></td>
                            <td><button type="button" class="btn btn-primary">削除</button></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

@endsection
