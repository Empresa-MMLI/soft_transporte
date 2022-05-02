@extends ('layouts.visitor') <!--Call of template welcome-->
@section('content')  <!--Sectino to show content to yield -->
<!-- banner principal -->
<div class="banner-box">
    <div class="container">
           <div class="row">
               <div class="col-8">
               <h1 class="header-title padding-top">
           Pontos de venda e Embarque! 
            </h1>
            <p class="padding-text">
            Confira abaixo, os pontos de Venda e Embarque de suas mercadorias, usando nosso Transporte,
            </p>
               </div>
           </div>
    </div>
</div>
<!-- end banner --> 
<!-- inputs search --> 
<div class="container">
<div class="xpi__content__wrapper xpi__content__wrappergray xpi__content_hero_banner ">
<div class="hero-banner-searchbox">
<div class="
sb-searchbox__outer
" data-sb-outer="">
<form id="frm" method="get" role="search" class="sb-searchbox sb-searchbox--painted sb-searchbox--xp js--sb-searchbox" data-component="search/searchbox/searchbox-xp" data-sb-id="main" data-sb-flags=" AEJPAcBacPONDcFGHT:0 calendar_on_destination_change:1 open_location_in_map_checkbox:1 with_popular_nearby_suggestions:1 can_show_sb_entire_place_checkbox:1 icon_revamp:1 region_second_line:1" data-is-first-visible="1">
<input type="hidden" name="label" value="gen173nr-1FCAEoggI46AdIM1gEaAmIAQGYAS24ARnIAQzYAQHoAQH4AQuIAgGoAgO4ArbIu5MGwAIB0gIkMzllZjkxMzQtNzVhNy00ZTEzLTk0ZDQtZjdmYjJjODEyZTU02AIG4AIB">
<input type="hidden" name="sid" value="a95e71a0cdfe366101bbf14d78c437e0">
<input type="hidden" name="sb" value="1">
<input type="hidden" name="sb_lp" value="1">
<input type="hidden" name="src" value="index">
<input type="hidden" name="src_elem" value="sb">
<input type="hidden" name="error_url" value="https://www.booking.com/index.pt-br.html?label=gen173nr-1FCAEoggI46AdIM1gEaAmIAQGYAS24ARnIAQzYAQHoAQH4AQuIAgGoAgO4ArbIu5MGwAIB0gIkMzllZjkxMzQtNzVhNy00ZTEzLTk0ZDQtZjdmYjJjODEyZTU02AIG4AIB;sid=a95e71a0cdfe366101bbf14d78c437e0;sb_price_type=total&amp;;">
<div class="xp__fieldset js--sb-fieldset accommodation " data-view="accommodation">
<div data-visible="accommodation,flights,rentalcars" class="xp__input-group xp__search" data-destination-input="">
<svg class="bk-icon -iconset-landmark" height="128" style="display:none;" width="128" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><rect x="8" y="106" width="112" height="10" rx="2" ry="2"></rect><path d="M24 60a2 2 0 0 0-2 1.8v34.4a2 2 0 0 0 2 1.8h8a2 2 0 0 0 2-1.8V61.8a2 2 0 0 0-2-1.8zm24 0a2 2 0 0 0-2 1.8v34.4a2 2 0 0 0 2 1.8h8a2 2 0 0 0 2-1.8V61.8a2 2 0 0 0-2-1.8zm24 0a2 2 0 0 0-2 1.8v34.4a2 2 0 0 0 2 1.8h8a2 2 0 0 0 2-1.8V61.8a2 2 0 0 0-2-1.8zm24 0a2 2 0 0 0-2 1.8v34.4a2 2 0 0 0 2 1.8h8a2 2 0 0 0 2-1.8V61.8a2 2 0 0 0-2-1.8zm-85.8-8h107.6a2 2 0 0 0 1.3-3.7L65 12.3a2 2 0 0 0-2.2 0l-53.9 36a2 2 0 0 0 1.3 3.7z"></path></svg>
<svg class="bk-icon -iconset-airplane" height="128" style="display:none;" width="128" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><path d="M8.3 83.1l2.8-2.8a1 1 0 0 1 .7-.3h27.3l16-17.5-41.7-32a4 4 0 0 1-1.1-5.3l1.3-2.8a4 4 0 0 1 5.1-1.6l55.5 21.1L98 16a28.6 28.6 0 0 1 18-8 4 4 0 0 1 4 4 28.6 28.6 0 0 1-8 18L86.6 53.4l21 55.3a4 4 0 0 1-1.6 5.1l-2.7 1.4A4 4 0 0 1 98 114L66 72.3 48 89v27.3a1 1 0 0 1-.3.7l-2.8 2.8a1 1 0 0 1-1.6-.2L30.7 97.3 8.5 84.7a1 1 0 0 1-.2-1.6z"></path></svg>
<svg class="bk-icon -iconset-geo_pin" height="128" style="display:none;" width="128" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><path d="M98.5 42.5a34.5 34.5 0 1 0-64.3 17.2L64 120l29.8-60.3a34.2 34.2 0 0 0 4.7-17.2zM64 59.7a17.2 17.2 0 1 1 17-17 17.2 17.2 0 0 1-17 17z"></path></svg>
<svg class="bk-icon -iconset-bed" height="128" style="display:none;" width="128" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><path d="M120 96v11.8a4.1 4.1 0 0 1-3.6 4.2 4 4 0 0 1-4.4-4v-4H16v3.8a4.1 4.1 0 0 1-3.6 4.2 4 4 0 0 1-4.4-4V96a8 8 0 0 1 8-8h96a8 8 0 0 1 8 8zm-8-16a16 16 0 0 0-16-16H32a16 16 0 0 0-16 16v4h96zM24 36a4 4 0 0 1 4-4h72a4 4 0 0 1 4 4v16l8 8V36a12 12 0 0 0-12-12H28a12 12 0 0 0-12 12v24l8-8z"></path></svg>
<svg class="bk-icon -iconset-skiing" height="128" style="display:none;" width="128" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><path d="M79 29.4L70 22c8.4-8 15.4-4.8 15.4-4.8a5.5 5.5 0 0 1 4.1 5 6 6 0 0 1 0 .8l-1.4 20.2 14.6 11.4a3 3 0 0 1-3.4 4.9L81.7 48.3a3.6 3.6 0 0 1-1.7-2.8V45zM33.6 15.3l36 26a4 4 0 0 0 4.6-6.5l-36-26a4 4 0 0 0-4.6 6.4zM104 24a8 8 0 1 0-8-8 8 8 0 0 0 8 8zM56.9 79a3 3 0 0 0 4.2.2l17.7-16.3a4.2 4.2 0 0 0 .5-.5 3.8 3.8 0 0 0-.7-5.4l-.5-.4L59.6 42a7.5 7.5 0 0 0-.8-.5L54 38a28.8 28.8 0 0 0-4.8 6 7 7 0 0 0 3.2 10l16.9 7.4L56.9 75a3 3 0 0 0 0 4zm61 25.6a4 4 0 0 0-5.4 1.6s-2.5 4.4-6.7 5.5c-2.6.7-5.5 0-8.7-2l-83-53a4 4 0 0 0-4.3 6.7c.7.5 71.4 45.8 83 53.1a20.5 20.5 0 0 0 11 3.5 16 16 0 0 0 4.1-.6 20 20 0 0 0 11.6-9.4 4 4 0 0 0-1.6-5.4z"></path></svg>
<svg class="bk-icon -streamline-bed" height="24" style="display:none;" width="24" viewBox="0 0 24 24" role="presentation" aria-hidden="true" focusable="false"><path d="M2.75 12h18.5c.69 0 1.25.56 1.25 1.25V18l.75-.75H.75l.75.75v-4.75c0-.69.56-1.25 1.25-1.25zm0-1.5A2.75 2.75 0 0 0 0 13.25V18c0 .414.336.75.75.75h22.5A.75.75 0 0 0 24 18v-4.75a2.75 2.75 0 0 0-2.75-2.75H2.75zM0 18v3a.75.75 0 0 0 1.5 0v-3A.75.75 0 0 0 0 18zm22.5 0v3a.75.75 0 0 0 1.5 0v-3a.75.75 0 0 0-1.5 0zm-.75-6.75V4.5a2.25 2.25 0 0 0-2.25-2.25h-15A2.25 2.25 0 0 0 2.25 4.5v6.75a.75.75 0 0 0 1.5 0V4.5a.75.75 0 0 1 .75-.75h15a.75.75 0 0 1 .75.75v6.75a.75.75 0 0 0 1.5 0zm-13.25-3h7a.25.25 0 0 1 .25.25v2.75l.75-.75h-9l.75.75V8.5a.25.25 0 0 1 .25-.25zm0-1.5A1.75 1.75 0 0 0 6.75 8.5v2.75c0 .414.336.75.75.75h9a.75.75 0 0 0 .75-.75V8.5a1.75 1.75 0 0 0-1.75-1.75h-7z"></path></svg>
<svg class="bk-icon -streamline-sports_snowboard" height="24" style="display:none;" width="24" viewBox="0 0 24 24" role="presentation" aria-hidden="true" focusable="false"><path d="M16.941 3.375a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0zm1.5 0a3.375 3.375 0 1 0-6.75 0 3.375 3.375 0 0 0 6.75 0zm-.194 15.837l-1.43-3.337a5.25 5.25 0 0 0-2.482-2.63l-2.252-1.125.354.967 1.07-2.491-1.024.375 6.081 3.042a2.25 2.25 0 1 0 2.012-4.026l-7.5-3.75A2.25 2.25 0 0 0 12.07 6H9.008a.742.742 0 0 1-.584-.28L6.322 3.094c-.705-.977-2.112-1.204-3.119-.476a2.25 2.25 0 0 0-.364 3.318L4.915 8.53a5.224 5.224 0 0 0 4.094 1.97h.783l-.69-1.045-1.353 3.16a2.22 2.22 0 0 0-.183.886v1.757c0 .198-.08.39-.22.53l-1 1a.75.75 0 1 0 1.061 1.06l1-1c.422-.422.658-.993.659-1.589V13.5c0-.101.02-.2.06-.291l1.355-3.164A.75.75 0 0 0 9.792 9h-.784a3.726 3.726 0 0 1-2.921-1.406L3.985 4.97a.75.75 0 1 1 1.144-.967l2.123 2.653A2.24 2.24 0 0 0 9.01 7.5h3.06a.75.75 0 0 1 .336.079l7.5 3.75a.75.75 0 1 1-.67 1.342L13.152 9.63a.75.75 0 0 0-1.024.375l-1.07 2.491a.75.75 0 0 0 .354.967l2.252 1.126a3.751 3.751 0 0 1 1.774 1.878l1.43 3.336a.75.75 0 0 0 1.378-.59zm-7.715-.244A5.205 5.205 0 0 0 11.997 16l-1.076.57 1.41.7a.755.755 0 0 1 .352.376l.767 1.79a.75.75 0 1 0 1.378-.591l-.767-1.791a2.259 2.259 0 0 0-1.06-1.125l-1.413-.702a.75.75 0 0 0-1.077.57 3.703 3.703 0 0 1-1.043 2.112.75.75 0 0 0 1.064 1.058zm10.083 2.974a.75.75 0 0 1-.891.576l-16.131-3.47a.75.75 0 0 1-.576-.89.75.75 0 0 0-1.466-.316 2.25 2.25 0 0 0 1.726 2.673l16.131 3.47a2.25 2.25 0 0 0 2.673-1.727.75.75 0 1 0-1.466-.316z"></path></svg>
<svg class="bk-icon -streamline-landmark" height="24" style="display:none;" width="24" viewBox="0 0 24 24" role="presentation" aria-hidden="true" focusable="false"><path d="M4.5 8.911h3l-.75-.75v9l.75-.75h-3l.75.75v-9l-.75.75zm0-1.5a.75.75 0 0 0-.75.75v9c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-9a.75.75 0 0 0-.75-.75h-3zm6 1.5h3l-.75-.75v9l.75-.75h-3l.75.75v-9l-.75.75zm0-1.5a.75.75 0 0 0-.75.75v9c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-9a.75.75 0 0 0-.75-.75h-3zm6 1.5h3l-.75-.75v9l.75-.75h-3l.75.75v-9l-.75.75zm0-1.5a.75.75 0 0 0-.75.75v9c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-9a.75.75 0 0 0-.75-.75h-3zm4.5 12H3l.75.75v-2.25h16.5v2.25l.75-.75zm0 1.5a.75.75 0 0 0 .75-.75v-2.25a1.5 1.5 0 0 0-1.5-1.5H3.75a1.5 1.5 0 0 0-1.5 1.5v2.25c0 .414.336.75.75.75h18zm-19.5 3h21a.75.75 0 0 0 0-1.5h-21a.75.75 0 0 0 0 1.5zm0-3h21a.75.75 0 0 0 0-1.5h-21a.75.75 0 0 0 0 1.5zm18.75-15.75v2.25H3.75v-2.25l-.415.67L12 1.5l8.665 4.332-.415-.671zm1.5 0a.75.75 0 0 0-.415-.67L12.67.157a1.503 1.503 0 0 0-1.34 0L2.666 4.49a.75.75 0 0 0-.415.671v2.25a1.5 1.5 0 0 0 1.5 1.5h16.5a1.5 1.5 0 0 0 1.5-1.5v-2.25zM3 5.911h18a.75.75 0 0 0 0-1.5H3a.75.75 0 0 0 0 1.5z"></path></svg>
<svg class="bk-icon -streamline-transport_airplane_depart" height="24" style="display:none;" width="24" viewBox="0 0 24 24" role="presentation" aria-hidden="true" focusable="false"><path d="M18.33 3.57L5.7 9.955l.79.07-1.96-1.478a.75.75 0 0 0-.753-.087l-2.1.925C.73 9.856.359 10.967.817 11.88c.11.22.263.417.45.577l3.997 3.402a2.94 2.94 0 0 0 3.22.4l3.62-1.8-1.084-.671v5.587a1.833 1.833 0 0 0 2.654 1.657l1.88-.932a1.85 1.85 0 0 0 .975-1.226l1.87-7.839-.396.498 3.441-1.707a3.494 3.494 0 1 0-3.11-6.259zm.672 1.342a1.994 1.994 0 0 1 1.775 3.571l-3.44 1.707a.75.75 0 0 0-.396.498l-1.87 7.838a.35.35 0 0 1-.185.232l-1.88.932a.335.335 0 0 1-.486-.304V13.79a.75.75 0 0 0-1.084-.672l-3.62 1.8a1.44 1.44 0 0 1-1.578-.197l-3.997-3.402a.35.35 0 0 1 .073-.577l2.067-.91-.754-.087 1.96 1.478a.75.75 0 0 0 .79.07l12.63-6.383zm-3.272.319l-4.46-2.26a1.852 1.852 0 0 0-1.656-.001l-1.846.912a1.85 1.85 0 0 0-.295 3.128l2.573 1.955a.75.75 0 1 0 .908-1.194L8.38 5.816a.35.35 0 0 1 .055-.591l1.845-.912a.351.351 0 0 1 .315 0l4.456 2.256a.75.75 0 0 0 .678-1.338z"></path></svg>
<svg class="bk-icon -streamline-geo_pin" height="24" style="display:none;" width="24" viewBox="0 0 24 24" role="presentation" aria-hidden="true" focusable="false"><path d="M15 8.25a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm1.5 0a4.5 4.5 0 1 0-9 0 4.5 4.5 0 0 0 9 0zM12 1.5a6.75 6.75 0 0 1 6.75 6.75c0 2.537-3.537 9.406-6.75 14.25-3.214-4.844-6.75-11.713-6.75-14.25A6.75 6.75 0 0 1 12 1.5zM12 0a8.25 8.25 0 0 0-8.25 8.25c0 2.965 3.594 9.945 7 15.08a1.5 1.5 0 0 0 2.5 0c3.406-5.135 7-12.115 7-15.08A8.25 8.25 0 0 0 12 0z"></path></svg>
<div data-component="search/destination/input" data-sb-id="main" data-gpf="1" data-required="1" data-flags="" data-open-focus="" data-minlength="1" data-focus-on-typing="1">
<div class="
c-autocomplete
sb-destination
-with-clear
region_second_line
">
<button data-clear="" type="button" class="sb-destination__clear">
<svg aria-hidden="true" class="bk-icon -streamline-close sb-destination__clear-icon" fill="#333333" focusable="false" height="20" role="presentation" width="20" viewBox="0 0 24 24"><path d="M13.31 12l6.89-6.89a.93.93 0 1 0-1.31-1.31L12 10.69 5.11 3.8A.93.93 0 0 0 3.8 5.11L10.69 12 3.8 18.89a.93.93 0 0 0 1.31 1.31L12 13.31l6.89 6.89a.93.93 0 1 0 1.31-1.31z"></path></svg>
</button>
<input type="search" name="ss" id="ss" class="c-autocomplete__input sb-searchbox__input sb-destination__input" placeholder="Para onde você vai?" value="" autocomplete="off" data-component="search/destination/input-placeholder" data-sb-id="main" data-input="" aria-autocomplete="both" aria-label="Por favor, insira seu destino">

<div class="sb-a11y-announcement invisible_spoken" aria-live="polite" aria-atomic="true" style="display: none;"></div>
</div>
<div class="fe_banner fe_banner__accessible fe_banner__red" id="destination__error" role="alert"> <div class="fe_banner__message"> 
<span class="invisible_spoken">Erro: </span>
Por favor, insira um destino para começar a pesquisar.
 </div> </div> 
</div><input type="hidden" name="is_ski_area" value="0">
<div class="search-suggestion recommended-destinations c-autocomplete__list sb-autocomplete__list ">
<h2 class="search-suggestion__title">Tente pesquisar...</h2>
<ul class="search-suggestion__list">
<li class="c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item--city sb-autocomplete__item__item--elipsis" data-ss="Brasília" data-dest-id="-631243" data-dest-type="city" data-dest-latitude="-15.793581216267" data-dest-longitude="-47.8836958408465">
Brasília
</li>
<li class="c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item--city sb-autocomplete__item__item--elipsis" data-ss="São Paulo" data-dest-id="-671824" data-dest-type="city" data-dest-latitude="-23.55065" data-dest-longitude="-46.63338">
São Paulo
</li>
<li class="c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item--city sb-autocomplete__item__item--elipsis" data-ss="Cuiabá" data-dest-id="-639305" data-dest-type="city" data-dest-latitude="-15.59867" data-dest-longitude="-56.09913">
Cuiabá
</li>
</ul>
</div>
</div>
<div data-visible="accommodation,flights,rentalcars" class="xp__dates xp__group">
<div class="xp__dates-inner">
<div data-component="search/dates/dates-errors" data-view-id="accommodation" data-sb-id="main" role="alert" data-dates-errors=""></div>
<div data-visible="accommodation,flights,rentalcars" class="xp__input-group xp__date-time">
<div class="xp__dates-inner xp__dates__checkin">
<div data-visible="accommodation,flights,rentalcars" class="xp__group xp__date c2-wrapper-s-hidden">
<div class="sb-date-field b-datepicker" data-component="search/dates/date-field-select" data-sb-id="main" data-mode="checkin" data-calendar2-type="checkin" data-calendar2-title="Data de entrada">
<div class="sb-searchbox__input sb-date-field__field  -empty sb-date__field-svg_icon" data-field="">
<span class="sb-date-field__icon sb-date-field__icon-btn bk-svg-wrapper calendar-restructure-sb" aria-hidden="true">
<svg aria-hidden="true" class="bk-icon -experiments-calendar sb-date-picker_icon-svg" fill="#BDBDBD" focusable="false" height="20" role="presentation" width="20" viewBox="0 0 128 128"><path d="m112 16h-16v-8h-8v8h-48v-8h-8v8h-16c-4.4 0-8 3.9-8 8.7v86.6c0 4.8 3.6 8.7 8 8.7h96c4.4 0 8-3.9 8-8.7v-86.6c0-4.8-3.6-8.7-8-8.7zm0 95.3a1.1 1.1 0 0 1 -.2.7h-95.6a1.1 1.1 0 0 1 -.2-.7v-71.3h96zm-68-43.3h-12v-12h12zm0 28h-12v-12h12zm26-28h-12v-12h12zm0 28h-12v-12h12zm26 0h-12v-12h12zm0-28h-12v-12h12z" fill-rule="evenodd"></path></svg>
<i class="
sb-date-field__icon-text
sb-date-field__icon-text-wide
" data-icon-day="" data-placeholder="+">+</i>
</span>
<div class="sb-date-field__controls sb-date-field__controls__ie-fix" data-controls="" data-calendar2-cant-touch-this="">
<div class="sb-date-field__select -month-year js-date-field__part" data-type="month-year">
<div class="sb-date-field__select-value" aria-hidden="true">
<span class="js-date-field__value sb-date-field__value_empty" data-placeholder="
Mês de entrada
">
Mês de entrada
</span>
<i class="sb-date-field__select-icon bicon-downchevron"></i>
</div>
<select class="sb-date-field__select-field js-date-field__select" aria-label="
Mês de entrada
" data-no-old-calendar="1"><option value="" disabled="" selected=""></option><option value="4-2022">maio de 2022</option><option value="5-2022">junho de 2022</option><option value="6-2022">julho de 2022</option><option value="7-2022">agosto de 2022</option><option value="8-2022">setembro de 2022</option><option value="9-2022">outubro de 2022</option><option value="10-2022">novembro de 2022</option><option value="11-2022">dezembro de 2022</option><option value="0-2023">janeiro de 2023</option><option value="1-2023">fevereiro de 2023</option><option value="2-2023">março de 2023</option><option value="3-2023">abril de 2023</option><option value="4-2023">maio de 2023</option><option value="5-2023">junho de 2023</option><option value="6-2023">julho de 2023</option><option value="7-2023">agosto de 2023</option></select>
<input type="hidden" class="js-date-field__year" name="checkin_year" value="">
<input type="hidden" class="js-date-field__month" name="checkin_month" value="">
</div>
<div class="sb-date-field__select -day js-date-field__part sb-date-field__select_disabled" data-type="date">
<div class="sb-date-field__select-value" aria-hidden="true">
<span class="js-date-field__value sb-date-field__value_empty" data-placeholder="
Dia de entrada
">
Dia de entrada
</span>
<i class="sb-date-field__select-icon bicon-downchevron"></i>
</div>
<select class="sb-date-field__select-field js-date-field__select" name="checkin_monthday" data-selected="" aria-label="
Dia de entrada
" data-no-old-calendar="1" disabled=""><option value="" disabled="" selected=""></option></select>
</div>
</div>
<div class="sb-date-field__display" data-placeholder="Check-in" data-date-format="short_date_with_weekday_without_year" data-display="" aria-hidden="true">Check-in</div>
<i class="sb-date-field__chevron bicon-downchevron" aria-hidden="true"></i>
</div>
</div>
</div>
</div>
</div>
<div data-visible="accommodation,flights,rentalcars" class="xp__input-group xp__date-time">
<div class="xp__dates-inner xp__dates__checkout">
<div data-visible="accommodation,flights,rentalcars" class="xp__group xp__date c2-wrapper-s-hidden">
<div class="sb-date-field b-datepicker" data-component="search/dates/date-field-select" data-sb-id="main" data-mode="checkout" data-calendar2-type="checkout" data-calendar2-title="Data de saída">
<div class="sb-searchbox__input sb-date-field__field  -empty sb-date__field-svg_icon" data-field="">
<span class="sb-date-field__icon sb-date-field__icon-btn bk-svg-wrapper calendar-restructure-sb" aria-hidden="true">
<svg aria-hidden="true" class="bk-icon -experiments-calendar sb-date-picker_icon-svg" fill="#BDBDBD" focusable="false" height="20" role="presentation" width="20" viewBox="0 0 128 128"><path d="m112 16h-16v-8h-8v8h-48v-8h-8v8h-16c-4.4 0-8 3.9-8 8.7v86.6c0 4.8 3.6 8.7 8 8.7h96c4.4 0 8-3.9 8-8.7v-86.6c0-4.8-3.6-8.7-8-8.7zm0 95.3a1.1 1.1 0 0 1 -.2.7h-95.6a1.1 1.1 0 0 1 -.2-.7v-71.3h96zm-68-43.3h-12v-12h12zm0 28h-12v-12h12zm26-28h-12v-12h12zm0 28h-12v-12h12zm26 0h-12v-12h12zm0-28h-12v-12h12z" fill-rule="evenodd"></path></svg>
<i class="
sb-date-field__icon-text
sb-date-field__icon-text-wide
" data-icon-day="" data-placeholder="+">+</i>
</span>
<div class="sb-date-field__controls sb-date-field__controls__ie-fix" data-controls="" data-calendar2-cant-touch-this="">
<div class="sb-date-field__select -month-year js-date-field__part" data-type="month-year">
<div class="sb-date-field__select-value" aria-hidden="true">
<span class="js-date-field__value sb-date-field__value_empty" data-placeholder="
Mês de saída
">
Mês de saída
</span>
<i class="sb-date-field__select-icon bicon-downchevron"></i>
</div>
<select class="sb-date-field__select-field js-date-field__select" aria-label="
Mês de saída
" data-no-old-calendar="1"><option value="" disabled="" selected=""></option><option value="4-2022">maio de 2022</option><option value="5-2022">junho de 2022</option><option value="6-2022">julho de 2022</option><option value="7-2022">agosto de 2022</option><option value="8-2022">setembro de 2022</option><option value="9-2022">outubro de 2022</option><option value="10-2022">novembro de 2022</option><option value="11-2022">dezembro de 2022</option><option value="0-2023">janeiro de 2023</option><option value="1-2023">fevereiro de 2023</option><option value="2-2023">março de 2023</option><option value="3-2023">abril de 2023</option><option value="4-2023">maio de 2023</option><option value="5-2023">junho de 2023</option><option value="6-2023">julho de 2023</option><option value="7-2023">agosto de 2023</option></select>
<input type="hidden" class="js-date-field__year" name="checkout_year" value="">
<input type="hidden" class="js-date-field__month" name="checkout_month" value="">
</div>
<div class="sb-date-field__select -day js-date-field__part sb-date-field__select_disabled" data-type="date">
<div class="sb-date-field__select-value" aria-hidden="true">
<span class="js-date-field__value sb-date-field__value_empty" data-placeholder="
Dia de saída
">
Dia de saída
</span>
<i class="sb-date-field__select-icon bicon-downchevron"></i>
</div>
<select class="sb-date-field__select-field js-date-field__select" name="checkout_monthday" data-selected="" aria-label="
Dia de saída
" data-no-old-calendar="1" disabled=""><option value="" disabled="" selected=""></option></select>
</div>
</div>
<div class="sb-date-field__display" data-placeholder="Check-out" data-date-format="short_date_with_weekday_without_year" data-display="" aria-hidden="true">Check-out</div>
<i class="sb-date-field__chevron bicon-downchevron" aria-hidden="true"></i>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="xp-calendar " data-component="search/dates/single-calendar" data-sb-id="main" data-render-los="1">
<div class="bui-calendar" style="display: none;">
<div class="bui-calendar__main b-a11y-calendar-contrasts">
<div class="bui-calendar__control bui-calendar__control--prev bui-calendar__control--hidden" data-bui-ref="calendar-prev">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path></svg>
</div>
<div class="bui-calendar__control bui-calendar__control--next" data-bui-ref="calendar-next">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path></svg>
</div>
<div class="bui-calendar__content" data-bui-ref="calendar-content">
        <div class="bui-calendar__wrapper" data-bui-ref="calendar-month">
            <div class="bui-calendar__month" id="bui-calendar-1651434570580zgscxqt" aria-live="polite">Maio 2022</div>
            <table class="bui-calendar__dates" aria-labelledby="bui-calendar-1651434570580zgscxqt">
                
    <thead class="bui-calendar__row">
        <tr><th scope="col" class="bui-calendar__day-name">2ª</th><th scope="col" class="bui-calendar__day-name">3ª</th><th scope="col" class="bui-calendar__day-name">4ª</th><th scope="col" class="bui-calendar__day-name">5ª</th><th scope="col" class="bui-calendar__day-name">6ª</th><th scope="col" class="bui-calendar__day-name">Sa.</th><th scope="col" class="bui-calendar__day-name">Do.</th>
    </tr></thead>
    
                <tbody><tr class="bui-calendar__row"><td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td><td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td><td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td><td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td><td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td><td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td>
        <td class="bui-calendar__date bui-calendar__date--today" data-bui-ref="calendar-date" data-date="2022-05-01" role="gridcell" tabindex="-1">
          <span aria-label="1 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">1</span>
          </span>
        </td>
    </tr><tr class="bui-calendar__row">
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-02" role="gridcell" tabindex="-1">
          <span aria-label="2 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">2</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-03" role="gridcell" tabindex="-1">
          <span aria-label="3 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">3</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-04" role="gridcell" tabindex="-1">
          <span aria-label="4 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">4</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-05" role="gridcell" tabindex="-1">
          <span aria-label="5 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">5</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-06" role="gridcell" tabindex="-1">
          <span aria-label="6 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">6</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-07" role="gridcell" tabindex="-1">
          <span aria-label="7 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">7</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-08" role="gridcell" tabindex="-1">
          <span aria-label="8 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">8</span>
          </span>
        </td>
    </tr><tr class="bui-calendar__row">
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-09" role="gridcell" tabindex="-1">
          <span aria-label="9 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">9</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-10" role="gridcell" tabindex="-1">
          <span aria-label="10 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">10</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-11" role="gridcell" tabindex="-1">
          <span aria-label="11 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">11</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-12" role="gridcell" tabindex="-1">
          <span aria-label="12 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">12</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-13" role="gridcell" tabindex="-1">
          <span aria-label="13 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">13</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-14" role="gridcell" tabindex="-1">
          <span aria-label="14 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">14</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-15" role="gridcell" tabindex="-1">
          <span aria-label="15 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">15</span>
          </span>
        </td>
    </tr><tr class="bui-calendar__row">
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-16" role="gridcell" tabindex="-1">
          <span aria-label="16 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">16</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-17" role="gridcell" tabindex="-1">
          <span aria-label="17 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">17</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-18" role="gridcell" tabindex="-1">
          <span aria-label="18 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">18</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-19" role="gridcell" tabindex="-1">
          <span aria-label="19 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">19</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-20" role="gridcell" tabindex="-1">
          <span aria-label="20 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">20</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-21" role="gridcell" tabindex="-1">
          <span aria-label="21 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">21</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-22" role="gridcell" tabindex="-1">
          <span aria-label="22 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">22</span>
          </span>
        </td>
    </tr><tr class="bui-calendar__row">
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-23" role="gridcell" tabindex="-1">
          <span aria-label="23 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">23</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-24" role="gridcell" tabindex="-1">
          <span aria-label="24 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">24</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-25" role="gridcell" tabindex="-1">
          <span aria-label="25 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">25</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-26" role="gridcell" tabindex="-1">
          <span aria-label="26 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">26</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-27" role="gridcell" tabindex="-1">
          <span aria-label="27 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">27</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-28" role="gridcell" tabindex="-1">
          <span aria-label="28 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">28</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-29" role="gridcell" tabindex="-1">
          <span aria-label="29 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">29</span>
          </span>
        </td>
    </tr><tr class="bui-calendar__row">
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-30" role="gridcell" tabindex="-1">
          <span aria-label="30 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">30</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-05-31" role="gridcell" tabindex="-1">
          <span aria-label="31 Maio 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">31</span>
          </span>
        </td>
    <td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td><td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td><td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td><td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td><td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td></tr>
            </tbody></table>
        </div>
    
        <div class="bui-calendar__wrapper" data-bui-ref="calendar-month">
            <div class="bui-calendar__month" id="bui-calendar-1651434570580zgscxqt" aria-live="polite">Junho 2022</div>
            <table class="bui-calendar__dates" aria-labelledby="bui-calendar-1651434570580zgscxqt">
                
    <thead class="bui-calendar__row">
        <tr><th scope="col" class="bui-calendar__day-name">2ª</th><th scope="col" class="bui-calendar__day-name">3ª</th><th scope="col" class="bui-calendar__day-name">4ª</th><th scope="col" class="bui-calendar__day-name">5ª</th><th scope="col" class="bui-calendar__day-name">6ª</th><th scope="col" class="bui-calendar__day-name">Sa.</th><th scope="col" class="bui-calendar__day-name">Do.</th>
    </tr></thead>
    
                <tbody><tr class="bui-calendar__row"><td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td><td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td>
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-01" role="gridcell" tabindex="-1">
          <span aria-label="1 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">1</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-02" role="gridcell" tabindex="-1">
          <span aria-label="2 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">2</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-03" role="gridcell" tabindex="-1">
          <span aria-label="3 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">3</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-04" role="gridcell" tabindex="-1">
          <span aria-label="4 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">4</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-05" role="gridcell" tabindex="-1">
          <span aria-label="5 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">5</span>
          </span>
        </td>
    </tr><tr class="bui-calendar__row">
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-06" role="gridcell" tabindex="-1">
          <span aria-label="6 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">6</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-07" role="gridcell" tabindex="-1">
          <span aria-label="7 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">7</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-08" role="gridcell" tabindex="-1">
          <span aria-label="8 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">8</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-09" role="gridcell" tabindex="-1">
          <span aria-label="9 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">9</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-10" role="gridcell" tabindex="-1">
          <span aria-label="10 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">10</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-11" role="gridcell" tabindex="-1">
          <span aria-label="11 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">11</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-12" role="gridcell" tabindex="-1">
          <span aria-label="12 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">12</span>
          </span>
        </td>
    </tr><tr class="bui-calendar__row">
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-13" role="gridcell" tabindex="-1">
          <span aria-label="13 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">13</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-14" role="gridcell" tabindex="-1">
          <span aria-label="14 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">14</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-15" role="gridcell" tabindex="-1">
          <span aria-label="15 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">15</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-16" role="gridcell" tabindex="-1">
          <span aria-label="16 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">16</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-17" role="gridcell" tabindex="-1">
          <span aria-label="17 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">17</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-18" role="gridcell" tabindex="-1">
          <span aria-label="18 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">18</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-19" role="gridcell" tabindex="-1">
          <span aria-label="19 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">19</span>
          </span>
        </td>
    </tr><tr class="bui-calendar__row">
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-20" role="gridcell" tabindex="-1">
          <span aria-label="20 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">20</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-21" role="gridcell" tabindex="-1">
          <span aria-label="21 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">21</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-22" role="gridcell" tabindex="-1">
          <span aria-label="22 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">22</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-23" role="gridcell" tabindex="-1">
          <span aria-label="23 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">23</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-24" role="gridcell" tabindex="-1">
          <span aria-label="24 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">24</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-25" role="gridcell" tabindex="-1">
          <span aria-label="25 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">25</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-26" role="gridcell" tabindex="-1">
          <span aria-label="26 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">26</span>
          </span>
        </td>
    </tr><tr class="bui-calendar__row">
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-27" role="gridcell" tabindex="-1">
          <span aria-label="27 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">27</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-28" role="gridcell" tabindex="-1">
          <span aria-label="28 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">28</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-29" role="gridcell" tabindex="-1">
          <span aria-label="29 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">29</span>
          </span>
        </td>
    
        <td class="bui-calendar__date" data-bui-ref="calendar-date" data-date="2022-06-30" role="gridcell" tabindex="-1">
          <span aria-label="30 Junho 2022" role="checkbox" aria-checked="false">
            <span aria-hidden="true">30</span>
          </span>
        </td>
    <td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td><td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td><td class="bui-calendar__date bui-calendar__date--empty" role="presentation"></td></tr>
            </tbody></table>
        </div>
    </div>
<div class="bui-calendar__display" data-bui-ref="calendar-selected-display">Check-in - Check-out</div>
</div>
</div>
</div>
</div>
<div data-visible="accommodation,flights" class="xp__input-group xp__guests" data-component="search/group/group-with-modal" data-sb-id="main" tabindex="0">
<div data-component="xp-index/guest-errors" data-sb-id="main" data-view-id="accommodation" role="alert">
</div>
<label id="xp__guests__toggle" for="xp__guests__input" class="xp__input" data-group-toggle="" role="button" aria-expanded="false" aria-controls="xp__guests__inputs-container">
<span class="xp__guests__count">
<span data-adults-count="">2 adultos</span>
<span data-visible="accommodation">
&nbsp;·&nbsp;
<span data-children-count="">1 criança</span>
</span>
</span>
</label>

<div id="xp__guests__inputs-container" class="xp__guests__inputs focussable " data-group-modal="" style="display: none;" role="region" aria-label="Número de quartos e de hóspedes">
<div data-component="search/group/group" data-sb-id="main" data-sb-width="medium" data-sb-bbtool-searchbox="0" data-sb-group-children-hide="0" data-sb-group-children-ages-hide="0" data-sb-group-infants-hide="1" data-sb-group-pets-hide="0" data-sb-group-rooms-hide="0" data-sb-group-block-labels="0" data-sb-group-use_adults_label="0" data-sb-group-always-expanded="0" data-sb-group-use-bui-stepper="1" data-sb-group-bui-steppers-accessible="1" data-fe_sb_group_descriptive_dropdowns="0" data-fe_sb_universal_design="0" data-fe_sb_xpi="1" data-fe_remove_duplicate_ids="0" data-fe_sb_unique_id="" data-sb_reorder_rooms_block="1" data-sb-facelift="0" data-fe_sb_show_children_age_bracket="1" data-fe_sb_mandatory_child_ages="1" data-fe_fam_d_index_mandatory_ages_new_copy="0" data-fe_sb_dont_use_default_child_age="1">
<div class="u-clearfix" data-render="">
  
  
    <div class="sb-group__field sb-group__field-adults">
  <div class="bui-stepper" data-bui-component="InputStepper">
    <div class="bui-stepper__title-wrapper">
      <label class="bui-stepper__title" for="group_adults">Adultos</label>
      
    </div>
    
      <div class="bui-stepper__wrapper sb-group__stepper-a11y">
        <input style="display: none" type="number" class="bui-stepper__input" data-bui-ref="input-stepper-field" id="group_adults" name="group_adults" min="1" max="30" value="2" data-group-adults-count="">
        <button class="bui-button bui-button--secondary bui-stepper__subtract-button " data-bui-ref="input-stepper-subtract-button" type="button" aria-label="Diminuir número de Adultos" aria-describedby="group_adults_desc">
          <span class="bui-button__text">−</span>
        </button>
        <span class="bui-stepper__display" data-bui-ref="input-stepper-value" aria-hidden="true">2</span>
        <button class="bui-button bui-button--secondary bui-stepper__add-button " data-bui-ref="input-stepper-add-button" type="button" aria-label="Aumentar número de Adultos" aria-describedby="group_adults_desc">
          <span class="bui-button__text">+</span>
        </button>
        <span class="bui-u-sr-only" aria-live="assertive" id="group_adults_desc">2 Adultos</span>
      </div>
    
  </div>
      
    </div>
      
      <div class="sb-group__field sb-group-children ">
        
  <div class="bui-stepper" data-bui-component="InputStepper">
    <div class="bui-stepper__title-wrapper">
      <label class="bui-stepper__title" for="group_children">Crianças</label>
      
        <span class="bui-stepper__subtitle">0 a 17 anos</span>
      
    </div>
    
      <div class="bui-stepper__wrapper sb-group__stepper-a11y">
        <input style="display: none" type="number" class="bui-stepper__input" data-bui-ref="input-stepper-field" id="group_children" name="group_children" min="0" max="10" value="1" data-group-children-count="">
        <button class="bui-button bui-button--secondary bui-stepper__subtract-button " data-bui-ref="input-stepper-subtract-button" type="button" aria-label="Diminuir número de Crianças" aria-describedby="group_children_desc">
          <span class="bui-button__text">−</span>
        </button>
        <span class="bui-stepper__display" data-bui-ref="input-stepper-value" aria-hidden="true">1</span>
        <button class="bui-button bui-button--secondary bui-stepper__add-button " data-bui-ref="input-stepper-add-button" type="button" aria-label="Aumentar número de Crianças" aria-describedby="group_children_desc">
          <span class="bui-button__text">+</span>
        </button>
        <span class="bui-u-sr-only" aria-live="assertive" id="group_children_desc">1 Crianças</span>
      </div>
    
  </div>

    </div>
  
      <div class="sb-group__children__field clearfix">
        
    <select name="age" data-group-child-age="0" aria-label="Criança 1: idade" class="sb-group-field-has-error">
      <option class="sb_child_ages_empty_zero" value="">
          
            Idade necessária
          
      </option>
      
        <option value="0">
            
                0 anos de idade
            
        </option>
      
        <option value="1">
            
                1 ano de idade
            
        </option>
      
        <option value="2">
            
                2 anos de idade
            
        </option>
      
        <option value="3">
            
                3 anos de idade
            
        </option>
      
        <option value="4">
            
                4 anos de idade
            
        </option>
      
        <option value="5">
            
                5 anos de idade
            
        </option>
      
        <option value="6">
            
                6 anos de idade
            
        </option>
      
        <option value="7">
            
                7 anos de idade
            
        </option>
      
        <option value="8">
            
                8 anos de idade
            
        </option>
      
        <option value="9">
            
                9 anos de idade
            
        </option>
      
        <option value="10">
            
                10 anos de idade
            
        </option>
      
        <option value="11">
            
                11 anos de idade
            
        </option>
      
        <option value="12">
            
                12 anos de idade
            
        </option>
      
        <option value="13">
            
                13 anos de idade
            
        </option>
      
        <option value="14">
            
                14 anos de idade
            
        </option>
      
        <option value="15">
            
                15 anos de idade
            
        </option>
      
        <option value="16">
            
                16 anos de idade
            
        </option>
      
        <option value="17">
            
                17 anos de idade
            
        </option>
      
    </select>
        <label class="sb-searchbox__label -small sb-group__children__label">
          Para encontrar um lugar que acomode todo o seu grupo e te mostrar os preços corretos, precisamos saber que idade as crianças que viajam com você terão no momento do check-out

        </label>
        
      </div>   
</div>
</div>
</div>
</div>
<div class="xp__button">
<div class="sb-searchbox-submit-col -button-messages">
</div>
<div class="sb-searchbox-submit-col -submit-button ">
<button data-sb-id="main" type="submit" class="sb-searchbox__button " data-et-click="      customGoal:cCHObTRVDEZRdPQBcGCfTKYCccaT:1 goal:www_index_search_button_click   ">
<span class="js-sb-submit-text ">
Pesquisar
</span>
<span class="sb-submit-helper"></span>
</button>
</div>
</div>
</div>
<span data-et-view=""></span>
<div class="bui-checkbox xp__entire-place js-sb-entire-place-checkbox g-hidden" data-visible="accommodation" data-component="search/entire-place-checkbox">
<input class="bui-checkbox__input" type="checkbox" value="1" id="sb_entire_place_checkbox" name="sb_entire_place">

</div>
<div class="bui-checkbox xp__travel-purpose " data-component="search/travel-purpose/checkbox" data-profile-switch-url="" data-visible="accommodation">
<input class="bui-checkbox__input" type="checkbox" value="business" id="sb_travel_purpose_checkbox" name="sb_travel_purpose">

</div>
<div class="bui-checkbox xp__results-on-map sb-searchbox__map_trigger g-hidden">
<input class="bui-checkbox__input" type="checkbox" value="1" id="sb_results_on_map" name="map">
<label class="text-dark" for="sb_results_on_map">Abaixo, encontrarás os locais habituais de levantamento dos Bilhetes.</label>
</div>
<input type="hidden" name="b_h4u_keep_filters" value="">
<input type="hidden" name="from_sf" value="1"><input type="hidden" name="dest_id" value=""><input type="hidden" name="dest_type" value=""><input type="hidden" name="search_pageview_id" value="da778b5b64c903b5"><input type="hidden" name="search_selected" value="false"></form>
</div>
</div>
</div>
</div>
<!-- end input search --> 
<!-- results --> 
<div class="container">
<div class="row row--grid">
								<div class="col-12">
									<!-- cart -->
									<div class="cart">
                                        	<!-- title -->
				<div class="col-12">
					<div class="main__title main__title--page">
						<h2>Pontos de Vendas e Embarque de Mercadorias</h2>
					</div>
				</div>
				<!-- end title -->
										<div class="cart__table-wrap">
											<div class="cart__table-scroll" data-scrollbar="true" tabindex="-1" style="overflow: hidden; outline: none;"><div class="scroll-content">
												<table class="cart__table">
													<thead>
														<tr>
															<th>Local disponível</th>
															<th></th>
															<th>Data & Hora</th>
															<th>Preçário</th>
															<th></th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>
																<div class="cart__img">
																	<img src="{{ asset('assets/img_transp/cars/local.png') }}" alt="A">
																</div>
															</td>
															<td><a href="car.html">Patriota Central</a></td>
															<td>2022/05/03 10:30:02</td>
                                                            <td><span class="cart__price">1600 Kz<span>440 Kz</span></span></td>
															<td></td>
															
                                                            <td width="2%">
                                                                <input type="checkBox" class="form-control">
                                                            </td>
														</tr>
                                                        <tr>
															<td>
																<div class="cart__img">
																	<img src="{{ asset('assets/img_transp/cars/local.png') }}" alt="">
																</div>
															</td>
															<td><a href="car.html">Ulengo Center</a></td>
															<td>2022/05/07 10:10:02</td>
                                                            <td><span class="cart__price">3000 Kz<span>3800 Kz</span></span></td>
															<td></td>
															
                                                            <td width="2%">
                                                                <input type="checkBox" class="form-control">
                                                            </td>
														</tr>
                                                        <tr>
															<td>
																<div class="cart__img">
																	<img src="{{ asset('assets/img_transp/cars/local.png') }}" alt="">
																</div>
															</td>
															<td><a href="car.html">Farmácia Central</a></td>
															<td>2022/05/04 10:10:02</td>
                                                            <td><span class="cart__price">3000 Kz<span>1500 Kz</span></span></td>
															<td></td>
															
                                                            <td width="2%">
                                                                <input type="checkBox" class="form-control">
                                                            </td>
														</tr>
                                                        <tr>
                                                            <td class="text-right" colspan="6"><button class="sb-searchbtn__button"><i class="fa fa-check-circle"></i> Levantar Bilhete</button></td>
                                                        </tr>
													</tbody>
                                                    
												</table>
											</div><div class="scrollbar-track scrollbar-track-x show" style="display: none;"><div class="scrollbar-thumb scrollbar-thumb-x" style="width: 1158px; transform: translate3d(0px, 0px, 0px);"></div></div><div class="scrollbar-track scrollbar-track-y show" style="display: none;"><div class="scrollbar-thumb scrollbar-thumb-y" style="height: 436px; transform: translate3d(0px, 0px, 0px);"></div></div></div>
										</div>
									</div>
									<!-- end cart -->
								</div>
							</div>
</div>
<!-- end results --> 
@endsection
