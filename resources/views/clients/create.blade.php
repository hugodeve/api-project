@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registro de Clientes</h1>
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Data de Nascimento:</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
            </div>
            <div class="form-group">
                <label for="gender">Sexo:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="male">Masculino</option>
                    <option value="female">Feminino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Endereço:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="state">Estado:</label>
                <input type="text" class="form-control" id="state" name="state" required>
            </div>
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="reset" class="btn btn-secondary">Limpar</button>
    </form>
</div>
@endsection