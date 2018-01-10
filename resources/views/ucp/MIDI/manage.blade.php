@extends("layouts.ucp")

@section('content')
    <h1 class="text-primary">MIDI管理</h1>
    <hr/>
    
    @if($midis->count())
    <div class="table-responsive">
        <table class="table table-sm table-bordered ">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">名称</th>
                <th scope="col">时长</th>
                <th scope="col">上传时间</th>
                <th scope="col">得点</th>
                <th scope="col">管理</th>
            </tr>
            </thead>
            <tbody>
            
            @foreach($midis as $midi)
            <tr>
                <th scope="row">{{$midi->id}}</th>
                <td>{{$midi->title}} - {{$midi->singer}}</td>
                <td>Time</td>
                <td>{{$midi->created_at}}</td>
                <td>{{$midi->rate}}/10</td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="{{route('midi.file',['id'=>$midi->id])}}" role="button"><i class="fa fa-eye" aria-hidden="true"></i> 查看</a>
                    <a class="btn btn-outline-info btn-sm" href="{{route('ucp.midi.update',['id'=>$midi->id])}}" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</a>
                    <a class="btn btn-outline-danger btn-sm" href="{{route('ucp.midi.delete',['id'=>$midi->id])}}" role="button"><i class="fa fa-trash-o" aria-hidden="true"></i> 删除</a>

                </td>
            
            </tr> 
            @endforeach
            
            </tbody>
        </table>
    </div>

    <!-- 分页 -->
    <div class="float-right">{{$midis->links('vendor.pagination.bootstrap-4')}}</div>
    @else
        <div class="alert alert-info" role="alert">
            你目前没有上传任何MIDI!
        </div>
    @endif

@endsection