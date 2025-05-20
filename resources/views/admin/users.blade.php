@extends('admin-layout')

@section('title', 'utilisateurs')

@section('body')
    <h1 class="text-center py-4">Liste des utilisateurs</h1>
    <p>Total utilisateurs {{ $count }}</p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Rôle</th>
                <th scope="col">Date d'inscription</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->role === 'admin')
                            <span class="badge bg-danger">Admin</span>
                        @else
                            <span class="badge bg-primary">Utilisateur</span>
                        @endif
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    <td>

                        @if ($user->role !== 'admin')
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Etes vous sur')" type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        @endif


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
@endsection
