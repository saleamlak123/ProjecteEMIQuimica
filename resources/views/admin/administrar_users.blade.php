@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="row justify-content-center">
        @if (Auth::user()->admin)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Professors</h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class="table table-responsive">
                            @foreach ($professors as $professor)
                            <tr>
                                <td>
                                    <h5 class="users">{{ $professor->name }}</h5>
                                </td>
                                <td>
                                    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown"> Assignar </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{ route('add_alumne', ['id' => $professor->id]) }}">Alumne</a>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('delete_users_rols', ['id' => $professor->id]) }}" class="btn btn-sm btn-danger" value="{{ $professor->name }}"><i class="fas fa-trash-alt"></i> Eliminar </button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Alumnes</h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class="table table-responsive">
                            @foreach ($alumnes as $alumne)
                            <tr>
                                <td>
                                    <h5 class="users">{{ $alumne->name }}</h5>
                                </td>
                                @if (Auth::user()->admin)
                                <td>
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown"> Assignar </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{ route('add_professor', ['id' => $alumne->id]) }}">Professor</a>
                                    </div>
                                </td>
                                @endif
                                <td>
                                    <a href="{{ route('delete_users_rols', ['id' => $alumne->id]) }}" class="btn btn-sm btn-danger" value="{{ $alumne->name }}"><i class="fas fa-trash-alt"></i> Eliminar </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Usuaris</h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class="table table-responsive">
                            @foreach ($nousUsers as $user)
                            <tr>
                                <td>
                                    <h5 class="users">{{ $user->name }} </h5>
                                </td>
                                <td>
                                    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown"> Assignar </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{ route('add_alumne', ['id' => $user->id]) }}">Alumne</a>
                                        @if (Auth::user()->admin)
                                        <a class="dropdown-item" href="{{ route('add_professor', ['id' => $user->id]) }}">Professor</a>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('delete_users_rols', ['id' => $user->id]) }}" class="btn btn-sm btn-danger" value="{{ $user->name }}"><i class="fas fa-trash-alt"></i> Eliminar </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $('.btn-danger').on('click', function() {
            let name = $(this).attr('value');
            return window.confirm('Segur que vols esborrar l\'usuari' + ' ' + name + ', s\'eliminaran les activitats asociades a ell');
        });
    })
</script>
@endsection