@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Note') }}</div>

                <div class="card-body">
                    <div>
                        @if ($errors->any())
                        @foreach ($errors->all() as $e)
                        {{ $e }}
                        @endforeach

                        @endif
                    </div>
<form method="POST" action="{{ $isEdit? route('notes.update', $note->id): route('notes.store')}}">

    @csrf
    @if ($isEdit)
    @method('PUT')

    @endif


                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" name="title" class="form-control"required value="{{ $isEdit ? $note->title : old('title')}}" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" name="description" class="form-control" required >{{ $isEdit ? $note->description : old('description')}}</textarea>
                            </div>
                        </div>

                        <button type="submit">{{ $isEdit? 'Update': 'Create' }}</button>

</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
