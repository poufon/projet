@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <b>
        <div class="d-flex"style="text-align: center;justify-content: center; text-align: center;"><b>
            <div class=""><h5 class="text-info">Enregistrement d'un nouveau poste de travail</h5></div>
        </div><br>
        <form action="{{ route('poste.store') }}" class="form-control " method="post"style="width: 65%;margin-left: auto;margin-right: auto">
            <b>
            @csrf
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label text-info">Identifiant du poste</label>
                <input type="text" class="form-control" placeholder="entrer l'identifiant" name="identifiant" class="form-control">
            </div>
            <div class="">
                <label for="type_cont" class="col-form-label text-info">Identifiant du service</label>
                <select class="form-select text-success" name="identifiant1">
                <option value="" disabled selected><b>Selectionner l'identifiant du service</b></option>
                @foreach ($service  as $contrats)
                    <option >{{ $contrats->id }}</option>
                 @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label text-info">Designation</label>
                <input type="text" class="form-control text-success mb-3" placeholder="entrer la designation du poste" name="designation" id="recipient-name">
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label text-info">Fonction</label>
                <input type="text" name="fonction"class="form-control text-success" placeholder="fonction" id="">
            </div>
            <input type="submit" value="register" class="btn btn-primary">
                {{-- <button type="button" class="btn btn-primary">register</button> --}}
            </b>
        </form>
    </div>
</div>
@endsection
