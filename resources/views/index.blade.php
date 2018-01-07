@extends('layouts.app')

@section('content')
    <div class="row mt-3">
        <div class="col-12 col-md-2 mb-3">
            <div class="card">
                <div class="card-header">
                    分类
                </div>
                
                <ul class="list-group list-group-flush">
                    @foreach($cats as $cat)
                        <li class="list-group-item"><a href="{{route('search.cat',['cat' => $cat->id])}}">{{$cat->name}}</a></li>
                    @endforeach 
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-7 mb-3">
            <div class="card">
                <div class="card-header">
                    最近上传的MIDI
                </div>
                <recent-midi></recent-midi>
            </div>        
        </div>

        <div class="col-12 col-md-3">
            <a role="button" href="{{route('ucp.midi.add')}}" class="btn btn-outline-success btn-lg btn-block text-success mb-3">分享你的MIDI~</a>
            
            <div class="card">
                <div class="card-header">
                    搜索
                </div>
                <div class="card-body">
                    <form method="get" action="{{route('search')}}">
                        <div class="form-group">
                            <input name="keyword" type="text" class="form-control" name="search" placeholder="搜索MIDI">
                        </div>
                        <button type="submit" class="btn btn-primary">搜索</button>
                        
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    通知
                </div>
                <div class="card-body">
                    新网站v3测试版本.
                </div>
            </div>
        </div>
    </div>
@endsection