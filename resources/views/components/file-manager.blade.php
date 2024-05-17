<div class="card">
    <div class="card-header">
        File Manager
    </div>
    <div class="card-body">
        {{-- <div class="form-group">
            <label for="stage">Select Stage:</label>
            <select id="stage" class="form-control" onchange="updateFileManagerUrl()">
                @foreach($stages as $stage)
                    <option value="{{ $stage }}" {{ $selectedStage == $stage ? 'selected' : '' }}>{{ $stage }}</option>
                @endforeach
            </select>
        </div>
        <iframe id="fileManagerIframe" src="/laravel-filemanager?project={{ $projectName }}&stage={{ $selectedStage }}"></iframe> --}}
        <div>
            <iframe src="{{ route('unisharp.lfm.show') }}?working_dir={{ $projectName }}" style="width: 100%; height: 600px; border: none;"></iframe>
        </div>
    </div>
</div>

{{-- <script>
    function updateFileManagerUrl() {
        const selectedStage = document.getElementById('stage').value;
        const iframe = document.getElementById('fileManagerIframe');
        const newUrl = `/laravel-filemanager?project={{ $projectName }}&stage=${selectedStage}`;
        iframe.src = newUrl;
    }
</script> --}}