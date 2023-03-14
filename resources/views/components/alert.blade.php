@if (session()->has('success'))
    <div class="alert alert-success mt-2" role="alert">
        {{ session()->get('success') }}
    </div>
@elseif(session()->has('delete'))
    <div class="alert alert-danger mt-2" role="alert">
        {{ session()->get('delete') }}
    </div>
@elseif(session()->has('update'))
    <div class="alert alert-success mt-2" role="alert">
        {{ session()->get('update') }}
    </div>
@endif