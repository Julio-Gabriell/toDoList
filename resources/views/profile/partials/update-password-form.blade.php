<section class="mb-5">
    <header class="mb-4">
        <h2 class="fs-5 fw-semibold text-body">
            {{ __('Atualizar Senha') }}
        </h2>
        <p class="text-muted small">
            {{ __('Use uma senha longa e aleatória para manter sua conta segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <!-- Senha Atual -->
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Senha Atual') }}</label>
            <input type="password" class="form-control @if ($errors->updatePassword->has('current_password')) is-invalid @endif"
                   id="update_password_current_password" name="current_password" autocomplete="current-password">
            @if ($errors->updatePassword->has('current_password'))
                <div class="invalid-feedback">
                    {{ $errors->updatePassword->first('current_password') }}
                </div>
            @endif
        </div>

        <!-- Nova Senha -->
        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('Nova Senha') }}</label>
            <input type="password" class="form-control @if ($errors->updatePassword->has('password')) is-invalid @endif"
                   id="update_password_password" name="password" autocomplete="new-password">
            @if ($errors->updatePassword->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->updatePassword->first('password') }}
                </div>
            @endif
        </div>

        <!-- Confirmação de Senha -->
        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirmar Senha') }}</label>
            <input type="password" class="form-control @if ($errors->updatePassword->has('password_confirmation')) is-invalid @endif"
                   id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password">
            @if ($errors->updatePassword->has('password_confirmation'))
                <div class="invalid-feedback">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <!-- Botão Salvar -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">
                {{ __('Salvar') }}
            </button>

            @if (session('status') === 'password-updated')
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
