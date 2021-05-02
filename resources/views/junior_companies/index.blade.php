@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Federação</th>
            @auth
                <th>Ações</th>
            @endauth
        </tr>
        @foreach ($junior_companies as $junior_companie)
            <tr>
                <td>{{$junior_companie->id}}</td>
                <td>{{$junior_companie->name}}</td>
                <td>{{$junior_companie->federation->name}}</td>
                @auth
                    <td>
                            <form action="{{ route('junior_companies.destroy', $junior_companie->id) }}" method="POST">

                                <a href="{{ route('junior_companies.show', $junior_companie->id) }}" title="show">
                                    <i class="fas fa-eye text-success  fa-lg"></i>
                                </a>

                                <a href="{{ route('junior_companies.edit', $junior_companie->id) }}">
                                    <i class="fas fa-edit  fa-lg"></i>

                                </a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                    <i class="fas fa-trash fa-lg text-danger"></i>

                                </button>
                            </form>
                    </td>
                @endauth
            </tr>
        @endforeach
    </table>

    @auth
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('junior_companies.create')}} " title="Criar uma federação">Nova Empresa <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>
    @endauth


@endsection
