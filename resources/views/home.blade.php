@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section id="home">
        <h1>Cadastro de Clientes</h1>

        <a class="btn success" href="{{ route('client.create') }}" title="Novo cliente">
            Novo cliente
        </a>

        @if (count($clients) > 0)
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome completo</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td><strong>{{ $client->id }}</strong></td>
                        <td>
                            <img src="/storage/{{ $client->photo }}" alt="Foto" />
                            <strong>{{ $client->name }}</strong>
                        </td>
                        <td><a class="mail" href="mail:{{ $client->email }}">{{ $client->email }}</a></td>
                        <td>{{ $client->phone }}</td>
                        <td>
                            <a href="{{ route('client.show', ['id' => $client->id]) }}">Editar</a>
                            <a href="{{ route('client.destroy', ['id' => $client->id]) }}">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <div style="margin-top: 1rem;">
                Não foram encontrados registros.
            </div>
        @endif
    </section>
@endsection
