@extends('layouts.default')

@section('title', __('Images: :image', ['image' => $image->original_name]))

@section('content')
    <div class="container">
        <h1>{{__('View image')}}</h1>
        <div class="row">
            <div class="col-md-8">
                <div class="single-image text-center">
                    <img class="img-fluid" src="{{asset("storage/uploads/{$image->object_name}")}}"
                         alt="{{$image->original_name}}">
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <h5>{{$image->original_name}}</h5>
                    <div class="text-muted">
                        <span class="key">{{__('Uploaded at:')}}</span>
                        <span class="value">{{$image->created_at->format('Y-m-d H:i:s')}}</span>
                    </div>
                </div>
                <div>
                    <h6>{{__('Image tags:')}}</h6>
                    @foreach($image->tags as $tag)
                        <a class="badge badge-secondary" href="{{route('tags.show', [$tag])}}">{{$tag->tag_name}}</a>
                    @endforeach

                    @include('commons._messages')
                    <form action="{{route('images.add_tag', [$image])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="inp-new-tag">{{__('Add new tag')}}</label>
                            <input type="text" name="tag" class="form-control" id="inp-new-tag">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">{{__('Add')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
