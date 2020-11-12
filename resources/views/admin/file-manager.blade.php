@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">File Manager</div>

                <div class="card-body">
                <div class="input-group">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {

document.getElementById('button-image').addEventListener('click', (event) => {
  event.preventDefault();

  window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
});
});

// set file link
function fmSetLink($url) {
document.getElementById('image_label').value = $url;
}
</script>
@endsection
