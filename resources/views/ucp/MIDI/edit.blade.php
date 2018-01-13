@extends("layouts.ucp")

@section("content")
    <h1 class="text-primary">修改MIDI信息</h1>
    <hr/>
    @if ($errors->any())
        <div class="alert alert-info">
           
        @foreach ($errors->all() as $error)
        {{ $error }}
        @endforeach
            
        </div>
    @endif
  
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#midi" role="tab" data-toggle="tab">MIDI信息</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#mp3" role="tab" data-toggle="tab">MIDI-HQ</a>
                </li>
                
            </ul>
          
        </div>
        <div class="card-body">
            <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="midi">
                        <form action="{{route('ucp.midi.update.submit',['id'=>$midi->id])}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{--
                            <div class="form-group">
                                <label for="exampleFormControlFile1">选择文件 *:</label>
                                <input name="midi" accept=".mid,.midi,.rmi" type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">音乐曲名 *:</label>
                                <input name="title" type="text" class="form-control" value="{{$midi->title}}" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">歌手 *:</label>
                                <input name="singer" type="text" class="form-control" value="{{$midi->singer}}" required>
                        
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">MIDI作者 (如果有的话):</label>
                                <input name="composer" type="text" class="form-control" value="{{$midi->composer}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">分类 *:</label>
                                <select name="cat" class="form-control" id="exampleFormControlSelect1" required>
                                @foreach($cats as $cat)
                                    @if($midi->cat_id == $cat->id) <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
                                    @else <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>音源 *:</label>
                                <input name="ongen" type="text" class="form-control" value="{{$midi->ongen}}" required>
                                <small>
                                    请填写与此MIDI音乐相关的音源， 比如GS、GM、XG等，每个词用" , " 分割。
                                </small>
                            </div>
                            <div class="form-group">
                                <label>标签:</label>
                                <input name="tag" type="text" class="form-control" value="{{$midi->tag}}">
                                <small>
                                    请填写与此MIDI音乐相关的词语（即标签），比如曲作者、歌手的名字、使用的乐器等等，每个词用" , " 分割。如 钢琴，梁静茹 。设置合适的标签有利于更方便的组织查找MIDI。
                                </small>
                            </div>
                            <div class="form-group">
                                <label>简单介绍/歌词等:</label>
                                <textarea name="description" class="form-control" rows="3">{{$midi->description}}</textarea>
                            </div>
                            <div class="float-right">
                                <a a class="btn btn-secondary" role="button" href="{{route('ucp.midi.manage')}}">取消</a>
                                <button type="submit" class="btn btn-primary">修改</button>
                            </div>
                                
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="mp3">
                        <form action="{{route('ucp.mp3.update.submit',['id'=>$midi->id])}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{-- 
                                $table->increments('id');
                                $table->text('url');
                                $table->text('ogen');
                                $table->integer('midi_id');    
                            --}}
                            <div class="form-group">
                                <label>URL外链地址*:</label>
                                @if($midi->hq) <input name="url" class="form-control" value="{{$midi->hq->url}}" required>
                                @else <input name="url" class="form-control" placeholder="支援各种多媒体文件,例如mp3,wav等..." required> @endif
                            </div>
                            <div class="form-group">
                                <label>录制音源*:</label>
                                @if($midi->hq) <input name="ogen" class="form-control" value="{{$midi->hq->ogen}}" required>
                                @else <input name="ogen" class="form-control" placeholder="该HQ版本录制使用的音源,例如SC-55,VSC,MU100,MT-32等..." required/> @endif
                            </div>
                            <div class="float-right">
                                <a a class="btn btn-secondary" role="button" href="{{route('ucp.midi.manage')}}">取消</a>
                                <button type="submit" class="btn btn-primary">修改</button>
                            </div>
                        </form>
                    </div>
                    
            </div>
        </div>
    </div>
    
   
@endsection
@section("js")
    <!-- Ckeditor JS -->
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection