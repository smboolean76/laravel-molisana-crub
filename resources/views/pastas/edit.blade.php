@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1>Modifica: {{ $pasta->title }}</h1>
        <form action="{{ route('pastas.update', $pasta) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo*</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" maxlength="50" value="{{ old('title', $pasta->title) }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo*</label>
                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                    <option value="corta" {{  old('type', $pasta->type) === 'corta' ? 'selected' : null }}>Corta</option>
                    <option value="lunga" {{  old('type', $pasta->type) === 'lunga' ? 'selected' : null }}>Lunga</option>
                    <option value="cortissima" {{  old('type', $pasta->type) === 'cortissima' ? 'selected' : null }}>Cortissima</option>
                </select>
                @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cooking_time" class="form-label">Tempo di cottura*</label>
                <input type="number" class="form-control @error('cooking_time') is-invalid @enderror" id="cooking_time" name="cooking_time" min="1" max="20" value="{{ old('cooking_time', $pasta->cooking_time) }}" required>
                @error('cooking_time')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Peso*</label>
                <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight', $pasta->weight) }}" required>
                @error('weight')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3"> {{ old('description', $pasta->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
@endsection