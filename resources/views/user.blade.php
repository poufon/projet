@extends('layouts.app')

@section('content')
 <div class="container"style="margin-left: auto;margin-rigth: auto">
    <p></p>
    <div class="nav-item">
        <h2  class="d-flex"><b>UTILISATEUR</b></h2>
    </div><br>
    <div class="row ">

        <table class='table me-auto mb-2-lg-0' style="width: 85%;margin-left: auto;margin-rigth: auto">
            <b>
                <tr class="table-info">
                    <th class="text-success"style="text-align: center;align-items: center">ID</th>
                    <th class="text-success"style="text-align: center;align-items: center">NOM</th>
                    <th class="text-success"style="text-align: center;align-items: center">EMAIL</th>
                    <th class="text-success"style="text-align: center;align-items: center">Action</th>
                </tr>

            </b>
            @foreach($utilisateur as $user)

                <tr>
                    <b>
                        <td class="text-success"style="text-align: center;align-items: center">{{ $user->id }}</td>
                        <td class="text-success"style="text-align: center;align-items: center">{{ $user->name }}</td>
                        {{-- <td>{{ $donnee->prenom }}</td> --}}
                        <td class="text-success"style="text-align: center;align-items: center">{{ $user->email }}</td>
                        <td class="d-flex"style="text-align: center;align-items: center">
                            <form action="{{ route('users.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </b>
                </tr>
            @endforeach
        </table>
    </div>
 </div>
@endsection
