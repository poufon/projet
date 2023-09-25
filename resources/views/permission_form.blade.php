 @extends('layouts.app')

@section('content')
    <div class="container"><p></p>
        <form action="{{ route('permission.store') }}" method="post">
            @csrf

            <div class="">
                <label for="type_cont" class="text-dark">IDENTIFIANT EMPLOYE</label>
                <select class="form-select" name="identifiant">
                    <option value="" disabled selected><b>Selectionner l'identifiant de l'employé</b></option>
                    @foreach ($employe  as $contrats)
                    <option >{{ $contrats->id }}</option>
                    @endforeach
                </select>
              </div>
        <P></P>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">email</label>
            <input type="text" class="form-control" placeholder="entrer votre email" name="email" >
        </div>
        <div class="mb-3">
            <label for="message-text" class="col-form-label">motif</label>
            <textarea class="form-control" name="motif" id=""></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="register">
        </form>
    </div>
@endsection
