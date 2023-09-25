
@extends('layouts.app')

@section('content')
    <div class="container">
        <p></p>
        <b>
        <div class="" style="text-align: center;align-items: center">
            <h4 class="text-success">MODIIFICATION DES INFORMATIONS DE L'EMPLOYE</h4>
        </div>
            <p></p>
        <div class="" style="width: 70%;margin-left: auto;margin-right: auto">
            <form action="{{ route('employee.update', $modele->id) }}" method="POST">
                {{-- @method('PUT') --}}
                @csrf
                @method('PUT')
                    <b>
                    <div class="">
                      <label for="" class="form-label ">NOM</label>
                      <input type="text" name="nom" value="{{ $modele->nom }}" class="form-control">
                    </div>
                    <div class="">
                      <label for="" class="form-label ">PRENOM</label>
                      <input type="text" name="prenom" value="{{ $modele->prenom }}" class="form-control">
                    </div>
                    <div class="">
                      <label for="" class="form-label ">DATE NAISSANCE</label>
                      <input type="date" name="date_nais" value="{{ $modele->date_nais }}" class="form-control">
                    </div>
                    <div class="">
                      <label for="" class="form-label ">LIEU DE NAISSANCE</label>
                      <input type="text" name="lieu_nais" value="{{ $modele->lieu_nais }}" class="form-control">
                    </div>
                    <div class="">
                      <label for="" class="form-label ">LIEU RESIDENCE</label>
                      <input type="text" name="lieu_resid" value="{{ $modele->lieu_risid }}" class="form-control">
                    </div>
                    <div class="">
                      <label for="" class="form-label ">DIPLOME</label>
                      <select class="form-control" name="diplome">
                        <option value="{{ $modele->diplome }}" disabled selected>Selectionner votre diplome</option>
                        <option value="MASTER">MASTER</option>
                        <option value="Licence">Licence</option>
                        <option value="BTS">BTS</option>
                        <option value="DTS">DTS</option>
                        <option value="DUT">DUT</option>
                        <option value="BAC">BAC</option>
                        <option value="PROBATOIRE">PROBATOIRE</option>
                        <option value="CAP">CAP</option>
                        <option value="BEPC">BEPC</option>
                        <option value="CEP">CEP</option>
                        <option value="AUTRE">AUTRE</option>
                    </select>
                    </div>
                    <div class="">
                      <label for="" class="form-label ">PROFESSION</label>
                      <input type="text" name="profession" value="{{ $modele->profession }}" class="form-control ">
                    </div>
                    <div class="">
                      <label for="" class="form-label ">EMAIL</label>
                      <input type="email" name="email" value="{{ $modele->email }}" class="form-control">
                    </div>
                    <div class="">
                      <label for="" class="form-label ">TELEPHONE</label>
                      <input type="text" name="telephone" value="{{ $modele->telephone }}" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">Modifier</button>
                  </b>
                </form>


            </form>
        </div>

    </div>

@endsection

