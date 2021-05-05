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
                            <th scope="col">Add Content </th>
                            <th scope="col">Created At</th>
                            <th scope="col">Comments</th>
                            <th scope="col">Replies</th>
                          </tr>
                        </thead>
                        <tbody> 
                            <tr>
                              <td> {{$post->title}}</td>
                              <td> {{$post->description}}</td>
                              @if ($post->img != '')
                              <td> <img src="{{asset('/storage/img/'.$post->img)}}" style="width: 50px;height: 50px;"></td>
                              @endif
                              <td>
                                <form action="{{route('comments.store')}}" method="post">
                                  @csrf
                                  <div class="form-group">
                                    <textarea name="description" id="description" cols="10" rows="1"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id}}">
                                  </div>
                                  <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Add Comment">
                                  </div>
                                </form>
                              </td>
                              <td> {{$post->created_at}}</td>
                              <td>
                                @if ($comments)
                                  @foreach ($comments as $comment )
                                  {{$comment->description}}
                                  @endforeach
                                @endif
                              </td>
                             
                              <td>
                                @if ($comments)
                                @foreach ($comments as $comment)
                                <div class="display-comment">
                                  <p>{{$comment->description}}</p>
                                  <a href="" id="reply"></a>
                                  <form action="{{route('comments.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                      <input  name="description" id="description" class="form-control" />
                                      <input type="hidden" name="post_id" value="{{ $comment->post_id}}"/>
                                      <input type="hidden" name="parent_id" value="{{ $comment->id}}"/>

                                    </div>
                                    <div class="form-group">
                                      <input type="submit" class="btn btn-warning" value="Reply">
                                    </div>
                                  </form>
                                </div>
                                    
                                @endforeach
                                  
                              @endif
                              </td>
                              
                           
                            </tr>
                        </tbody>
                      </table>
                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection