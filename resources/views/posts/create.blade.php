@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/post" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Add New Post</h2>
                </div>
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">{{ __('Caption') }}</label>


                    <input id="caption" name="caption" type="text" class="form-control @error('caption') is-invalid @enderror" value="{{ old('caption') }}" required autocomplete="Caption" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Image') }}</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Add Post</button>
                </div>
            </div>


        </div>
    </form>
</div>
@endsection