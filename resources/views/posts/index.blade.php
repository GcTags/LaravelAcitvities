@extends('layouts.app')

@section('content')
    

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message')}}
                </div>
            @endif
                
       

            <a class="btn button btn-info" href="/posts/create">Create New</a> 
            <br><br>
            <div class="card">
                <div class="card-body">
                   <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                            @foreach ($posts  as $post)
                    <tbody> 
                        <tr>
                           
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                        @auth
                            <td><a href="/posts/{{$post->id}}" class="btn btn-info">View</a></td>
                           
                            <td> <a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a></td>
                            <td>
                            <form method="POST" action="{{route('posts.destroy', $post->id)}} ">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                             </td>
                        @endauth
                          
                        </tr>
                    </tbody>
                            @endforeach
                  </table>
                  Total # of Post {{$count}}
            </div>
        </div>
    </div>
</div>
@endsection

