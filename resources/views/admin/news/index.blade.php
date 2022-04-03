@extends('layouts.admin')
@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container-index">
        <div class="row">
            <h2>ニュース一覧</h2>
        </div>
        <div class="row search_row">
            <div class="col-md-4 width_size">
                <a href="{{ action('Admin\NewsController@add') }}" role="button" class="btn btn-primary button_create">新規作成</a>
            </div>
            <div class="col-md-8 width_size">
                <form action="{{ action('Admin\NewsController@index') }}" method="get">
                    <div class="form-group row title_search_row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary button_search" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $news)
                                <tr>
                                    <th>{{ $news->id }}</th>
                                    <td>{{ str_limit($news->title, 100) }}</td>
                                    <td>{{ str_limit($news->body, 250) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection