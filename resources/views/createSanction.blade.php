
@extends('layouts.app')

@section('content')
<br>
<div class="container">

    <form action="{{ route('sanction.store') }}" method="post" class="form-control"style="width: 60%;margin-left: auto;margin-right: auto">
        @csrf
        <b>
        <div class="mb-3">
            <label for="recipient-name" class="form-label text-success">MOTIF</label>
            <input type="text" class="form-control text-info" placeholder="entrer le motif" name="motif" id="recipient-name">
        </div>
        <div class="mb-3">
            <label for="message-text" class="form-label text-success">OBSERVATION</label>
            <input type="text" name="decision" class="form-control" id="">
        </div>
        <div class="">
            <label for="type_cont" class="form-label text-success">IDENTIFIANT EMPLOYE</label>
            <select class="form-select" name="identifiant">
                <option value="" class="text-danger"><b></b></option>
                @foreach ($donnee  as $contrats)
                <option >{{ $contrats->id }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="register" class="btn btn-primary">
        <p></p>
    </form>

</div>
@endsection

