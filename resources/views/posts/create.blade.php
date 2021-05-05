@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error}}</li>
                            @endforeach
                        </ul>
                    </div>
                        
                    @endif

                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title')}}</label>
                        
                            <div class="col-md-6">
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"  value="{{old('title')}}"  autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    
                                @enderror
                            </div>
                        </div>

            
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description')}}</label>
                            
                                <div class="col-md-6">
                                    <textarea type="text" name="description" id="description" class="form-control  @error('description') is-invalid @enderror" value="{{old('description')}}"  autofocus>
                                    </textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Post Image')}}</label>
                                
                                    <div class="col-md-6">
                                        <input type="file" name="img" id="img" class="form-control-file @error('img') is-invalid @enderror"  value="{{old('img')}}"  autofocus>
        
                                        @error('img')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            
                                        @enderror
                                    </div>
                                </div>
    


                            <div class="form-group row md-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit')}}
                                    </button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection