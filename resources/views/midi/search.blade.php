@extends("layouts.app")

@section("content")
    <h1>MIDI搜索: {{$keyword}}</h1>
    <hr/>
    
    <!-- Search -->
    <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title">搜索</h5>
            <form method="get" action="{{route('search')}}">
                <div class="form-group">
                    <input name="keyword" type="text" class="form-control" name="search" placeholder="搜索MIDI">
                </div>
                <button type="submit" class="btn btn-primary">搜索</button>
            
            </form>
        </div>
    </div>
    <p class="text-right">总共:{{$midis->count()}}条数据。</p>
    
    @if(!$midis->count())

    <div class="alert alert-info" role="alert">
        提示: 没有查询到任何有关'{{$keyword}}'的信息。
    </div>
    @endif
   
    @foreach($midis as $midi)
        <h2 class="text-primary"><a href="{{route('midi.file',['id' => $midi->id])}}">{{$midi->title}} - {{$midi->singer}}</a></h2>
        <p>{{ mb_substr($midi->description, 0, 500) }} ...
        <br/>
        <span class="text-success">大小: </span>
        {{$midi->fileSize()}} KB
        <span>
                
            @php 
                $tags = explode(",", $midi->tag);
                $ongens = explode(",", $midi->ongen);
            @endphp
                <span class="text-success">
                    音轨数量: {{ $midi->info()["NumberOfTracks"] }}
                    音源:
                </span>
                
            @foreach($ongens as $ongen)
                <a href="{{route('search.ongen',['ongen' => $ongen])}}">{{$ongen}}</a>
            @endforeach
                <span class="text-success">标签:</span>
            @foreach($tags as $tag)
                <a href="{{route('search.tag',['tag' => $tag])}}">{{$tag}}</a>
            @endforeach
            </span>
        </p>

    @endforeach
    

    
    <!-- 分页 -->
    {{$midis->links()}}

@endsection