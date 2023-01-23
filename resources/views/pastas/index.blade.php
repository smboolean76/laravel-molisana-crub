@extends('layouts.main')

@section('page-content')
    <div class="container">
        <h1>Lista Paste</h1>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Tipo</th>
                <th scope="col">Cottura</th>
                <th scope="col">Peso</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pastas as $pasta)
                <tr>
                    <td>{{ $pasta->title }}</td>
                    <td>{{ $pasta->type }}</td>
                    <td>{{ $pasta->cooking_time }}</td>
                    <td>{{ $pasta->weight }}</td>
                    <td>
                      <a href="{{ route('pastas.show', $pasta->id) }}" class="btn btn-primary">Vedi</a>
                      <a href="{{ route('pastas.edit', $pasta->id) }}" class="btn btn-warning">Modifica</a>
                      <form class="d-inline-block" action="{{ route('pastas.destroy', $pasta->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Cancella</button>
                      </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>

          <a href="{{ route('pastas.create') }}" class="btn btn-success">Crea una nuova pasta</a>
    </div>
@endsection