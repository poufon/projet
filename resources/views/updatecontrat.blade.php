@extends('layouts.app')

@section('content')
<p></p>
<div style="text-align: center;align-items: center">
    <h3 class="text-dark">MODIFICATION DES DONNEES DU CONTRAT</h3>
  </div>
<p></p>
  <div class=""style="width: 70%;margin-left: auto;margin-right: auto">
    <form action= "{{ route('contrat.update', $modele->id) }}" method ="post" class="container form-control">
        @csrf
        @method('PUT')
      <div class="">
        <label for="nature" class="form-label text-info">NATURE</label>
        <input type="text" name="nature" value="{{ $modele->nature }}" class="form-control text-success" method="POST">
        @method('PUT')
      </div>
       <div class="">
        <label for="type_cont" class="text-dark">TYPE DE CONTRAT</label>
        <select class="form-select text-success" name="type_cont"><b>
            <option value="" disabled selected>Selectionner  le type de contrat</option>
            @foreach ($typeContrat as $contrats)
            <b>
                <option class="text-success">{{ $contrats->type_cont }}</option>
            </b>
            @endforeach

        </select>
      {{-- </div>
        <div class="">
        <label for="fonction" class="form-label text-info">FONCTION</label>
        <input type="text" name="fonction" value="{{ $modele->fonction }}" class="form-control text-success">
      </div> --}}
      <div class="">
        <label for="salaire" class="form-label text-info">SALAIRE</label>
        <input type="text" name="salaire" value="{{ $modele->salaire }}" class="form-control text-success">
      </div>
      <div class="">
        <label for="duree" class="form-label text-info">DUREE</label>
        <input type="text" name="duree" value="{{ $modele->duree }}" class="form-control text-success">
      </div>
      <div class="">
        <label for="date_debut" class="form-label text-info">DATE DE DEBUT</label>
        <input type="date" name="date_debut" value="{{ $modele->date_debut }}" class="form-control text-success">
      </div>
      <div class="">
        <label for="date_fin" class="form-label text-info">DATE DE FIN</label>
        <input type="date" name="date_fin" value="{{ $modele->date_fin }}" class="form-control text-success">
      </div>

     <br>
      <input type="submit" class="btn btn-success btn-lg" value="VALIDER">
    </form>
  </div>
@endsection
