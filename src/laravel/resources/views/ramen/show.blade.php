@extends('layouts.app')

@section('content')
    <table border="1" style="margin: 0px 10px 0px 10px">
        <tr>
            <th>ツイッターID</th>
            <th>名前</th>
            <th>カテゴリ</th>
            <th>ラーメン画像</th>
            <th>住所</th>
            <th>クエリ</th>
            <th>アカウント名</th>
            <th></th>
        </tr>
        @foreach($ramen_data as  $data)
            <tr>
                <td>{{ $data['twitter_id'] }}</td>
                <td>{{ $data['name'] }}</td>
                <td>{{ $data['category'] }}</td>
                <td>{{ $data['image_url'] }}</td>
                <td>{{ $data['address'] }}</td>
                <td>{{ $data['query'] }}</td>
                <td>{{ $data['account_name'] }}</td>
            </tr>
        @endforeach
    </table>
@endsection
