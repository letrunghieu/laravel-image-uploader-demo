<div>
    <div class="container">
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('File name')}}</th>
                    <th>{{__('Uploaded at')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($images as $index => $image)
                    <tr>
                        <td>
                            {{$index + $images->firstItem()}}
                        </td>
                        <td>
                            <a href="{{route('images.show', [$image])}}">{{$image->original_name}}</a>
                        </td>
                        <td>
                            {{$image->created_at->format('Y-m-d H:i:s')}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="clearfix">
            <div class="float-right">
                {{$images->links()}}
            </div>
        </div>
    </div>
</div>
