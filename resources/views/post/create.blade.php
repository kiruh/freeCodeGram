@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8 offset-2">
                <h2>Add post</h2>
                
                <div class="form-group">
                    <label for="caption" class="col-form-label">{{ __('Caption') }}</label>
                    <input 
                        id="caption" 
                        type="text" 
                        class="form-control @error('caption') is-invalid @enderror" 
                        name="caption" 
                        value="{{ old('caption') }}" 
                        required 
                        autocomplete="caption" 
                        autofocus
                    >
                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image" class="col-form-label">{{ __('Image') }}</label>
                    <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror" required>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">{{ __('Add post') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection