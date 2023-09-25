@extends('layouts.app')

@section('content')
    <div class="container-fluid">

    <div class="container">
        <div class="row"><b>
            <div class="" style="align-items: center;text-align: center">
                <main class="text-info" style="font-size: 20px ;align-items: center;text-align: center">formulaire de creation d'un employé
                </main>
            </div>
            <p></p>
            <div class="container">
                <form action="{{ route('employee.store') }}" method="post" class="container form-control"style="width: 65%;margin-left: auto;margin-right: auto">
                    @csrf
                    <b>
                        <div class="">
                            <label for="" class="form-label text-success">NOM</label>
                            <input type="text" name="nom" placeholder="votre nom" class="form-control text-info" required>
                        </div>
                        <div class="">
                            <label for="" class="form-label text-success">PRENOM</label>
                            <input type="text" name="prenom" placeholder="votre prenom" class="form-control text-info"required>
                        </div>
                        <div class="">
                            <label for="" class="form-label text-success">DATE NAISSANCE</label>
                            <input type="date" name="date_nais" placeholder="date de naissance" class="form-control text-info"required>
                        </div>
                        <div class="">
                            <label for="" class="form-label text-success">LIEU DE NAISSANCE</label>
                            <input type="text" name="lieu_nais" placeholder="lieu de naissance" class="form-control text-info"required>
                        </div>
                        <div class="">
                            <label for="" class="form-label text-success">SEXE</label>
                            <select class="form-select text-info" name="sexe"required>
                                <option value="" disabled selected>Selectionner sexe</option>
                                <option value="homme">homme</option>
                                <option value="femme">femme</option>
                            </select>
                            </div>
                        <div class="">
                            <label for="" class="form-label text-success">LIEU RESIDENCE</label>
                            <input type="text" name="lieu_resid" placeholder="lieu de residence" class="form-control text-info"required>
                        </div>
                        <div class="">
                            <label for="" class="form-label text-success">DIPLOME</label>
                            <select class="form-select text-info" name="diplome"required>
                            <option value="" disabled selected>Selectionner votre diplome</option>
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
                            <label for="" class="form-label text-success">PROFESSION</label>
                            <input type="text" name="profession" placeholder="profession" class="form-control text-info"required>
                        </div>
                        <div class="">
                            <label for="" class="form-label text-success">EMAIL</label>
                            <input type="email" name="email" placeholder="Adresse email" class="form-control text-info"required>
                        </div>
                        <div class="">
                            <label for="" class="form-label text-success">TELEPHONE</label>
                            <input type="text" name="telephone" placeholder="contact" class="form-control text-info"required>
                        </div>
                        <div class="">
                            <label for="type_cont" class="text-success">IDENTIFIANT CONTRAT</label>
                            <select class="form-select text-info" name="identifiant"required>
                                <option value="" disabled selected><b>Selectionner l'identifiant de contrat</b></option>
                                @foreach ($contrat  as $contrats)
                                <option >{{ $contrats->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Ajouter">
                    </b>
                </form>
            </div>
        </div>
    </div>

    </div>

@endsection
