
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <p></p>
    <form action="{{ route('absence.store') }}" method="post" class="container form-control"style="width: 70%;margin-left: auto;margin-right: auto">
        @csrf
      <b>
      <div class="">
        <label for="" class="form-label text-success">motif</label>
        <input type="text" name="motif" id="" class="form-control">
      </div>
      <div class="">
        <label for="" class="form-label text-success">observation</label>
        <input type="text" name="observation" id="" class="form-control">
      </div>
      <div class="">
        <label for="" class="form-label text-success">justification</label>
        <input type="text" name="justification" id="" class="form-control">
      </div>
      <div class="">
        <label for="" class="form-label text-success">Mois en Cours</label>
        <input type="month" name="Mois_En_Cours" placeholder="entrer la duree  deja minute" id="" class="form-control">
      </div>
      <div class="container">
        <label for="type_cont" class=" form-label text-success">IDENTIFIANT EMPLOYE</label>
        <select class="form-select text-info container" name="identifiant">
            <option value="" disabled selected><b>Selectionner l'identifiant de l'employé</b></option>
            @foreach ($donnee  as $contrats)
            <option >{{ $contrats->id }}</option>
            @endforeach
        </select>
        </div>
        <div class="">
        <label for="" class="form-label text-success">Date de debut d'absence</label>
        <input type="datetime-local" name="heure_debut" placeholder="entrer le temps de debut de travail" id="" class="form-control">
      </div>
      <div class="">
        <label for="" class="form-label text-success">Date de fin d'absence</label>
        <input type="datetime-local" name="heure_fin" placeholder="entrer le temps d'absence" id="" class="form-control">
      </div>
      <p></p>
      <input type="submit" class="btn btn-primary" value="Enregistrer">
    </b>
    </form>
  </div>
@endsection
