<?php

//search
Breadcrumbs::for('search', function ($trail) {
    $trail->push('Поиск', route('search'));
});

//static
    Breadcrumbs::for('page', function ($trail, $object) {
        $trail->push($object->title, route('page.index', ['page' => $object->url]));
    });
//static end


//catalog
Breadcrumbs::for('catalog', function ($trail, $object) {
    $trail->push($object->name, route('catalog.index', ['url' => $object->url]));
});

Breadcrumbs::for('catalog_single', function ($trail, $object, $parent) {
    if ($parent)
        $trail->parent('catalog' , $parent);
    $trail->push($object->name, route('catalog.single', ['product' => $object->url]));
});

Breadcrumbs::for('promo', function($trail, $object){
    $trail->push($object->title, route('promo', ['promo' => $object->url]));
});
//catalog end

//tests
Breadcrumbs::for('test', function ($trail, $object, $page) {
    $trail->parent('page', $page);
    $trail->push($object->name, route('tests.introduction', ['test' => $object->url]));
});
//tests end

Breadcrumbs::for('ratings', function ($trail, $object, $catalog_link) {
    $trail->push('Все игры', $catalog_link);
    $trail->push($object->name, route('ratings', ['url' => $object->url]));
});
