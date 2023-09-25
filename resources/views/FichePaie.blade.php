

@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <p></p>
    <table class="table">
        <tr class="table-info">
            <th class="text-success">Matricule</th>
            <th class="text-success">Nom des  Employés</th>

            <th class="text-success">option</th>
        </tr>
        @forelse ($employes as $fiche )
        <tr><b>
            <td class="text-success">
                {{ $fiche->id}}
            </td>
            <td class="text-success">
                {{ $fiche->nom }}
            </td>
            <td class="text-success">
                <a href="{{ route('Paie.show', $fiche->id) }}" class="btn btn-primary">fiche de paie</a>
            </td>
        </tr>
        @empty
            <main class="text-success">aucun employé en base de donnée</main>
        @endforelse

    </table>
</div>
</div>
@endsection

