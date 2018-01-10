@extends("layouts.ucp")

@section("content")
    <h4 class="text-primary">Welcome, {{Auth::user()->name}}~</h4>
    <hr/>


    <div class="card">
        <div class="card-header">
            最近上传
        </div>
        <div class="card-body">
            <table class="table table-sm" style="font-size: 16px;">
            <tbody>
                @foreach($user->midis as $midi)
                <tr>
                <td scope="row"><a href="{{route('midi.file',['id'=>$midi->id])}}">{{mb_substr($midi->title .' - '.$midi->singer, 0, 30)}}</a></td>
                <td>{!! $midi->rateStar() !!}</td>
                <td class="text-right">{{$midi->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        
    </div> 
    <!-- Comments -->
    <div class="card mt-3">
        <div class="card-header">
            Recently Comments
        </div>
        <div class="card-body">
            dw
        </div>
        
    </div> 
     
@endsection