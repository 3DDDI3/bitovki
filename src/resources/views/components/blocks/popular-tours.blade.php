<div class="popular-tours">
    <img src="{{ asset('images/tours-back1.png') }}" alt="" class="popular-tours__back-img1">
    <img src="{{ asset('images/tours-back2.png') }}" alt="" class="popular-tours__back-img2">
    <div class="popular-tours__wrapper">
        <div class="popular-tours__headding">
            <span class="popular-tours-headding__title">Популярные
                <span class="popular-tours-headding__subtitle">туры</span></span>
            <button class="popular-tours__all-tours" data-href="tours">
                Все туры
                <svg width="17" height="17" viewBox="0 0 17 17" fill="inheri"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_85_100)">
                        <path
                            d="M12.2481 8.27846C12.2404 8.46071 12.1603 8.63517 12.0217 8.77177L5.68846 14.9878C5.60976 15.0647 5.51462 15.1273 5.40846 15.172C5.3023 15.2168 5.1872 15.2429 5.06975 15.2487C4.95229 15.2546 4.83477 15.2401 4.7239 15.2062C4.61302 15.1722 4.51097 15.1195 4.42356 15.0509C4.33616 14.9823 4.26511 14.8992 4.21448 14.8064C4.16384 14.7137 4.13462 14.613 4.12847 14.5101C4.12232 14.4073 4.13936 14.3043 4.17863 14.207C4.2179 14.1097 4.27862 14.0201 4.35733 13.9433L10.1353 8.27019L4.16851 2.79607C4.08724 2.72191 4.02352 2.63441 3.98098 2.53854C3.93843 2.44266 3.91791 2.3403 3.92057 2.2373C3.92324 2.1343 3.94904 2.03268 3.9965 1.93824C4.04396 1.84379 4.11215 1.75837 4.19719 1.68687C4.28222 1.61536 4.38243 1.55915 4.49209 1.52147C4.60175 1.48378 4.71871 1.46535 4.8363 1.46723C4.95389 1.4691 5.0698 1.49125 5.17741 1.5324C5.28503 1.57355 5.38224 1.6329 5.46349 1.70706L12.0037 7.70502C12.0864 7.78112 12.1507 7.87112 12.1927 7.96965C12.2347 8.06818 12.2536 8.17322 12.2481 8.27846Z"
                            fill="inherit" />
                    </g>
                    <defs>
                        <clipPath id="clip0_85_100">
                            <rect width="16" height="16" fill="inherit"
                                transform="matrix(0.999857 -0.0169369 -0.0169369 -0.999857 0.270996 16.2688)" />
                        </clipPath>
                    </defs>
                </svg>
            </button>
        </div>

        <x-sliders.popular-tours :tourStatuses="$attributes->get('tourStatuses')" />
    </div>
    <button data-href="tours" class="popular-tours__mobile-button">Все туры</button>
</div>
