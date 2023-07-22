<div class="active tab-pane" id="information">
    <strong><i class="fas fa-envelope mr-1"></i> {{ __('Email') }}</strong>
    <p class="text-muted ml-4">
        {{ $user->email }}
    </p>
    <hr>
    <strong><i class="fas fa-phone mr-1"></i> {{ __('Phone') }}</strong>
    <p class="text-muted ml-4">
        {{ $user->phone }}
    </p>
    <hr>
    <strong><i class="fas fa-address-card mr-1"></i> {{ __('Address') }}</strong>
    <p class="text-muted ml-4">
        {{ $user->address }}
    </p>
</div>
