<div class="card ">

    <div class="card-body ">
        @if (!auth()->user()->avatar)
            <img class="mx-auto d-block img-thumbnail rounded-circle" src="/img/default.png" width="130">
        @endif

        @if (auth()->user()->avatar && !auth()->user()->fb_id)
            <img class="mx-auto d-block img-thumbnail rounded-circle" src="{{ Storage::url(auth()->user()->avatar) }}"
                width="130">
        @endif

        @if (auth()->user()->avatar && auth()->user()->fb_id)
            <img class="mx-auto d-block img-thumbnail rounded-circle" src="{{ auth()->user()->avatar }}"
                width="130">
        @endif

        <p class="text-center"><b>{{ auth()->user()->name }}</b></p>
    </div>
    <hr style="border:2px solid blue;">
    <div class="vertical-menu">
        <a href="#">Dashboard</a>
        <a href="{{ route('profile.index') }}" class="{{ request()->is('profile') ? 'active' : '' }}">Profile</a>
        <a href="{{ route('ads.create') }}" class="{{ request()->is('ads/create') ? 'active' : '' }}">Create ads</a>
        <a href="{{ route('ads.index') }}" class="{{ request()->is('ads') ? 'active' : '' }}">Published ads</a>
        <a href="#">Pending ads</a>
        <a href="{{ route('saved.ad') }}" class="{{ request()->is('saved-ads') ? 'active' : '' }}">Saved ads</a>
        <a href="{{ route('messages') }}" class="{{ request()->is('messages') ? 'active' : '' }}">Message</a>
    </div>

</div>
