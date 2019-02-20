<div class="messages">
    @if(Session::has('errors'))
        <div class="alert alert-danger alert-dismissible fade show">
            @foreach(Session::get('errors')->all() as $error)
                <div>{{$error}}</div>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>