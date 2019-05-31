{{-- @foreach ($errors->all() as $message)
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {{$message}}
    </div>
@endforeach --}}
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
{!! session()->get('success')!!}
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
{!! session()->get('error')!!}
</div>
@endif
