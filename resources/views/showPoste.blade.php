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
        <table class="table table-xs-2">
            <b>
                <tr class="table-info">
                    {{-- <th>identifiant</th> --}}
                    <th class="text-success">designation du poste</th>
                    <th class="text-success">Fonction</th>
                </tr>
            </b>
            @forelse ($post as $posts )
            <tr>
                {{-- <td>{{ $posts->id }}</td> --}}
                <td class="text-success">{{ $posts->designation }}</td>
                <td class="text-success">{{ $posts->fonction}}</td>
            </tr>
            @empty
            <main>AUCUN POSTE DANS LA BASE DE DONNEES</main>
            @endforelse
        </table>

    </div>
            {{--
            </div>
          </div>
    </div>
  </a> --}}


@endsection
