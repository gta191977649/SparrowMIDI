@extends("layouts.app")

@section('content')
    <h1>{{$midi->title}} - {{$midi->singer}}</h1>
    <hr/>
    <div class="row">
        <div class="col-12 col-md-3 mb-3">
            <div class="card">
            <div class="card-header">
                文件信息
            </div>
            <div class="card-body">
                <table  class="table table-sm">
                    <tbody>
                        <tr>
                            <td>曲名:</td>
                            <td>{{$midi->title}}</td>
                        </tr>
                        <tr>
                            <td>艺术家:</td>
                            <td><a href="{{route('search.singer',['singer'=>$midi->singer])}}">{{$midi->singer}}</a></td>
                        </tr>
                        <tr>
                            <td>流派分类:</td>
                            <td>{{$midi->cat->name}}</td>
                        </tr>
                        <tr>
                            <td>上传时间:</td>
                            <td>{{$midi->created_at}}</td>
                        </tr>
                        <tr>
                            <td>大小:</td>
                            <td>@php echo round(filesize($midi->file)*0.001,1) @endphp KB</td>
                        </tr>
                        <tr>
                            <td>得点:</td>
                            <td>{!! $midi->rateStar() !!}</td>
                        </tr>
                  </tbody>
                </table>
            </div>
            </div>
        </div>

        <div class="col-12 col-md-9">
            
        <div class="card mb-3">
            
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#midi" role="tab" data-toggle="tab">MIDI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#mp3" role="tab" data-toggle="tab">MIDI-HQ</a>
                    </li>
                    
                </ul>          
                    
            </div>
      
        <div class="card-body">
            <div class="tab-content">
                <!-- MIDI -->
                <div role="tabpanel" class="tab-pane active" id="midi">
                <!--[if IE]>
                <object
                classid="CLSID:22D6f312-B0F6-11D0-94AB-0080C74C7E95" 
                codebase="http://www.microsoft.com/ntserver/netshow/download/en/nsmp2inf.cab#Version=5,1,51,415" 
                type="audio/midi" width="100%" height="100%" id="wm_player" class="h2_player" >
                <param name="FileName" value="/midi/file/38338.mid" />
                <![endif]-->
                <!--[if !IE]>-->
                <object type="video/x-ms-asf-plugin" data="{{URL::to('/')}}/{{$midi->file}}" width="100%" height="80px" id="wm_player" class="h2_player" >
                    <!--<![endif]-->
                    <param name="AutoStart" value="true" />
                    <param name="Loop" value="true" />
                    <param name="ShowControls" value="true" />
                    Get Windows Media Player (Plugin)!
                </object>	
                <hr/>
                <a class="btn btn-primary float-right" role="button" href="{{route('midi.file.download',['id' => $midi->id] )}}" >下载</a>
                <!-- MIDI文件信息 -->
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

                </div>
                <div role="tabpanel" class="tab-pane" id="mp3">
                    @if($midi->hq)
                    <audio controls style="width: 100%;">
                        <source src="{{$midi->hq->url}}" type="audio/mpeg">
                    [ Your browser does not support the audio element. ]
                    </audio>
                    @else
                    <h3 class="text-center text-info">没有找到关于的MIDI HQ预览文件!</h3>
                    @endif

                </div>
              
            </div>  
     
            </div>
        </div>
        <!-- 音轨 -->
        <div class="card mb-3">
            <h5 class="card-header">音轨分析</h5>
            <div class="card-body">
                <div id="midi-track" class="collapse">
                    <midi-track midi="{{$midi->id}}"></midi-track>
                </div>
                <!-- 展开/收起控制 -->
                <p class="text-center">
                    <a href="#" data-toggle="collapse" data-target="#midi-track">展开/收起</a>
                </p>
                
            </div>
        </div>  
        <!-- 简介 -->
        <div class="card mb-3">
            <h5 class="card-header">简介/歌词</h5>
            <div class="card-body">
                {!!$midi->description!!}
            </div>
        </div>  
   

        </div>
        
    </div>
@endsection