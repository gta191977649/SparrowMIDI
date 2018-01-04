@extends('layouts.app')

@section('content')
    <div class="row mt-3">
        <div class="col-2">
            <div class="card">
                <div class="card-header">
                    分类
                </div>
                
                <ul>
                    @foreach($cats as $cat)
                        <li>{{$cat->name}}</li>
                    @endforeach 
                </ul>
            </div>
        </div>
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    最近上传的MIDI
                </div>
                <div class="card-body">
                    <recent-midi></recent-midi>
                </div>
            </div>

        </div>
        <div class="col-3">
            <a role="button" class="btn btn-outline-success btn-lg btn-block text-success mb-3">有新的 MIDI 作品？快来上传哇~~</a>
            
            <div class="card">
                <div class="card-header">
                    搜索
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" name="search" placeholder="Search anything you want">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                        
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