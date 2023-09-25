@extends('layouts.app')

@section('content')
    <div class="container"style="margin-left: auto;margin-rigth: auto">
        <div class="row">
            <p></p>
                <div class="">
                    <main class="text-success d-flex" style="margin-left: auto;margin-rigth: auto;font-size: 22px">Liste des differents contrats</main>
                </div><br>
            <table class='table me-auto mb-2-lg-0'>
                <tr class="table-info">
                    <th class="text-success" >identifiant du contrat</th>
                    <th class="text-success" >Nature</th>
                    <th class="text-success" >Type Contrat</th>
                    <th class="text-success" >Durée</th>
                    <th class="text-success" >date d'enregistrement</th>
                    <th class="text-success" >Action</th>
                </tr>
                @foreach($contrat as $donnee)
                    <tr class="">
                        <td class="text-success" style="margin-left: auto;margin-rigth: auto;">{{ $donnee->id }}</td>
                        <td class="text-success" style="margin-left: auto;margin-rigth: auto;">{{ $donnee->nature }}</td>
                        <td class="text-success" style="margin-left: auto;margin-rigth: auto;">{{ $donnee->type_cont }}</td>
                        <td class="text-success" style="margin-left: auto;margin-rigth: auto;">{{ $donnee->duree }}</td>
                        <td class="text-success">{{ $donnee->created_at->format('d-m-y')}}</td>
                        <td class="d-flex">
                            <main>
                                <a href="{{ route('contrat.edit', $donnee->id) }}" style="text-decoration: none" class="text-primary">Edit</a>

                            </main>
                            <form action="{{ route('contrat.delete', $donnee->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="text-danger" style="border: none;background: none" value="Supprimer">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

