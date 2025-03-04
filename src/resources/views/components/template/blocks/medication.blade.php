<a href="{{ route('page', ['url' => 'medication', 'id' => $id]) }}" class="medecines__card-link">
    <div class="medecines__card card_portfolio">
        <img src="/public/{{ $image }}" alt="" class="medecines__card-img">
        <h2 class="medecines__card-title">{{ $title }}</h2>
        <p class="medecines__card-desc">{{ $subtitle }}</p>
    </div>
</a>
