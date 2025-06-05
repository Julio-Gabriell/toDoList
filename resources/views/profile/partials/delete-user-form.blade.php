<section class="mb-5">
    <header class="mb-4">
        <h2 class="fs-5 fw-semibold text-body">
            {{ __('Excluir Conta') }}
        </h2>
        <p class="text-muted small">
            {{ __('Uma vez que sua conta for excluída, todos os recursos e dados serão permanentemente apagados. Antes de excluir sua conta, baixe quaisquer dados que deseje manter.') }}
        </p>
    </header>

    <!-- Botão para abrir modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        {{ __('Excluir Conta') }}
    </button>

    <!-- Modal de confirmação -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ route('profile.destroy') }}" class="modal-content">
                @csrf
                @method('delete')

                <div class="modal-header">
                    <h5 class="modal-title" id="confirmUserDeletionModalLabel">{{ __('Tem certeza que deseja excluir sua conta?') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body">
                    <p class="text-muted">
                        {{ __('Uma vez que sua conta for excluída, todos os seus dados serão permanentemente apagados. Insira sua senha para confirmar a exclusão.') }}
                    </p>

                    <div class="mb-3">
                        <label for="delete_password" class="form-label visually-hidden">{{ __('Senha') }}</label>
                        <input type="password" class="form-control @if ($errors->userDeletion->has('password')) is-invalid @endif"
                               id="delete_password" name="password" placeholder="{{ __('Senha') }}">
                        @if ($errors->userDeletion->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->userDeletion->first('password') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancelar') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Excluir Conta') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>
