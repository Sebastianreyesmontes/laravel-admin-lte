<x-modal action="{{ route('projects.addMembers', ['id' => $project->id]) }}">
    <div class="modal-body">
        <!-- Aquí puedes incluir el formulario o contenido para agregar miembros -->
        <!-- Por ejemplo, un campo para seleccionar usuarios -->
        <div class="form-group">
            <label for="members">Seleccionar Miembros</label>
            <select name="members[]" id="members" class="form-control" multiple>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</x-modal>

