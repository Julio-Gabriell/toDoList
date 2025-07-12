@extends('layouts.app')

@section("content")
    <section>
        <div class="row">
            <div class="col-md-6">
                <div class="p-5">
                    <h1 class="display-2 text-body">Organize suas</h1>
                    <h1 class="display-2 text-destaque">Tarefas</h1>
                    <p class="text-body fs-4 py-2">Organize o seu dia da melhor forma, crie suas atividades de forma rápida
                        e simples</p>
                    <a class="btn btn-lg text-white bg-destaque" href="{{ route('login') }}">Faça seu login</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('Assets/Imgs/undraw_to-do-list_dzdz.svg') }}" height="550" width="550" alt="">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container px-4 py-5" id="hanging-icons">
            <h2 class="pb-2 border-bottom border-destaque ">Funcionalidades</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                <div class="col d-flex align-items-start">
                    <div>
                        <h3 class="fs-2 text-body-emphasis"><i class="fa-solid fa-calendar fa-sm text-destaque"></i>
                            Planejamento Diário</h3>
                        <p>Crie, organize e visualize suas tarefas diárias de forma prática. Ideal para manter o controle
                            das atividades e otimizar sua rotina.</p>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div>
                        <h3 class="fs-2 text-body-emphasis"><i class="fa-solid fa-envelope fa-sm text-destaque"></i>
                            Lembretes</h3>
                        <p>Ative lembretes para não esquecer prazos importantes. O sistema envia notificações para garantir
                            que você esteja sempre no controle das suas responsabilidades.
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div>
                        <h3 class="fs-2 text-body-emphasis"><i
                                class="fa-solid fa-square-poll-vertical fa-sm text-destaque"></i>
                            Relatórios de Progresso</h3>
                        <p>Visualize estatísticas sobre suas tarefas concluídas, pendentes e em andamento. Acompanhe seu
                            desempenho e melhore sua produtividade com base em dados reais.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid p-0">
        <footer class="">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <img src="{{ asset('Assets/Imgs/logo.png') }}" height="150" width="150" alt="">
                </div>
                <div class="col-6 col-md-2 mb-3">
                    <h5>Redes Sociais</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body"><i class="fa-brands fa-instagram text-destaque"></i> Instagram</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body"><i class="fa-brands fa-facebook text-destaque"></i> Facebook</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body"><i class="fa-brands fa-whatsapp text-destaque"></i> WhatsApp</a></li>
                        </ul>
                </div>
                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5>Entre em contato</h5>
                        <p>Tem alguma dúvida ou sugestão? deixe seu email e nosso suporte entrara em contato</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2"> <label for="newsletter1"
                                class="visually-hidden">Email</label> <input id="newsletter1" type="email"
                                class="form-control" placeholder="Email address"> <button class="btn bg-destaque text-white"
                                type="button">Envie</button> </div>
                    </form>
                </div>
            </div>
            <div class="border-top">
            </div>
        </footer>
    </section>
@endsection