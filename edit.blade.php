@extends('layout.master')
@section('content')
    <div class="main-content">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    Update Blogs
                </div>
                <div class="card-body">
                    <form action="{{ route('update.blog',$blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-12">
                            <label for="title" class="col-sm-4 col-form-label">Title</label>
                            <input type="text" class="form-control" id="inputEmail3" name="title" value="{{$blog->title}}">
                        </div>

                        <div class="col-sm-12">
                            <label for="description" class="col-sm-4 col-form-label">Description</label>
                            <textarea type="text" class="form-control" id="inputEmail3" name="description">{{$blog->description}}</textarea>

                        </div>

                        <div class="col-sm-12">
                            <label for="image" class="col-sm-4 col-form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        

                        
                  
                    
                    <br>
                <div class="col-sm-4">
                    
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
            </div>
            </div>
            </div>
        </div>
    </div>
@endsection
