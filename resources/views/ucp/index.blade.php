@extends("layouts.ucp")

@section("content")
    <h4 class="card-title">Welcome, {{Auth::user()->name}}~</h4>
    <hr/>


    <div class="card">
        <div class="card-header">
            Recently Upload
        </div>
        <div class="card-body">
            <table class="table table-sm">
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                </tr>
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