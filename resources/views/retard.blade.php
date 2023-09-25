
@extends('layouts.app')

@section('content')
<div class="container" style="margin-left: auto;margin-rigth: auto">

<div class="">
    <main class="text-secondary margin-left: auto" style="margin-left: auto;margin-rigth: auto" ><b>Retard des Employés</b>
    </main>
</div>
</div><br><p></p>

<table class='table'>

<tr class="table-info">
    <th class="text-success">Nom</th>
    <th class="text-success">Motif</th>
    <th class="text-success">observation</th>
    <th class="text-success">date retard</th>
    <th class="text-success">Action</th>
</tr>

</b>
@forelse ($retard as $retards)
    <tr>
        <td class="text-success">{{ $retards->employe->nom }}</td>
        <td class="text-success">{{ $retards->motif }}</td>
        <td class="text-success">{{ $retards->observation }}</td>
        <td class="text-success">{{ $retards->created_at->format('d-m-y')}}</td>
        <td class="d-flex">
                <!-- Bouton "Supprimer" avec formulaire de suppression -->
            <form action="{{ route('retard.delete', $retards->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
@empty
    <span>Aucun retard enregistré des employés</span>
@endforelse
</table>
</div>

@endsection

