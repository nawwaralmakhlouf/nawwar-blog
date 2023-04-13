<div class="card">
    <div class="card-header bg-info text-white">
        <h4>Edit Post</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('posts.update',$edit_post->id) }}">
            {{csrf_field()}}
            {!! @method_field('PUT') !!}
            @csrf
            <div class="form-group">
                <label>Title : <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{$edit_post->title}}">
                @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label>Description : <span class="text-danger">*</span></label>
                <textarea class="form-control" name="description">{{$edit_post->description}}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label>Tags : <span class="text-danger">*</span></label>
                <br>
                <input type="text" data-role="tagsinput" name="tags" class="form-control tags" value="{{implode(',',$edit_post->tagNames())}}">
                <br>
                @if ($errors->has('tags'))
                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-success store-data btn-sm">Update</button>
                <a class="btn btn-primary store-data btn-sm" href="{{route('posts.index')}}">Add New</a>
            </div>
        </form>
    </div>
</div>
