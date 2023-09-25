
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <div class="row">
            <p></p><b>
            <div class="" style="text-align: center;align-items: center">
                <main class="text-infos">Formulaire d'enregistrement d'un Congé</main>
            </div><p></p>
            <form action="{{ route('CongeAnnuel.store') }}" method="post" class=" form-control"style="width: 50%;margin-left: auto;margin-right: auto">
                @csrf
              <b>
              <div class="">
                <label for="" class="form-label text-success">NATURE DU CONGE </label>
                <input type="text" name="annee" id="" class="form-control text-info">
              </div>
              <div class="">
                <label for="" class="form-label text-success">DATE D'ETABLISSEMENT DU TITRE DE CONGE</label>
                <input type="date" name="date_etab" id="" class="form-control text-info">
              </div>
                <div class="">
                    <label for="" class="form-label text-success">TYPE DE CONGE </label>
                    <select class="form-control text-info" name="identifiant6">
                        <option value="" disabled selected><b>Selectionner le type de conge</b></option>
                        @foreach ($typeconge as $contrats)
                        <option >{{ $contrats->type_conge }}</option>
                        @endforeach
                    </select>
               </div>
               <div class="">
                <label for="" class="form-label text-success">DATE DE DEBUT DE CONGE</label>
                <input type="date" name="date_debut" id="" class="form-control text-info">
              </div>
              <div class="">
                <label for="" class="form-label text-success">DATE DE FIN DE CONGE</label>
                <input type="date" name="date_fin" id="" class="form-control text-info">
              </div>
              <div class="">
                <label for="" class="form-label text-success">IDENTIFIANT DE L'EMPLOYE</label>
                <select class="form-control text-info" name="identifiant">
                    <option value="" disabled selected><b>Selectionner le matricule de l'employe </b></option>
                    @foreach ($employe as $employes)
                      <option >{{ $employes->id}}</option>
                    @endforeach

              </div>
              <p></p>
              <input type="submit" class="btn btn-primary" value="Ajouter">
            </b>
            </form>
        </div>
    </div>
  </div>
@endsection


