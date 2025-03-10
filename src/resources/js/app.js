import $ from 'jquery';
import 'slick-carousel';
import Inputmask from "inputmask";

window.$ = $;


$(document).ready(function () {
  Inputmask("+7(999) 999-99-99", {
    placeholder: "-",
    greedy: false,
    casing: "upper",
    jitMasking: true
  }).mask('.phone_number_input');
  Inputmask("+7(999) 999-99-99", {
    placeholder: "-",
    greedy: false,
    casing: "upper",
    jitMasking: true
  }).mask('.input_modal.first');
})

$(".single-item").slick({
  dots: true,
  infinite: true,
  speed: 500,
  slidesToShow: 1,
  slidesToScroll: 1,
});


$(".multiple-reviews").slick({
  dots: true,
  infinite: true,
  speed: 500,
  slidesToShow: 4,
  slidesToScroll: 4,
  centerMode: true,
  responsive: [
    {
      breakpoint: 1300,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        centerMode: true,
        dots: true
      }
    },
    {
      breakpoint: 1050,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        centerMode: true,
      }
    },
    {
      breakpoint: 650,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        centerMode: true,
        dots: true
      }
    },
  ]
});

if ($(window).width() >= 1024) {
  $(".multiple-items").slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 2,
    slidesToScroll: 2
  })
};

if ($(window).width() <= 1024) {
  $(".multiple-items").slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1
  })
};

$(".button_hidden_text").click(function () {
  $(this).parents(".block_eight_element").find(".block_eight_hidden_text").css({ "display": "block" });
  $(this).parents(".block_eight_element").find(".button_hidden_text").css({ "display": "none" });
  $(this).parents(".block_eight_element").find(".hidden_button_text").css({ "display": "block" });
  var el = $(this).parents(".block_eight_element").find('.block_eight_hidden_text'),
    curHeight = el.height(),
    autoHeight = el.css('height', 'auto').height();

  el.height(curHeight).animate({
    height: autoHeight,
  }, 300, function () {
  });
});

$(".hidden_button_text").click(function () {
  $(this).parents(".block_eight_element").find(".button_hidden_text").css({ "display": "block" });
  $(this).parents(".block_eight_element").find(".block_eight_hidden_text").animate({
    height: 0,
  }, 300, function () {
    $(this).parents(".block_eight_element").find(".block_eight_hidden_text").css({ "display": "none" });
  });
  $(this).parents(".block_eight_element").find(".hidden_button_text").css({ "display": "none" });
});

$(".catalog_button").click(function () {
  $(".catalog_card_hidden").css({ "display": "block" });
  $('.slider').slick('setPosition');
  $(".catalog_button").css({ "display": "none" });
  $(".catalog_button_hidden").css({ "display": "block" });
  var el = $('.catalog_card_hidden'),
    curHeight = el.height(),
    autoHeight = el.css('height', 'auto').height();
  el.height(curHeight).animate({
    height: autoHeight,
  }, 1000, function () {
  });
})
$(".catalog_button_hidden").click(function () {
  $(".catalog_card_hidden").animate({
    height: 0,
  }, 1000, function () {
    $(".catalog_card_hidden").css({ "display": "none" });
    $(".catalog_button_hidden").css({ "display": "none" });
    $(".catalog_button").css({ "display": "block" });
  });
});

$(".burger_menu_show").click(function () {
  $(".burger_menu_list").css({ "display": "block" });
  $(".burger_menu_show").css({ "display": "none" });
  $(".burger_menu_hidden").css({ "display": "block" });
  $(".header_background").css({ "background": "none" });
  $(".menu").css({ "background": "rgba(40, 39, 44, 1)" });
  $("header").css({ "overflow": "visible" });
  $(".header_background").css({ "transform": "scale(1)" });
  $(".header_background").css({ "filter": "blur(0)" });
});
$(".burger_menu_hidden").click(function () {
  $(".burger_menu_list").css({ "display": "none" });
  $(".burger_menu_show").css({ "display": "block" });
  $(".burger_menu_hidden").css({ "display": "none" });
  $(".header_background").css({ "background": "url('uploads/ea665377d8e1fae87c98bb9b0f0b88f8.jfif')" });
  $(".menu").css({ "background": "none" });
  $("header").css({ "overflow": "hidden" });
  $(".header_background").css({ "transform": "scale(1.2)" });
  $(".header_background").css({ "filter": "blur(25px)" });
});
$(".burger_link").click(function () {
  $(".burger_menu_list").css({ "display": "none" });
  $(".burger_menu_show").css({ "display": "block" });
  $(".burger_menu_hidden").css({ "display": "none" });
  $(".header_background").css({ "background": "url('uploads/ea665377d8e1fae87c98bb9b0f0b88f8.jfif')" });
  $(".menu").css({ "background": "none" });
  $("header").css({ "overflow": "hidden" });
  $(".header_background").css({ "transform": "scale(1.2)" });
  $(".header_background").css({ "filter": "blur(25px)" });
});
$(".card_about").click(function (e) {
  e.preventDefault();
  let t = window.scrollY + 50;
  // $(".catalog_modal").css({"top":t});
  $("body").css({ "scrollbar-gutter": "auto" });
  $("body").css({ "overflow": "hidden" });
  $(".catalog_modal").css({ "display": "block" });
  $('input').blur();
});
$("#button_modal").click(function (e) {
  e.preventDefault();
  let t = window.scrollY;
  let s = window.innerHeight / 2 - 50;
  $(".success_modal").css({ "top": t + s });
  $("body").css({ "scrollbar-gutter": "stable" });
  $("body").css({ "overflow": "hidden" });
  $(".catalog_modal").css({ "display": "none" });
  window.success_modal.showModal();
});
$(".modal_exit").click(function () {
  window.success_modal.close();
  $("body").css({ "scrollbar-gutter": "auto" });
  $("body").css({ "overflow": "auto" });
});
$(".modal_exit_white").click(function () {
  window.success_modal.close();
  $("body").css({ "scrollbar-gutter": "auto" });
  $("body").css({ "overflow": "auto" });
});
$(".modal_close").click(function () {
  $(".catalog_modal").css({ "display": "none" });
  $("body").css({ "scrollbar-gutter": "auto" });
  $("body").css({ "overflow": "auto" });
});
$(".modal_close_white").click(function () {
  $(".catalog_modal").css({ "display": "none" });
  $("body").css({ "scrollbar-gutter": "auto" });
  $("body").css({ "overflow": "auto" });
});
$(".krest_white").click(function () {
  $(".catalog_modal").css({ "display": "none" });
  $("body").css({ "scrollbar-gutter": "auto" });
  $("body").css({ "overflow": "auto" });
});
$(".button_form").click(function (e) {
  e.preventDefault();
  let t = window.scrollY;
  let s = window.innerHeight / 2 - 50;
  $(".success_modal").css({ "top": t + s });
  $("body").css({ "scrollbar-gutter": "stable" });
  $("body").css({ "overflow": "hidden" });
  window.success_modal.showModal();
});

