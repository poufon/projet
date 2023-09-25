@extends('layouts.app')

@section('content')
<br>
    <div class="container">
        <b>
        <div class="row">
            <div class="d-flex"style="text-align: center;justify-content: center; text-align: center;">
                <div class=""><main class="text-danger" style="font-size: 20px">Planification des horaire de travail de chaque Employé</main></div>
            </div>
            <p>
            <div class="">
                <form action="{{ route('horraire.store') }}" method="POST" class="container form-control"style="width: 65%;margin-left: auto;margin-right: auto">
                    @csrf
                    <b>
                    <div class="">
                        <label for="type_cont" class="text-success">IDENTIFIANT EMPLOYE</label>
                        <select class="form-select" name="identifiant">
                            <option value="" disabled selected><b>Selectionner l'identifiant de l'employé</b></option>
                            @foreach ($employe  as $contrats)
                            <option >{{ $contrats->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <label for="" class="form-label text-success">DATE DE DEBUT</label>
                        <input type="datetime-local" name="date_debut" id="" class="form-control">
                    </div>
                    <div class="">
                        <label for="" class="form-label text-success">DATE DE FIN</label>
                        <input type="datetime-local" name="date_fin" id="" class="form-control">
                    </div>
                    <div class="">
                      <select class="form-control text-success" name="jour">
                          <option value="" disabled selected>Choose your option</option>
                          <option value="Lundi" class="text-primary">Lundi</option>
                          <option value="Mardi"class="text-primary">Mardi</option>
                          <option value="Mercredi"class="text-primary">Mercredi</option>
                          <option value="Jeudi"class="text-primary">Jeudi</option>
                          <option value="Vendredi"class="text-primary">Vendredi</option>
                          <option value="Samedi"class="text-primary">Samedi</option>
                          <option value="Dimenche"class="text-primary">Dimenche</option>
                      </select>
                    </div>
                    <div class="">
                        <label for="" class="form-label text-success">PERIODE</label>
                        <input type="text" name="periode" id="" class="form-control">
                    </div>
                    <div class="">
                      <label for="" class="form-label text-success">HEURE DE DEBUT</label>
                      <input type="time" name="heure_debut" id="" class="form-control">
                    </div>
                    <div class="">
                      <label for="" class="form-label text-success">HEURE DE FIN</label>
                      <input type="time" name="heure_fin" id="" class="form-control">
                    </div>
                    <div class="">
                      <label for="" class="form-label text-success">HEURE SUPPLEMENTAIRE</label>
                      <input type="text" name="heure_sup" id="" placeholder="duree" class="form-control">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary btn-lg" style="float: right" value="Enregistrer"><br><p></p>
                </form>
            </div>
        </div>
    </div>
@endsection
