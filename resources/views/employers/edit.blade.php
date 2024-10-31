@extends('layouts.tamplate')

@section('content')

    <h1 class="app-page-title">Employers</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Modififier</h3>
            <div class="section-intro">Modifier un Employer</div>
        </div>
        <div class="col-12 col-md-4">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{route('employer.update', $employer->id)}}">

                        @csrf

                        @method('PUT')

                        <label for="setting-input-1" class="form-label">Departement</label>
                        <div class="mb-3">

                            <select name="departement_id" id="departement_id" class="control form">
                                @foreach($departements as $departement)
                                    <option value=""></option>
                                    <option value="{{$departement->id}}"
                                    {{$employer->departement_id ===$departement->id ? 'selected':''}}>{{$departement->name}}</option>
                                @endforeach
                            </select>
                            @error('departement_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Nom<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content=""><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
  <circle cx="8" cy="4.5" r="1"/>
</svg></span></label>
                            <input type="text" class="form-control" id="setting-input-2" placeholder="Entrer le Nom" name="first_name" value="{{$employer->nom}}"
                                   required>
                        </div>

                        @error('first_name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror

                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Prénoms</label>
                            <input type="text" class="form-control" id="setting-input-3"  placeholder="Entrer le Prénom" name="last_name" value="{{$employer->prenom}}" required>
                        </div>
                        @error('last_name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror

                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Contact</label>
                            <input type="text" class="form-control" id="setting-input-4" name="contact" placeholder="Enter le Contact" value="{{$employer->contact}}" required>
                        </div>

                        @error('contact')
                        <div class="text-danger">{{$message}}</div>
                        @enderror

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Email</label>
                            <input type="email" class="form-control" id="setting-input-5" name="email" placeholder="Entrer le Email" value="{{$employer->email}}" required>
                        </div>

                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror


                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Sexe</label>
                            <input type="sexe" class="form-control" id="setting-input-5" name="sexe" placeholder="Préciser le sexe" value="{{$employer->sexe}}" required>
                        </div>

                        @error('sexe')
                        <div class="text-danger">{{$message}}</div>
                    @enderror

                </div>


                <div class="mb-3">
                    <label for="setting-input-3" class="form-label">Montant journalier</label>
                    <input type="number" class="form-control" id="setting-input-5" name="montant_journalier" placeholder="Entrer le Montant journalier" value="{{$employer->montant_journalier}}" required>
                </div>

                @error('montant_journalier')
                <div class="text-danger">{{$message}}</div>
                @enderror


                @error('montant_journalier')
                <div class="text-danger">{{$message}}</div>
                @enderror

                <button type="submit" class="btn app-btn-primary" >Modifier</button>
                </form>
            </div><!--//app-card-body-->

        </div><!--//app-card-->
    </div>
    </div><!--//row-->


@endsection
