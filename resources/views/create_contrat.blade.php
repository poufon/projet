@extends('layouts.app')

@section('content')<p></p>
    <div class="row">
        <div class="container-fluid">
                <div class="" style="text-align: center;justify-content: center; text-align: center;">
                    <main class="text-info">Création d'un Nouveau contrat de travail</main>
                </div><p></p>
                <div class="">
                <form action="{{ route('contrat.store') }}" method="post" class="container form-control"style="width: 70%;margin-left: auto;margin-right: auto">
                    @csrf
                      <b>
                      <div class="">
                          <label for="nature" class="form-label text-info">NATURE</label>
                          <input type="text" name="nature" id="nature" class="form-control">
                      </div>
                      <div class="">
                          <label for="type_cont" class="text-info">TYPE DE CONTRAT</label>
                          <select class="form-select text-success" name="type_cont"><b>
                              <option value="" disabled selected>Selectionner  le type de contrat</option>
                              @foreach ($typeContrat as $contrats)
                              <b>
                                  <option class="text-success">{{ $contrats->type_cont }}</option>
                              </b>
                              @endforeach

                          </select>
                      </div>

                      <div class="">
                          <label for="nature" class="form-label text-info">DUREE DU CONTRAT</label>
                          <input type="text" name="duree" id="" class="form-control">
                      </div>
                      <div class="">
                          <label for="salaire" class="form-label text-info">SALAIRE</label>
                          <input type="text" name="salaire" id="salaire" class="form-control">
                      </div>
                      <div class="">
                          <label for="date_debut" class="form-label text-info">DATE DE DEBUT</label>
                          <input type="date" name="date_debut" id="date_debut" class="form-control">
                      </div>
                      <div class="">
                          <label for="date_fin" class="form-label text-info">DATE DE FIN</label>
                          <input type="date" name="date_fin" id="date_fin" class="form-control">
                      </div>

                      <br>
                      <input type="submit" class="btn btn-success btn-lg" value="VALIDER">
                      </b>
                  </form>
            </div>
            </b>
        </div>
    </div>
@endsection
