@extends("layouts.app")

@section('content')
    <h1 class="text-primary">系统统计</h1>
    <hr/>
    <div class="card">
        <div class="card-header">
            统计资料
        </div>
        
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">DATA</th>
                        <th scope="col">VALUE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>MIDI:</td>
                        <td>{{$midis->count()}}</td>
                    </tr>
                    <tr>
                        <td>USER:</td>
                        <td>{{$users->count()}}</td>
                    </tr>
            
                </tbody>
              </table>
        
    </div>
@endsection