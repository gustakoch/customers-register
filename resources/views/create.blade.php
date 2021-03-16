@extends('layouts.app')

@section('title', 'Create')

@section('content')
    <section id="create">
        <h1>Novo cliente</h1>

        <form method="POST" enctype="multipart/form-data" action="{{ route('client.store') }}">
            @csrf

            <div class="input-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" placeholder="Informe o nome" autocomplete="off" value="{{ old('name') }}" />
            </div>
            @error('name')
                <span class="alert">{{ $message }}</span>
            @enderror

            <div class="input-group">
                <label for="photo">Foto:</label>
                <input type="file" name="photo" />
            </div>
            @error('photo')
                <span class="alert">{{ $message }}</span>
            @enderror

            <div class="input-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" placeholder="Informe o e-mail" autocomplete="off" value="{{ old('email') }}" />
            </div>
            @error('email')
                <span class="alert">{{ $message }}</span>
            @enderror

            <div class="input-group">
                <label for="phone">Telefone:</label>
                <input type="text" name="phone" placeholder="Informe o telefone" autocomplete="off" value="{{ old('phone') }}" />
            </div>
            @error('phone')
                <span class="alert">{{ $message }}</span>
            @enderror

            <div class="button-group">
                <a class="btn delete" href="{{ route('client.index') }}">Cancelar</a>
                <input class="btn success" type="submit" value="Salvar cliente" />
            </div>
        </form>
    </section>
@endsection
