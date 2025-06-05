<section class="mb-5">
    <header class="mb-4">
        <h2 class="fs-5 fw-semibold text-body">
            {{ __('Informações do Perfil') }}
        </h2>
        <p class="text-muted small">
            {{ __("Atualize o nome e o e-mail da sua conta.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <!-- Nome -->
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Nome') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                   name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                   name="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="small text-dark">
                        {{ __('Seu endereço de email não está verificado.') }}
                        <button form="send-verification" class="btn btn-link p-0 align-baseline small">
                            {{ __('Clique aqui para reenviar o email de verificação.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-success py-2 px-3 small mt-2 mb-0" role="alert">
                            {{ __('Um novo link de verificação foi enviado para seu email.') }}
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <!-- Botão Salvar -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">
                {{ __('Salvar') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-muted small m-0"
                >{{ __('Salvo.') }}</p>
            @endif
        </div>
    </form>
</section>
