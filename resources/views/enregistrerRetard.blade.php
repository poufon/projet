
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <p></p>
    <form action="{{ route('retard.store') }}" method="post" class="container form-control"style="width: 70%;margin-left: auto;margin-right: auto">
        @csrf
      <b>
      <div class="">
        <div class="">
          <label for="type_cont" class="text-info">IDENTIFIANT EMPLOYE</label>
          <select class="form-select text-success" name="identifiant">
              <option value="" disabled selected><b>Selectionner l'identifiant de l'employé</b></option>
              @foreach ($donnee  as $contrats)
              <option >{{ $contrats->$id }}</option>
              @endforeach
          </select>
        </div>
        <label for="" class="form-label text-info">motif</label>
        <input type="text" name="motif" id="" class="form-control text-success">
      </div>
      <div class="">
        <label for="" class="form-label text-info">observation</label>
        <input type="text" name="observation" id="" class="form-control text-success">
      </div>
      {{-- <div class="">
        <label for="" class="form-label text-info">justification</label>
        <input type="text" name="justification" id="" class="form-control text-success">
      </div> --}}
      <div class="">
        <label for="" class="form-label text-info">Mois en Cours</label>
        <input type="month" name="Mois_En_Cours" placeholder="entrer la duree  deja minute" id="" class="form-control text-success">
      </div>
      <div class="">
        <label for="" class="form-label text-info">Heure de debut de travail</label>
        <input type="datetime-local" name="heure_arrivee" placeholder="entrer le temps de debut de travail" id="" class="form-control text-success">
      </div>
      <div class="">
        <label for="" class="form-label text-info">Heure de retard accusé</label>
        <input type="datetime-local" name="heure_retard" placeholder="entrer le temps d'absence" id="" class="form-control text-success">
      </div>
      <p></p>
      <input type="submit" class="btn btn-primary" value="Enregistrer">
    </b>
    </form>
@endsection


