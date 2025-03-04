<div class="all-news__card border-block gray-background">
    @if (!empty($user))
        <span class="bi-pencil-square edit" data-id="{{ $id }}" data-url="{{ $url }}"></span>
    @endif
    <img src="/public/{{ $image }}" alt="Фотография врачей" class="all-news__card-img">
    <div class="all-mew__card-text">
        <p class="news__card-date gray-text">{{ $date }}</p>
        <h3 class="news__card-title">{{ $title }}</h3>
        <p class="news__card-desc item-text">{{ $description }}</p>
        <a href="{{ route('page.new', ['url' => $id]) }}" class="all-news__btn progect-btn">Подробнее</a>
    </div>
</div>
