@extends('layouts.default')

@section('title', __('All tags'))

@section('content')
    <div class="container">
        <h1>
            {{__('All tags')}}
        </h1>

        <div>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Tag name')}}</th>
                    <th>{{__('Number of images')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $index => $tag)
                    <tr>
                        <td>
                            {{$index + $tags->firstItem()}}
                        </td>
                        <td>
                            <a href="{{route('tags.show', [$tag])}}">{{$tag->tag_name}}</a>
                        </td>
                        <td>
                            {{$tag->images->count()}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="clearfix">
            <div class="float-right">
                {{$tags->links()}}
            </div>
        </div>

    </div>
@endsection
