@extends('layouts.app')

@section('content')

    <div class="container"style="margin-left: auto;margin-rigth: auto">

        <div class="d-flex">
            <div class="">
                <main class="text-secondary margin-left: auto" style="margin-left: auto;margin-rigth: auto" ><b>Absences des Employés</b>
                </main>
            </div>
        </div><br><p></p>

        <table class='table '>

            <tr class="table-info">
                <th class="text-success">Nom</th>
                <th class="text-success">Motif</th>
                <th class="text-success">observation</th>
                <th class="text-success">date retard</th>
                <th class="text-success">Action</th>
            </tr>
            @forelse ($absence as $absences)
                <tr>
                    <td class="text-success">{{ $absences->employe->nom }}</td>
                    <td class="text-success">{{ $absences->MOTIF }}</td>
                    <td class="text-success">{{ $absences->OBSERVATION }}</td>
                    <td class="text-success">{{ $absences->created_at->format('d-m-y')}}</td>
                    <td class="text-success">
                            <!-- Bouton "Supprimer" avec formulaire de suppression -->
                        <form action="{{ route('absence.delete', $absences->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <span>Aucune Absence enregistrée</span>
            @endforelse
        </table>
    </div>

@endsection
