<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-left" id="tituloModal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="formCliente">
          <div class="row mx-0 mb-4">
            <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" id="inputId">
              </div>
                <label for="input_cpf">CPF</label>
                <input type="text" class="form-control" id="input_cpf">
                <label for="input_name">Nome</label>
                <input type="text" class="form-control" id="input_name">
                <label for="input_birthdate">Data Nascimento</label>
                <input type="text" class="form-control" id="input_birthdate">
                <label for="input_gender">Genero</label>
                <input type="text" class="form-control" id="input_gender">
                <label for="input_address">Endereço</label>
                <input type="text" class="form-control" id="input_address">
                <label for="input_state">Estado</label>
                <input type="text" class="form-control" id="input_state">
                <label for="input_city">Cidade</label>
                <input type="text" class="form-control" id="input_city">
            </div>
          </div>

          <div class="row mx-0">
            <button type="button" class="btn btn-primary" id="salvarClient">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  @push('js')
  <script>
    $('#formCliente').submit(function(event) {
      event.preventDefault()
    })
  </script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  flatpickr("#input_birthdate", {
    dateFormat: "d/m/Y",
    locale: "es",
  });
</script>
@endpush