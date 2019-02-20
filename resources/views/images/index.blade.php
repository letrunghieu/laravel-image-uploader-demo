@extends('layouts.default')

@section('title', __('Images'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="display-4">{{__('Upload new image')}}</h1>
                @include('commons._messages')
                <form action="{{route('images.upload')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inp-file">
                            {{__('Please choose one image (*.jpeg, *.png) from your computer and click the upload button.')}}
                        </label>
                        <input type="file" name="file" class="form-control-file" id="inp-file">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{__('Upload')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr />
    <div>
        <div class="container text-center">
            <h4>
                {{__('Uploaded images')}}
            </h4>
        </div>
    </div>

    @include('images._list')
@endsection
