@php
    $access = false;
    if (!$all) {
        $rights = auth()->user()->user_class->rights()->where('type', 'read')->get();

        if ($rights) {
            foreach ($rights as $right) {
                $right_url = route('admin.' . $right->path . '.index');
                if (mb_stripos($right_url, $url)) {
                    $access = true;
                    break;
                }
            }
        }
    }
    // var_dump($right_url, $access);
@endphp
@if ($access || $all)
    <div class="admin_nav_group" style="{{ $attributes->get('style') }}" data-url="{{ $url }}">
        <div class="admin_nav_title js-admin_nav_title">{{ $title }}</div>
        <div
            class="admin_nav_pages {{ Request::is('*/' . $url . '/*') ? 'admin_nav_pages_show' : '' }} js-admin_nav_pages">
            {{ $slot }}
        </div>
    </div>
@endif
