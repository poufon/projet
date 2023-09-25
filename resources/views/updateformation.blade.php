@extends('layouts.app')

@section('content')

{{--
<a href="#">
    <div class="">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">afficher les postes</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">liste des postes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
    <div class="container"><p></p>
        <main style="text-align: center;align-items: center;font-size: 22px;">liste des departements</main>
        <table class="table table-xs-2">
            <b>
                <tr class="table-info">
                    {{-- <th>identifiant</th> --}}
                    <th class="text-success" style="text-align: center;align-items: center">Identifiant</th>
                    <th class="text-success" style="text-align: center;align-items: center">Departement</th>
                </tr>
            </b>
            @forelse ($service as $posts )
            <tr>
                {{-- <td>{{ $posts->id }}</td> --}}
                <td class="text-success" style="text-align: center;align-items: center">{{ $posts->id }}</td>
                <td class="text-success" style="text-align: center;align-items: center">{{ $posts->reference}}</td>
            </tr>
            @empty
            <main style="text-align: center;align-items: center">AUCUN SERVICE DANS LA BASE DE DONNEES</main>
            @endforelse
        </table>

    </div>
            {{--
            </div>
          </div>
    </div>
  </a> --}}


@endsection
