@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Created At</th>
                          </tr>
                        </thead>
                        <tbody> 
                            <tr>
                               
                              <td> {{$post->title}}</td>
                              <td> {{$post->description}}</td>
                              <td> <img src="{{asset('/storage/img/'.$post->img)}}" style="width: 50px;height: 50px;"></td>
                              <td> {{$post->created_at}}</td>
                           
                            </tr>
                        </tbody>
                      </table>
                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection