@extends('layouts.app')

@section('content')
    <div class="container">
        <p></p>
        <div class="" style="font-size: 17px;text-align: center;align-items: center">
            <main class="text-secondary" style="font-size: 17px;text-align: center;align-items: center">
                Création d'un nouveau service
            </main>
        </div><br>
        <div class=""style="width: 70%;margin-left: auto;margin-right: auto">
            <form action="{{ route('Decision.store') }}" class="form-control" method="post">

                @csrf
                <b>
                <div class="">
                    <label for="fonction" class="form-label text-info">IDENTIFIANT  DU POSTE</label>
                    <select class="form-select text-success" name="identifiant1">
                        <option value="" disabled selected><b>Selectionner l'identifiant du poste</b></option>
                        @foreach ($post  as $contrats)
                        <option class="text-success">{{ $contrats->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <label for="fonction" class="form-label text-info">MATRICULE EMPLOYE</label>
                    <select class="form-select text-success" name="identifiant2">
                        <option value="" disabled selected><b>Selectionner l'identifiant employé</b></option>
                        @foreach ($employe  as $contrats)
                        <option class="text-success">{{ $contrats->id }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit"class="btn btn-primary" value="register">
                </b>
            </form>
        </div>

    </div>
@endsection


