@extends('layouts.app')

@section('content')
    <!-- Bootstrapの定形コード… -->

    <div class="panel-body">

        <!-- 新タスクフォーム -->
        <form action="{{ url('hash') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}

        <!-- タスク名 -->
            <div class="form-group">
                <div class="col-sm-12" style="padding-bottom: 20px">
                    <label for="name" class="col-sm-3 control-label">メッセージ</label>
                    <div class="col-sm-6">
                        <input type="text" name="message" id="task-name" class="form-control">
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="address" class="col-sm-3 control-label">キー</label>
                    <div class="col-sm-6">
                        <input type="text" name="key" id="ramen-address" class="form-control">
                    </div>
                </div>
            </div>

            <!-- タスク追加ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> タスク追加
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
