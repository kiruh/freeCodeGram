@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-8 offset-2">
                <h2>Edit profile</h2>
                
                <div class="form-group">
                    <label for="title" class="col-form-label">{{ __('Title') }}</label>
                    <input 
                        id="title" 
                        type="text" 
                        class="form-control @error('title') is-invalid @enderror" 
                        name="title" 
                        value="{{ old('title') ?? $user->profile->title }}" 
                        required 
                        autocomplete="title" 
                        autofocus
                    >
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="col-form-label">{{ __('Description') }}</label>
                    <input 
                        id="description" 
                        type="text" 
                        class="form-control @error('description') is-invalid @enderror" 
                        name="description" 
                        value="{{ old('description') ?? $user->profile->description }}" 
                        required 
                        autocomplete="description" 
                        autofocus
                    >
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="url" class="col-form-label">{{ __('Website') }}</label>
                    <input 
                        id="url" 
                        type="text" 
                        class="form-control @error('url') is-invalid @enderror" 
                        name="url" 
                        value="{{ old('url') ?? $user->profile->url }}" 
                        autocomplete="url" 
                        autofocus
                    >
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="image" class="col-form-label">{{ __('Image') }}</label>
                    <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">{{ __('Save profile') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection
