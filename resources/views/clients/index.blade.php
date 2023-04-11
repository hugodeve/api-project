@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Consulta de Clientes</h1>
        <form action="/api/clients" method="GET">
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf">
            </div>
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="birthdate">Data de Nascimento:</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate">
            </div>
            <div class="form-group">
                <label for="gender">Sexo:</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="">Todos</option>
                    <option value="male">Masculino</option>
                    <option value="female">Feminino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Endereço:</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="state">Estado:</label>
                <input type="text" class="form-control" id="state" name="state">
            </div>
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <button type="submit" class="btn btn-primary">Pesquisa</button>
            <button type="reset" class="btn btn-secondary">Limpar</button>
        </form>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Sexo</th>
                    <th>Endereço</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{{ $client->cpf }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->birthdate->format('d/m/Y') }}</td>
                    <td>{{ $client->gender === 'male' ? 'Masculino' : 'Feminino' }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->state }}</td>
                    <td>{{ $client->city }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection