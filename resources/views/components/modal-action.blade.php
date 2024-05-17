@props(['action', 'data'])

<div class="modal-dialog modal-dialog-centered">
    <form id="form-action" action="{{ $action }}" method="post">
        @csrf
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Crear Evento</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            {{ $slot }}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            {{-- <button type="submit" id="btn-event" class="btn btn-dark custom-button">Guardar</button> --}}
            <x-adminlte-button class="" id="btn-event" type="submit" label="Guardar" theme="" icon="fas fa-lg fa-save"/>
        </div>
        </div>
    </form>
  </div>
