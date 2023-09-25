@extends('layouts.app')

@section('content')
 <div class="container">
    <p></p>
    <div class="row ">
        <b>
            <div class="d-flex">
                <main class="text-success">LISTE DES DEMANDES DE PERMISSION DES EMPLOYES</main>
            </div>
        </b><p></p>
        <br>
        <table class="table">

            <tr class="table-info">
                <th class="text-success">NOM</th>
                <th class="text-success">PRENOM</th>
                <th class="text-success">EMAIL</th>
                <th class="text-success">MOTIF</th>
                <th class="text-success">DATE DE PERMISSION</th>
                <th class="text-success">Action</th>
            </tr>


            @forelse ($modele as $modele)
                <tr>
                    <td class="text-success">{{ $modele->employe->nom }}</td>
                    <td class="text-success">{{ $modele->employe->prenom }}</td>
                    <td class="text-success">{{ $modele->email }}</td>
                    <td class="text-success">{{ $modele->motif }}</td>
                    <td class="text-success">{{ $modele->created_at->format('d-m-y')}}</td>
                    <td class="text-success">
                        <dt class="d-flex">
                            <main>
                                                            <!-- Bouton "Avis" avec formulaire de modal -->
                            <button type="button" data-bs-toggle="modal" data-bs-target="#emailModal{{ $modele->id }}" class="btn btn-primary">Avis</button>

                            <!-- Modal pour l'envoi de l'e-mail -->
                            <div class="modal fade" id="emailModal{{ $modele->id }}" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel{{ $modele->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="emailModalLabel{{ $modele->id }}">Envoyer un e-mail à {{ $modele->employe->nom }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('permissionEmploye.sendEmail') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $modele->id }}">
                                                <div class="form-group">
                                                    <label for="message">Message :</label>
                                                    <textarea name="message" id="message" rows="3" class="form-control"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Envoyer</button>
                                            </form>
                                            <form action="{{ route('send-email') }}" method="POST">
                                                @csrf
                                                <textarea name="text" placeholder="Saisissez votre texte"></textarea>
                                                <select name="email_id">
                                                    @foreach ($emails as $email)
                                                        <option value="{{ $email->id }}">{{ $email->email }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit">Envoyer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </main>
                            <!-- Bouton "Supprimer" avec formulaire de suppression -->
                            <form action="{{ route('permissionEmploye.destroy', $modele->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </dt>
                    </td>
                </tr>
                @empty
                    <span>Aucune permission pour cet Employé</span>
                @endforelse
        </table>
    </div>
 </div>
@endsection

