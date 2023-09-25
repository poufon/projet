@extends('layouts.app')

@section('content')
 <div class="container"style="margin-left: auto;margin-rigth: auto">
    <p></p>
    <div class="row ">
        <p></p>
        <div class=" d-flex">
            <div class="">
                <main class="text-secondary margin-left: auto" style="margin-left: auto;margin-rigth: auto" ><b>Sanction des Employés</b>
                </main>
            </div>
        </div><br><p></p>

        <table class='table '>

            <tr class="table-info">
                <th class="text-success">Nom</th>
                <th class="text-success">Motif</th>
                <th class="text-success">decision</th>
                <th class="text-success">date retard</th>
                <th class="text-success">Action</th>
            </tr>
            @forelse ($sanction as $sanctions)
                <tr>
                    <td>{{ $sanctions->employe->nom }}</td>
                    <td>{{ $sanctions->motifS }}</td>
                    <td>{{ $sanctions->DECISION }}</td>
                    <td>{{ $sanctions->created_at->format('d-m-y')}}</td>
                    <td class="d-flex">
                            <!-- Bouton "Supprimer" avec formulaire de suppression -->
                        <form action="{{ route('sanction.delete', $sanctions->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty <p></p>
                <span class="text-success">Aucune sanction enregistrée</span><p></p>
            @endforelse
        </table>
    </div>
 </div>
@endsection
