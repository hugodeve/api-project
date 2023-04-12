@extends('layouts.app', ['activePage' => 'client', 'titlePage' => __('Clientes')])

@section('subheaderTitle')
  Administrativo
@endsection

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="col-12 text-right">
        <button type="button" class="btn" id="novoCliente">+ Novo Cliente</button>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Administrativo</h4>
              <p class="card-category">Clientes</p>
            </div>
            <div class="card-body">
              <table class="table" id="clientTbl">
                <thead>
                  <tr>
                    <th class="text-primary font-weight-bold" style="width:auto">CPF</th>
                    <th class="text-primary font-weight-bold" style="width:auto">Nome</th>
                    <th class="text-primary font-weight-bold" style="width:auto">Data Aniversario</th>
                    <th class="text-primary font-weight-bold" style="width:auto">Genero</th>
                    <th class="text-primary font-weight-bold" style="width:auto">Endereço</th>
                    <th class="text-primary font-weight-bold" style="width:auto">Estado</th>
                    <th class="text-primary font-weight-bold" style="width:auto">Cidade</th>
                    <th class="text-primary font-weight-bold text-center" style="width:5%">Ação</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('clients.modal')
@endsection



@push('js')

<script>
$(document).ready(function() {
  // DataTable initialization
 let table = $('#clientTbl').DataTable({
    columns: [
      { data: "cpf" },
      { data: "name" },
      { data: "birthdate" },
      { data: "gender" },
      { data: "address" },
      { data: "state" },
      { data: "city" },
      {
        data: null,
        className: "text-center",
        render: function (data, type, row, meta) {
          let editButton = `<button type="button" class="btn btn-warning btn-sm editAction" data-id="${data.id}"><i class="material-icons">edit</i></button>`;
          let deleteButton = `<button type="button" class="btn btn-danger btn-sm deleteAction" data-id="${data.id}"><i class="material-icons">delete</i></button>`;
          return editButton + deleteButton;
        }
      }
    ],
    language: {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
      },
    columnDefs: [
      { targets: 1, orderable: false },
    ],
    ajax: {
      url: '{{ route("cliente.lista") }}',
      type: 'GET',
      dataType: 'json',
      dataSrc: function (response) {
        return response.data;
      }
    },
  
  });
  
  // Open Modal New
  $('#novoCliente').on('click', function () {
    $('#modalCliente').modal('show');
    $('#tituloModal').text("Novo Cliente");
    $('#formCliente')[0].reset();
  });

  let isEditing = false;

$('body').on('click', '#salvarClient', function () {
  const JSONRequest = {
    cpf: $("#input_cpf").val(),
    name: $("#input_name").val(),
    birthdate: $("#input_birthdate").val(),
    gender:$("#input_gender").val(),
    address: $("#input_address").val(),
    state: $("#input_state").val(),
    city: $("#input_city").val()
  };

  let url = '{{ url("/api/cliente") }}';
  let type = 'POST';
  if (isEditing) {
    url += '/' + $('#inputId').val();
    type = 'PUT';
  }
  $.ajax({
    url: url,
    type: type,
    dataType: 'json',
    data: JSON.stringify(JSONRequest),
    contentType: 'application/json',
    success: function(data) {
      $('#modalCliente').modal('hide');
      table.ajax.reload();
      isEditing = false; // Resetear la variable isEditing
    },
    error: function(xhr, textStatus, errorThrown) {
      // Tu código de error aquí
    }
  });
});

$('body').on('click', '.editAction', function () {
  let id = $(this).data('id');

  isEditing = true; // Establecer la variable isEditing en true

  $.ajax({
    url: '{{ url("/api/cliente") }}/' + id,
    type: 'PUT',
    dataType: 'json',
    success: function(response) {
      $('#modalCliente').modal('show');
      $('#tituloModal').text("Editar Cliente");
      $('#inputId').val(response.data.id);
      $('#input_cpf').val(response.data.cpf);
      $('#input_name').val(response.data.name);
      var birthdate = new Date(response.data.birthdate);
      var day = birthdate.getDate();
      var month = birthdate.getMonth() + 1;
      var year = birthdate.getFullYear();
      var formattedDate = (day < 10 ? '0' + day : day) + '/' + (month < 10 ? '0' + month : month) + '/' + year;
      $('#input_birthdate').val(formattedDate);
      $('#input_gender').val(response.data.gender);
      $('#input_address').val(response.data.address);
      $('#input_state').val(response.data.state);
      $('#input_city').val(response.data.city);
    },
    error: function(xhr, status, error) {
      alert("No se pudo cargar el cliente.");
    }
  });
});
  // Delete
  $('body').on('click', '.deleteAction', function () {
    let id = $(this).data('id');

    $.ajax({
      url: '{{ url("/api/cliente") }}/' + id,
      type: 'DELETE',
      dataType: 'json',
      success: function(data) {
      table.ajax.reload();
  },
  });
  });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  flatpickr(".date", {
    dateFormat: "d/m/Y",
    locale: "pt",
  });
</script>
@endpush
