@if (session('message') or session('mensaje'))
    <div class="alert alert-success">{{ session('message') }}{{ session('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background-color: #d1e7dd"
            style="border: #66ffba">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('danger'))
    <div class="alert alert-danger">{{ session('danger') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background-color: #f8d7da"
            style="border: #f8d7da>
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
