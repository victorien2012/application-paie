@extends('layouts.tamplate')


@section('content')

    <h1 class="app-page-title">Configurations</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Ajout</h3>
            <div class="section-intro">Ajouter une nouvelle configuration</div>
        </div>
        <div class="col-12 col-md-4">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{route('configurations.store')}}">

                        @csrf

                        @method('POST')

                                                <label for="setting-input-1" class="form-label">configuration</label>

                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Type de la configuration<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content=""><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
  <circle cx="8" cy="4.5" r="1"/>
</svg></span></label>

                                <div>
                                    <select name="type" id="type">
                                        <option value=""></option>
                                        <option value="PAIEMENT_DATE">Date de paiement</option>
                                        <option value="APP_NAME">Nom de l'application</option>
                                        <option value="DEVELOPPER_NAME">Equipe de développement</option>
                                        <option value="ANATHER">Autre option</option>
                                    </select>
                                </div>

                            @error('type')
                            <div class="text-danger">{{$message}}</div>
                            @enderror

                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">valeur<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content=""><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
  <circle cx="8" cy="4.5" r="1"/>
</svg></span></label>


                            <input type="text" class="form-control" id="setting-input-1" placeholder="Entrer la valeur" name="value" value="{{old('value')}}" required>
                        </div>


                        @error('value')
                        <div class="text-danger">{{$message}}</div>
                        @enderror

                        <button type="submit" class="btn app-btn-primary" >Ajouter</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
    </div><!--//row-->


@endsection
