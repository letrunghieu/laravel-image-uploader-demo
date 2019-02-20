@extends('layouts.default')

@section('title', __('Tag: :tag', ['tag' => $tag->tag_name]))

@section('content')
    <div class="container">
        <h1>
            {{__('Tag: :tag', ['tag' => $tag->tag_name])}}
        </h1>
        @include('images._list', ['images' => $tag->images])
    </div>
@endsection
