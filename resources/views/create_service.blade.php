
@extends('layouts.app')

@section('content')
<br>
<div class="container">

    <form action="{{ route('Service.store') }}" method="post"style="width: 60%;margin-left: auto;margin-right: auto">
        @csrf
        <b>
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label text-success">ID SERVICE</label>
        <input type="text" name="matricule" class="form-control" placeholder="entrer l'identifiant du departement">
    </div>
    <div class="mb-3">
        <label for="message-text" class="col-form-label text-success">DEPARTEMENT</label>
        <input type="text" name="reference" class="form-control" placeholder="nom du departement" id="">
    </div>
    <input type="submit" value="register" class="btn btn-primary">

    </form>

</div>
@endsection

