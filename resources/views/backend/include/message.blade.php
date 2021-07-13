@if (Session::has('message'))

<div class="alert alert-success" role="alert">
    <h4 class="alert-heading"></h4>
    <p>{{Session::get('message')}}</p>
    <p class="mb-0"></p>
</div>

@endif