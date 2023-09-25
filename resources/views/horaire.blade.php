@extends('layouts.app')

@section('content')
 <div class="container"style="margin-left: auto;margin-rigth: auto">
    <p></p>
    <div class="d-flex">
        <div class="">
            <main class="text-info" style="font-size: 30px">Agenda des horaires de chaque  Employé</main>
        </div>
    </div><p></p>

    <div class="row ">
        <table class='table me-auto mb-2-lg-0'>
            <tr class="table-info">
                <th class="text-success">Nom Employé</th>
                <th class="text-success">Date de debut</th>
                <th class="text-success">Date de fin</th>
                <th class="text-success">Periode de Travail</th>
                <th class="text-success">HEURE DE DEBUT</th>
                <th class="text-success">HEURE DE FIN</th>
                <th class="text-success">Action</th>
            </tr>


            @foreach($horaire as $donnee)
                <tr>
                    <td class="text-success">{{ $donnee->employe->nom }}</td>
                    <td class="text-success">{{ $donnee->date_debut }}</td>
                    <td class="text-success">{{ $donnee->date_fin }}</td>
                    <td class="text-success">{{ $donnee->periode }}</td>
                    <td class="text-success">{{ $donnee->heure_debut }}</td>
                    <td class="text-success">{{ $donnee->heure_fin }}</td>
                    <td>
                        <a href="{{ route('horraire.edit', $donnee->id) }}" class="btn btn-primary">Modifier</a>

                        <form action="{{ route('horraire.delete', $donnee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
 </div>
@endsection
