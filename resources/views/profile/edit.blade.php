@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="fw-semibold fs-4 text-dark">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="row justify-content-center g-4">

            <!-- Formulário: Atualizar Informações -->
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Formulário: Atualizar Senha -->
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Formulário: Deletar Conta -->
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection