<ul class="agency-useful-links__menu menu">
    @foreach ($attributes->get('pages') as $page)
        <li class="agency-useful-links__item menu__item">
            <a href="/pages/{{ $page->attachedPage()->first()->url }}"
                class="agency-useful-links__link menu__link">{{ $page->attachedPage()->first()->title }}</a>
        </li>
    @endforeach
</ul>
