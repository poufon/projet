

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row"><p></p>
            <div class="d-flex">
                <h1 class="text-dark" style="font-size: 22px"><b>Fiche de paie de l'Employé</b></h1>
            </div><p></p>
            <b>
            <table class="table table-striped" style="border: 1px solid rgb(16, 200, 233)">
                <tr class="table-info">
                    <th class="text-success" style="border: 1px solid rgb(16, 200, 233)">Données de l'Employé</th>
                    <th class="text-success" style="border: 1px solid rgb(16, 200, 233)">Valeur</th>
                </tr>
                <tr>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">Matricule</td>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">{{ $fiche->id }}</td>
                </tr>
                <tr>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">Nom </td>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">{{ $fiche->nom }}</td>
                </tr>
                <tr>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">Prenom</td>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">{{ $fiche->prenom }}</td>
                </tr>
                <tr>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">Date de Naissance</td>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">{{ $fiche->date_nais }}</td>
                </tr>
                <tr>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">profession</td>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">{{ $fiche->profession }}</td>
                </tr>
                <tr>
                    <td class="text-success" class="text-success" style="border: 1px solid rgb(16, 200, 233)">email</td>
                    <td class="text-success" class="text-success" style="border: 1px solid rgb(16, 200, 233)">{{ $fiche->email}}</td>
                </tr>
                <tr>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">fonction</td>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">{{ $fiche->postes->fonction }}</td>
                </tr>
                <tr>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">salaire</td>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">{{ $fiche->contrat->salaire}}</td>
                </tr>
                <tr>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">Taux horaires</td>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">{{ optional($totalHeuresTravaillees)->total ?? 0 }}</td>
                </tr>
                <tr>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">Taux horaires supplémentaires</td>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">{{ optional($totalHeuresSupplementaires)->total ?? 0}}</td>
                </tr>
                <tr>
                    <td class="text-success" class="text-success" style="border: 1px solid rgb(16, 200, 233)">Taux horaires d'absence</td>
                    <td class="text-success" class="text-success">{{ optional($totalAbsence)->total ?? 0 }}</td>
                </tr>
                <tr>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">Taux horaires de retard</td>
                    <td class="text-success" style="border: 1px solid rgb(16, 200, 233)">{{ optional($totalRetard)->total ?? 0 }}</td>
                </tr>
            </table>
        </div>
    </div>

</div>
@endsection

