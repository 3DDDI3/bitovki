@php
    $split_url = explode('/', request()->url());
    $currentPage = $split_url[count($split_url) - 1];
@endphp

@if (!empty($route) && !empty($name))
    @php
        $route_url = route($route, false, false);
        $route_url = trim($route_url, '/');
        $access = isset($all) && $all ? true : \App\Helpers\Admin\Helper::checkRights(route($route), 'read');
    @endphp

    @if ($access)
        <a href="{{ route($route) }}" class="{{ $data == $currentPage ? 'active' : '' }}" data-page="{{ $data }}">
            {{ $name }}
        </a>
    @endif
@endif
