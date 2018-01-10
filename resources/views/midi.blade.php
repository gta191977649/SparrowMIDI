@extends('layouts.app')

@section('content')

    <p class="float-right">共 {{$total}} 条.</p>
    <h1 class="text-primary">MIDI一览</h1>
    
    <hr/>
    
    <div class="row">

        <div class="col-12 col-md-2">
            <div class="card">
                <div class="card-header">
                    分类
                </div>
                
                <ul class="list-group list-group-flush">
                    @foreach($cats as $cat)
                        <li class="list-group-item"><a href="{{route('midi.cat',['cat' => $cat->id])}}">{{$cat->name}}</a></li>
                    @endforeach 
                </ul>
            </div>
        </div>
        <div class="col-12 col-md-10">
        @if($total)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">名称</th>
                    <th scope="col">贡献者</th>
                    <th scope="col">得点</th>
                    <th scope="col">时长</th>
                    <th scope="col">文件大小</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($midis as $midi)
                    <tr>
                    <td scope="row"><a href="{{route('midi.file',['id'=>$midi->id])}}">{{mb_substr($midi->title .' - '.$midi->singer, 0, 30)}}</a></td>
                    <td>{{$midi->user->name}}</td>
                    <td>{!!$midi->rateStar()!!}</td>
                    <td>Time</td>
                    <td>@php echo round(filesize($midi->file)*0.001,1) @endphp KB</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="alert alert-info" role="alert">
            没有找到任何数据哦~
        </div>
        @endif
            <!-- 分页 -->
            {{$midis->links('vendor.pagination.bootstrap-4')}}
        </div>

    </div>
@endsection