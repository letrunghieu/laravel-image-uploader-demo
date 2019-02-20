@extends('layouts.default')

@section('title', __('All tags'))

@section('content')
    <div class="container">
        <h1>
            {{__('All tags')}}
        </h1>

        <div>
            @foreach($tags as $tag)
                <a class="badge badge-secondary" href="{{route('tags.show', [$tag])}}">{{$tag->tag_name}}</a>
            @endforeach
        </div>
    </div>
@endsection
