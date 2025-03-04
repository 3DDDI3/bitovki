<div class="all-news__card border-block gray-background">
    <span class="bi-pencil-square edit" data-id="45" data-url="admin/main/news"></span>
    <img src="public/{{ $path }}" alt="Фотография врачей" class="all-news__card-img">
    <div class="all-mew__card-text">
        <p class="news__card-date gray-text">{{ $time }}
        </p>
        <h3 class="news__card-title">{{ $title }}</h3>
        <p class="news__card-desc item-text">{!! $text !!}</p>
        <a href="{{ $href }}" class="all-news__btn progect-btn">Подробнее</a>
    </div>
</div>
