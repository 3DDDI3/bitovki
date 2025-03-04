<div class="all-news__main-card border-block">
    @if (!empty($user))
        <span class="bi-pencil-square edit" data-id="{{ $id }}" data-url="{{ $url }}"></span>
    @endif
    <img src="/public/{{ $image }}" alt="Фотография новости" class="all-news__main-img">
    <div class="all-news__card-content">
        <p class="news__card-date gray-text">{{ $date }}</p>
        <h2 class="all-news__main-title">{{ $title }}</h2>
        <a href="{{ route('page.new', ['url' => $id]) }}" class="all-news__btn progect-btn">Подробнее</a>
    </div>
</div>
