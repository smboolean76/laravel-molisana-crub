@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1>Modifica: {{ $pasta->title }}</h1>
        <form action="{{ route('pastas.update', $pasta) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo*</label>
                <input type="text" class="form-control" id="title" name="title" maxlength="50" value="{{ $pasta->title }}" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo*</label>
                <select class="form-select" id="type" name="type">
                    <option value="corta" {{ $pasta->type === 'corta' ? 'selected' : null }}>Corta</option>
                    <option value="lunga" {{ $pasta->type === 'lunga' ? 'selected' : null }}>Lunga</option>
                    <option value="cortissima" {{ $pasta->type === 'cortissima' ? 'selected' : null }}>Cortissima</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="cooking_time" class="form-label">Tempo di cottura*</label>
                <input type="number" class="form-control" id="cooking_time" name="cooking_time" min="1" max="20" value="{{ $pasta->cooking_time }}" required>
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Peso*</label>
                <input type="number" class="form-control" id="weight" name="weight" value="{{ $pasta->weight }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $pasta->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
@endsection