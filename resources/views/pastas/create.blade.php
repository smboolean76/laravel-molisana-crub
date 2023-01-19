@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1>Crea una nuova pasta</h1>

        <form action="{{ route('pastas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo*</label>
                <input type="text" class="form-control" id="title" name="title" maxlength="50" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo*</label>
                <select class="form-select" id="type" name="type">
                    <option value="corta">Corta</option>
                    <option value="lunga">Lunga</option>
                    <option value="cortissima">Cortissima</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="cooking_time" class="form-label">Tempo di cottura*</label>
                <input type="number" class="form-control" id="cooking_time" name="cooking_time" min="1" max="20" required>
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Peso*</label>
                <input type="number" class="form-control" id="weight" name="weight" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
@endsection