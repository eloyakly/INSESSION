@extends('layouts.app')

@section('sidebar')
    @include('chat.partials.sidebar')
@endsection

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; text-align: center; color: var(--color-texto-secundario);">
        <div style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-primario);">💬</div>
        <h3 style="font-size: 1.5rem; font-weight: 500; color: var(--color-texto); margin-bottom: 0.5rem;">Bienvenido a Insesion</h3>
        <p>Selecciona un chat en la lista de la izquierda para comenzar una conversación.</p>
    </div>
@endsection
