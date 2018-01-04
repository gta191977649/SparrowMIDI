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
                <table  class="table">
                    <tbody>
                        <tr>
                            <td>曲名:</td>
                            <td>{{$midi->title}}</td>
                        </tr>
                        <tr>
                            <td>艺术家:</td>
                            <td>{{$midi->singer}}</td>
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
                  </tbody>
                </table>
            </div>
            </div>
        </div>

        <div class="col-12 col-md-9">
            
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">MIDI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">mp3</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
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
                <a class="btn btn-primary float-right" role="button" href="{{URL::to('/')}}/{{$midi->file}}" >下载</a>

            </div>
        </div>

        </div>
       
    </div>
@endsection