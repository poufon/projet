@extends('layouts.app')

@section('content')
 <div class="container-fluid">
    <div class="row ">
        <p></p>
        <b>
            <div class="d-flex">
                <div class="">
                    <main class="text-info" style="font-size: 22px">Liste des Employés</main>
                </div>
            </div><p></p>
        </b>
        <div class="row"style="margin-left: auto;margin-rigth: auto ;wit">
            <table class="table">
                <tr class="table-info">
                    <th class="text-success">Matricule</th>
                    <th class="text-success">Nom</th>
                    <th class="text-success">Prenom</th>
                    <th class="text-success">Email</th>
                    <th class="text-success">Télèphone</th>
                    <th class="text-success">Profession</th>
                    <th class="text-success">Type de contrat</th>
                    <th class="text-success">Action</th>
                </tr>


                @foreach($employes as $donnee)
                    <tr>
                        <td class="text-success">{{ $donnee->id }}</td>
                        <td class="text-success">{{ $donnee->nom }}</td>
                        <td class="text-success">{{ $donnee->prenom }}</td>
                        <td class="text-success">{{ $donnee->email }}</td>
                        <td class="text-success">{{ $donnee->telephone }}</td>
                        <td class="text-success">{{ $donnee->profession }}</td>
                        <td class="text-success">{{ $donnee->contrat->type_cont }}</td>
                        <td class="d-flex">
                            <a href="{{ route('employee.edit', $donnee->id) }}" class="btn btn-primary">Modifier</a>

                            <form action="{{ route('employee.delete', $donnee->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            </dt>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
 </div>
@endsection
