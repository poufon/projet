@extends('layouts.app')

@section('content')
<br>
<div class="" style="text-align: center;align-items: center">
    <h5 class="text-dark" style="margin-right: auto">MODIFICATION DES DES HORAIRES DE TRAVAIL</h5>
  </div>
  <p>
    <div class="" style="width: 70%;margin-left: auto;margin-right: auto">
        <form action="{{ route('horraire.update', $modele->id) }}" method="POST" class="container form-control">
            @csrf
            @method('PUT')
            <b>
            <div class="">
              <label for="" class="form-label text-info">MOIS</label>
              <input type="date" name="mois" value="{{ $modele->mois }}" class="form-control">
            </div>
            <div class="">
              <label for="" class="form-label text-info">SEMAINE</label>
              <input type="week" name="semaine" value="{{ $modele->semaine }}" class="form-control">
            </div>
            <div class="">
              <label for="" class="text-info">JOUR</label>
              <select class="form-control text-info" name="jour">
                  <option value="{{ $modele->jour }}" disabled selected>Choose your option</option>
                  <option value="Lundi">Lundi</option>
                  <option value="Mardi">Mardi</option>
                  <option value="Mercredi">Mercredi</option>
                  <option value="Jeudi">Jeudi</option>
                  <option value="Vendredi">Vendredi</option>
                  <option value="Samedi">Samedi</option>
                  <option value="Dimenche">Dimenche</option>
              </select>
            </div>
            <div class="">
              <label for="" class="form-label text-info">HEURE DE DEBUT</label>
              <input type="time" name="heure_debut" value="{{ $modele->heure_debut }}" class="form-control">
            </div>
            <div class="">
              <label for="" class="form-label text-info">HEURE DE FIN</label>
              <input type="time" name="heure_fin" value="{{ $modele->heure_fin }}" class="form-control">
            </div>
            <div class="">
              <label for="" class="form-label text-info">HEURE SUPPLEMENTAIRE</label>
              <input type="text" name="heure_sup" value="{{ $modele->heure_sup }}" placeholder="duree" class="form-control">
            </div><br>
            <input type="submit" class="btn btn-primary btn-lg" value="Enregistrer">
          </form>
    </div>
@endsection
