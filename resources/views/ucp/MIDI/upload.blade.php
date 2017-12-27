@extends("layouts.ucp")

@section("content")
    <h1 class="text-primary">New MIDI</h1>
    <hr/>
    <form>
        <div class="form-group">
            <label for="exampleFormControlFile1">Select File *:</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">MIDI Title *:</label>
            <input type="text" class="form-control" placeholder="Enter Title">
           
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Singer *:</label>
            <input type="text" class="form-control" placeholder="Enter Singer">
  
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Composer (if any or known):</label>
            <input type="text" class="form-control" placeholder="Enter Composer (if any or known)">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Classification:</label>
            <select class="form-control" id="exampleFormControlSelect1">
            @foreach($cats as $cat)
                <option>{{$cat->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Tag:</label>
            <input type="text" class="form-control" placeholder="Tag">
        </div>
        <div class="form-group">
            <label>Desciption/Lyrics:</label>
            <textarea class="form-control" rows="3" placeholder="Enter Desciption or Lyrics (If any)"></textarea>
        </div>
       
        <button type="submit" class="btn btn-primary">upload</button>
    </form>
@endsection