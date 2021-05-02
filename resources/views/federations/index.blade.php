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
            <th>State</th>
            <th>Actions</th>
        </tr>
        @foreach ($federations as $federation)
            <tr>
                <td>{{$federation->id}}</td>
                <td>{{$federation->name}}</td>
                <td>{{$federation->state}}</td>
                <td>
                    <form action="{{ route('federations.destroy', $federation->id) }}" method="POST">

                        <a href="{{ route('federations.show', $federation->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('federations.edit', $federation->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $federations->links() !!}

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('federations.create')}} " title="Criar uma federação">Nova Federação <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

@endsection
