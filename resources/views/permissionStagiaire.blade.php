@extends('layouts.app')

@section('content')
<div class="container">
    <p></p>

    <div class="" style="width: 100%;margin-left: auto;margin-right: auto">
        <b>
            <h3 class="text-secondary"style="text-align: center;align-items: center">Congés des employés durant une période donnée</h3>
        </b><p></p>
        <table class="table">
            <thead>
                <b>
                    <tr class="table-info">
                        <th class="text-success"style="text-align: center;align-items: center">Employé</th>
                        <th class="text-success"style="text-align: center;align-items: center">Date de début de congé</th>
                        <th class="text-success"style="text-align: center;align-items: center">Date de fin de congé</th>
                    </tr>
                </b>
            </thead>
            <tbody>
                @foreach ($leaves as $leave)
                    <tr>
                        <td class="text-success"style="text-align: center;align-items: center">{{ $leave->employe->nom }}</td>
                        <td class="text-success"style="text-align: center;align-items: center">{{ $leave->date_debut }}</td>
                        <td class="text-success"style="text-align: center;align-items: center">{{ $leave->date_fin }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
@endsection
