@extends ('layouts.visitor')
<!--Call of template welcome-->
@section('content')
<!--Sectino to show content to yield -->
<!-- banner principal -->
<div class="banner-box-img4">
<div class="banner-escuro-img">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="header-title padding-top">
                    Bilhetes e Horários
                </h1>
                <p class="padding-text">
                    Comprar Bilhetes na SLA ficou muito fácil, conecte-se e fique ligado a maior rede de transporte
                    nacional!
                </p>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- end banner -->

<!-- inputs search --> 
<div class="container">
<div class="search_content_banner">
<div class="hero-banner-searchbox">
<div class="
sb-searchbox__outer
" data-sb-outer="">
<form id="frm" method="get" role="search" action="{{ route('res.bilhetes') }}" class="sb-searchbox sb-searchbox--painted sb-searchbox--xp js--sb-searchbox">

<div class="xp__fieldset js--sb-fieldset accommodation " data-view="accommodation">
<div data-visible="accommodation,flights,rentalcars" class="xp__input-group xp__search" data-destination-input="">
<div data-component="search/destination/input" data-sb-id="main" data-gpf="1" data-required="1" data-flags="" data-open-focus="" data-minlength="1" data-focus-on-typing="1">
<div class="c-autocomplete sb-destination -with-clear region_second_line">
<button data-clear="" type="button" class="sb-destination__clear">
<svg aria-hidden="true" class="bk-icon -streamline-close sb-destination__clear-icon" fill="#333333" focusable="false" height="20" role="presentation" width="20" viewBox="0 0 24 24"><path d="M13.31 12l6.89-6.89a.93.93 0 1 0-1.31-1.31L12 10.69 5.11 3.8A.93.93 0 0 0 3.8 5.11L10.69 12 3.8 18.89a.93.93 0 0 0 1.31 1.31L12 13.31l6.89 6.89a.93.93 0 1 0 1.31-1.31z"></path></svg>
</button>
<div class="row mr-1">
  <div class="col-6 pr-1">
  <div class="input-group flex-nowrap mb-1">
  <span class="input-group-text group-input" id="addon-wrapping"> <i class="fa fa-map-marker fa-sm text-muted"></i> </span>
  <input type="search" name="origem" id="origem" class="c-autocomplete__input sb-searchbox__input sb-destination__input w-100" placeholder="Origem" value="" autocomplete="off" data-component="search/destination/input-placeholder" data-sb-id="main" data-input="" aria-autocomplete="both" aria-label="Por favor, insira sua origem" onclick="$('#list_destino').css('display','none');$('#list_origem').css('display','block');" required>
  
</div>
  <!-- bloco de origem --> 
  <ul id="list_origem" data-list="" class="c-autocomplete__list sb-autocomplete__list sb-autocomplete__list-with_photos -visible" role="listbox" aria-label="Lista de destinos sugeridos" style="display:none;" data-keyboard="false">
            <li class="c-autocomplete__item sb-autocomplete__item sb-popular-nearby-title">
                <div class="sb-autocomplete__section-title-wrapper">
                    <div class="sb-autocomplete__section-title">
                        <span>Origem procurados na região</span>
                    </div>
                </div>
            </li>
        <li class="c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city sb-autocomplete__item--with-title " role="option" data-list-item="" data-i="0" data-value="" data-label="Luanda"><span class="sb-autocomplete--photo"><svg fill="#6B6B6B" height="24" width="24" viewBox="0 0 24 24" class="bk-icon -streamline-geo_pin"><path d="M15 8.25a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm1.5 0a4.5 4.5 0 1 0-9 0 4.5 4.5 0 0 0 9 0zM12 1.5a6.75 6.75 0 0 1 6.75 6.75c0 2.537-3.537 9.406-6.75 14.25-3.214-4.844-6.75-11.713-6.75-14.25A6.75 6.75 0 0 1 12 1.5zM12 0a8.25 8.25 0 0 0-8.25 8.25c0 2.965 3.594 9.945 7 15.08a1.5 1.5 0 0 0 2.5 0c3.406-5.135 7-12.115 7-15.08A8.25 8.25 0 0 0 12 0z"></path></svg></span><span><span class="search_hl_name">Luanda</span><br>Angola</span></li>
        <li class="c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city " role="option" data-list-item="" data-i="1" data-value="" data-label="Benguela"><span class="sb-autocomplete--photo"><svg fill="#6B6B6B" height="24" width="24" viewBox="0 0 24 24" class="bk-icon -streamline-geo_pin"><path d="M15 8.25a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm1.5 0a4.5 4.5 0 1 0-9 0 4.5 4.5 0 0 0 9 0zM12 1.5a6.75 6.75 0 0 1 6.75 6.75c0 2.537-3.537 9.406-6.75 14.25-3.214-4.844-6.75-11.713-6.75-14.25A6.75 6.75 0 0 1 12 1.5zM12 0a8.25 8.25 0 0 0-8.25 8.25c0 2.965 3.594 9.945 7 15.08a1.5 1.5 0 0 0 2.5 0c3.406-5.135 7-12.115 7-15.08A8.25 8.25 0 0 0 12 0z"></path></svg></span><span><span class="search_hl_name">Benguela</span><br>Angola</span></li>
        <li class="c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city " role="option" data-list-item="" data-i="2" data-value="" data-label="Lubango"><span class="sb-autocomplete--photo"><svg fill="#6B6B6B" height="24" width="24" viewBox="0 0 24 24" class="bk-icon -streamline-geo_pin"><path d="M15 8.25a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm1.5 0a4.5 4.5 0 1 0-9 0 4.5 4.5 0 0 0 9 0zM12 1.5a6.75 6.75 0 0 1 6.75 6.75c0 2.537-3.537 9.406-6.75 14.25-3.214-4.844-6.75-11.713-6.75-14.25A6.75 6.75 0 0 1 12 1.5zM12 0a8.25 8.25 0 0 0-8.25 8.25c0 2.965 3.594 9.945 7 15.08a1.5 1.5 0 0 0 2.5 0c3.406-5.135 7-12.115 7-15.08A8.25 8.25 0 0 0 12 0z"></path></svg></span><span><span class="search_hl_name">Lubango</span><br>Angola</span></li>
        <li class="c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city " role="option" data-list-item="" data-i="3" data-value="" data-label="Talatona"><span class="sb-autocomplete--photo"><svg fill="#6B6B6B" height="24" width="24" viewBox="0 0 24 24" class="bk-icon -streamline-geo_pin"><path d="M15 8.25a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm1.5 0a4.5 4.5 0 1 0-9 0 4.5 4.5 0 0 0 9 0zM12 1.5a6.75 6.75 0 0 1 6.75 6.75c0 2.537-3.537 9.406-6.75 14.25-3.214-4.844-6.75-11.713-6.75-14.25A6.75 6.75 0 0 1 12 1.5zM12 0a8.25 8.25 0 0 0-8.25 8.25c0 2.965 3.594 9.945 7 15.08a1.5 1.5 0 0 0 2.5 0c3.406-5.135 7-12.115 7-15.08A8.25 8.25 0 0 0 12 0z"></path></svg></span><span><span class="search_hl_name">Talatona</span><br>Angola</span></li>
        <li class="c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city " role="option" data-list-item="" data-i="4" data-value="" data-label="Lobito"><span class="sb-autocomplete--photo"><svg fill="#6B6B6B" height="24" width="24" viewBox="0 0 24 24" class="bk-icon -streamline-geo_pin"><path d="M15 8.25a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm1.5 0a4.5 4.5 0 1 0-9 0 4.5 4.5 0 0 0 9 0zM12 1.5a6.75 6.75 0 0 1 6.75 6.75c0 2.537-3.537 9.406-6.75 14.25-3.214-4.844-6.75-11.713-6.75-14.25A6.75 6.75 0 0 1 12 1.5zM12 0a8.25 8.25 0 0 0-8.25 8.25c0 2.965 3.594 9.945 7 15.08a1.5 1.5 0 0 0 2.5 0c3.406-5.135 7-12.115 7-15.08A8.25 8.25 0 0 0 12 0z"></path></svg></span><span><span class="search_hl_name">Lobito</span><br>Angola</span></li>
    </ul>
  <!-- end bloco de origem --> 
  </div>
  <div class="col-6 px-0">
  <div class="input-group flex-nowrap mb-1">
  <span class="input-group-text group-input" id="addon-wrapping"> <i class="fa fa-map-marker fa-sm text-muted"></i> </span>
  <input type="search" name="destino" id="destino" class="c-autocomplete__input sb-searchbox__input sb-destination__input w-100" placeholder="Destino" value="" autocomplete="off" data-component="search/destination/input-placeholder" data-sb-id="main" data-input="" aria-autocomplete="both" aria-label="Por favor, insira seu destino"  onclick="$('#list_origem').css('display','none');$('#list_destino').css('display','block');" required>
  
</div>
    <!-- bloco de destino --> 
    <ul id="list_destino" data-list="" class="c-autocomplete__list sb-autocomplete__list sb-autocomplete__list-with_photos -visible" role="listbox" aria-label="Lista de destinos sugeridos" style="display:none;" data-keyboard="false">
            <li class="c-autocomplete__item sb-autocomplete__item sb-popular-nearby-title ">
                <div class="sb-autocomplete__section-title-wrapper">
                    <div class="sb-autocomplete__section-title">
                        <span>Destinos procurados na região</span>
                    </div>
                </div>
            </li>
        <li class="c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city sb-autocomplete__item--with-title " role="option" data-list-item="" data-i="0" data-value="" data-label="Luanda"><span class="sb-autocomplete--photo"><svg fill="#6B6B6B" height="24" width="24" viewBox="0 0 24 24" class="bk-icon -streamline-geo_pin"><path d="M15 8.25a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm1.5 0a4.5 4.5 0 1 0-9 0 4.5 4.5 0 0 0 9 0zM12 1.5a6.75 6.75 0 0 1 6.75 6.75c0 2.537-3.537 9.406-6.75 14.25-3.214-4.844-6.75-11.713-6.75-14.25A6.75 6.75 0 0 1 12 1.5zM12 0a8.25 8.25 0 0 0-8.25 8.25c0 2.965 3.594 9.945 7 15.08a1.5 1.5 0 0 0 2.5 0c3.406-5.135 7-12.115 7-15.08A8.25 8.25 0 0 0 12 0z"></path></svg></span><span><span class="search_hl_name">Luanda</span><br>Angola</span></li>
        <li class="c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city " role="option" data-list-item="" data-i="1" data-value="" data-label="Benguela"><span class="sb-autocomplete--photo"><svg fill="#6B6B6B" height="24" width="24" viewBox="0 0 24 24" class="bk-icon -streamline-geo_pin"><path d="M15 8.25a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm1.5 0a4.5 4.5 0 1 0-9 0 4.5 4.5 0 0 0 9 0zM12 1.5a6.75 6.75 0 0 1 6.75 6.75c0 2.537-3.537 9.406-6.75 14.25-3.214-4.844-6.75-11.713-6.75-14.25A6.75 6.75 0 0 1 12 1.5zM12 0a8.25 8.25 0 0 0-8.25 8.25c0 2.965 3.594 9.945 7 15.08a1.5 1.5 0 0 0 2.5 0c3.406-5.135 7-12.115 7-15.08A8.25 8.25 0 0 0 12 0z"></path></svg></span><span><span class="search_hl_name">Benguela</span><br>Angola</span></li>
        <li class="c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city " role="option" data-list-item="" data-i="2" data-value="" data-label="Lubango"><span class="sb-autocomplete--photo"><svg fill="#6B6B6B" height="24" width="24" viewBox="0 0 24 24" class="bk-icon -streamline-geo_pin"><path d="M15 8.25a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm1.5 0a4.5 4.5 0 1 0-9 0 4.5 4.5 0 0 0 9 0zM12 1.5a6.75 6.75 0 0 1 6.75 6.75c0 2.537-3.537 9.406-6.75 14.25-3.214-4.844-6.75-11.713-6.75-14.25A6.75 6.75 0 0 1 12 1.5zM12 0a8.25 8.25 0 0 0-8.25 8.25c0 2.965 3.594 9.945 7 15.08a1.5 1.5 0 0 0 2.5 0c3.406-5.135 7-12.115 7-15.08A8.25 8.25 0 0 0 12 0z"></path></svg></span><span><span class="search_hl_name">Lubango</span><br>Angola</span></li>
        <li class="c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city " role="option" data-list-item="" data-i="3" data-value="" data-label="Talatona"><span class="sb-autocomplete--photo"><svg fill="#6B6B6B" height="24" width="24" viewBox="0 0 24 24" class="bk-icon -streamline-geo_pin"><path d="M15 8.25a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm1.5 0a4.5 4.5 0 1 0-9 0 4.5 4.5 0 0 0 9 0zM12 1.5a6.75 6.75 0 0 1 6.75 6.75c0 2.537-3.537 9.406-6.75 14.25-3.214-4.844-6.75-11.713-6.75-14.25A6.75 6.75 0 0 1 12 1.5zM12 0a8.25 8.25 0 0 0-8.25 8.25c0 2.965 3.594 9.945 7 15.08a1.5 1.5 0 0 0 2.5 0c3.406-5.135 7-12.115 7-15.08A8.25 8.25 0 0 0 12 0z"></path></svg></span><span><span class="search_hl_name">Talatona</span><br>Angola</span></li>
        <li class="c-autocomplete__item sb-autocomplete__item sb-autocomplete__item-with_photo sb-autocomplete__item__item--elipsis sb-autocomplete__item--icon_revamp sb-autocomplete__item--city " role="option" data-list-item="" data-i="4" data-value="" data-label="Lobito"><span class="sb-autocomplete--photo"><svg fill="#6B6B6B" height="24" width="24" viewBox="0 0 24 24" class="bk-icon -streamline-geo_pin"><path d="M15 8.25a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm1.5 0a4.5 4.5 0 1 0-9 0 4.5 4.5 0 0 0 9 0zM12 1.5a6.75 6.75 0 0 1 6.75 6.75c0 2.537-3.537 9.406-6.75 14.25-3.214-4.844-6.75-11.713-6.75-14.25A6.75 6.75 0 0 1 12 1.5zM12 0a8.25 8.25 0 0 0-8.25 8.25c0 2.965 3.594 9.945 7 15.08a1.5 1.5 0 0 0 2.5 0c3.406-5.135 7-12.115 7-15.08A8.25 8.25 0 0 0 12 0z"></path></svg></span><span><span class="search_hl_name">Lobito</span><br>Angola</span></li>
    </ul>
  <!-- end bloco de destino --> 
  </div>
</div>

</div>
 
</div>
</div>

<div  class="xp__datess">
<div class="xp__dates-inner">


<div class="row px-1 my-">
  <div class="col-6" >
  <div class="input-group flex-nowrap mb-1">
  <span class="input-group-text group-input" id="addon-wrapping"> <i class="fa fa-calendar fa-sm text-muted"></i> </span>
  <input type="text" class="picker c-autocomplete__input sb-searchbox__input sb-destination__input w-100" id="xp__calendar" name="checkin" value="{{ date('Y-m-d') }}" required>
</div>
  </div>
  <div class="col-6">
  <div class="input-group flex-nowrap mb-1">
  <span class="input-group-text group-input" id="addon-wrapping"> <i class="fa fa-calendar fa-sm text-muted"></i> </span>
  <input type="text" class="picker c-autocomplete__input sb-searchbox__input sb-destination__input w-100" id="xp__calendar" name="checkout" value="Data de regresso" required>
</div>
  </div>
</div>

</div>
</div>

<div data-visible="accommodation,flights" class="xp__input-group xp__guests" data-component="search/group/group-with-modal" data-sb-id="main" tabindex="0">
<div data-component="xp-index/guest-errors" data-sb-id="main" data-view-id="accommodation" role="alert">
</div>
<label id="xp__guests__toggle" for="xp__guests__input" class="xp__input" data-group-toggle="" role="button" aria-expanded="false" aria-controls="xp__guests__inputs-container" onclick=" $('#xp__guests__inputs-container').css('display','block'); ">
<span class="xp__guests__count">
<span data-adults-count="" id="adults-count">1 adultos</span>
<span data-visible="accommodation">
&nbsp;·&nbsp;
<span data-children-count="" id="childrens-count">0 criança</span>
</span>
</span>
</label> 

<div id="xp__guests__inputs-container" class="xp__guests__inputs focussable " data-group-modal="" style="display: none;" role="region" aria-label="Número de quartos e de hóspedes" style="display:none;">
<div data-component="search/group/group" data-sb-id="main" data-sb-width="medium" data-sb-bbtool-searchbox="0" data-sb-group-children-hide="0" data-sb-group-children-ages-hide="0" data-sb-group-infants-hide="1" data-sb-group-pets-hide="0" data-sb-group-rooms-hide="0" data-sb-group-block-labels="0" data-sb-group-use_adults_label="0" data-sb-group-always-expanded="0" data-sb-group-use-bui-stepper="1" data-sb-group-bui-steppers-accessible="1" data-fe_sb_group_descriptive_dropdowns="0" data-fe_sb_universal_design="0" data-fe_sb_xpi="1" data-fe_remove_duplicate_ids="0" data-fe_sb_unique_id="" data-sb_reorder_rooms_block="1" data-sb-facelift="0" data-fe_sb_show_children_age_bracket="1" data-fe_sb_mandatory_child_ages="1" data-fe_fam_d_index_mandatory_ages_new_copy="0" data-fe_sb_dont_use_default_child_age="1">
<div class="u-clearfix" data-render="">
  
  
    <div class="sb-group__field sb-group__field-adults">
  <div class="bui-stepper" data-bui-component="InputStepper">
    <div class="bui-stepper__title-wrapper">
      <label class="bui-stepper__title" for="group_adults">Adultos</label>
      
    </div>
    
      <div class="bui-stepper__wrapper sb-group__stepper-a11y">
        <input style="display: none" type="number" class="bui-stepper__input" data-bui-ref="input-stepper-field" id="group_adults" name="group_adults" min="1" max="30" value="1" data-group-adults-count="">
        <button class="bui-button bui-button--secondary bui-stepper__subtract-button " data-bui-ref="input-stepper-subtract-button" type="button" id="btn_adult_desc" aria-label="Diminuir número de Adultos" aria-describedby="group_adults_desc">
          <span class="bui-button__text">−</span>
        </button>
        <span class="bui-stepper__display" id="adults-qtd" data-bui-ref="input-stepper-value" aria-hidden="true">1</span>
        <button class="bui-button bui-button--secondary bui-stepper__add-button " data-bui-ref="input-stepper-add-button" type="button" id="btn_adult_asc" aria-label="Aumentar número de Adultos" aria-describedby="group_adults_desc">
          <span class="bui-button__text">+</span>
        </button>
        <span class="bui-u-sr-only" aria-live="assertive" id="group_adults_desc">1 Adultos</span>
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
        <input style="display: none" type="number" id="group_childrens" class="bui-stepper__input" data-bui-ref="input-stepper-field" id="group_children" name="group_children" min="0" max="10" value="0" data-group-children-count="">
        <button class="bui-button bui-button--secondary bui-stepper__subtract-button " id="btn_children_desc" data-bui-ref="input-stepper-subtract-button" type="button" aria-label="Diminuir número de Crianças" aria-describedby="group_children_desc">
          <span class="bui-button__text">−</span>
        </button>
        <span class="bui-stepper__display" id="childrens-qtd" data-bui-ref="input-stepper-value" aria-hidden="true">0</span>
        <button class="bui-button bui-button--secondary bui-stepper__add-button " id="btn_children_asc" data-bui-ref="input-stepper-add-button" type="button" aria-label="Aumentar número de Crianças" aria-describedby="group_children_desc">
          <span class="bui-button__text">+</span>
        </button>
        <span class="bui-u-sr-only" aria-live="assertive" id="group_children_desc">1 Criança</span>
      </div>
    
  </div>

    </div>
  
      <div class="sb-group__children__field clearfix mt-2">
      <div class="row  px-3">
        <div class="col-6">
        <label class="bui-stepper__title pt-4" for="group_children">Idade máxima</label>
        </div>
        <div class="col-5">
    <select name="age" data-group-child-age="0" aria-label="Criança 1: idade" class="sb-group-field-has-error">
      <option class="sb_child_ages_empty_zero" value="">
          
            Idades permitidas
          
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
      
    </select></div>
      </div>
        <label class="sb-searchbox__label -small sb-group__children__label d-none">
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
<div class="sb-searchbox-submit-col -submit-button mt-12">
<button data-sb-id="main" type="submit" class="sb-searchbox__button">
<span class="js-sb-submit-text ">
Pesquisar
</span>
<span class="sb-submit-helper"></span>
</button>
</div>
</div>
</div>
<span data-et-view=""></span>
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

<div class="container">
<div class="row">
<!-- operadores --> 
<div class="col-3">
  <h5 class="text-identity">Operadores</h5>
  <div class="row border-boottom-line p-4">
    <div class="col-10">
      <p style="font-size:14px;">Rede SLA</p>
    </div>
    <div class="col-2">
    <div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
</div>
    </div>

  </div>
  </div>
<!-- results --> 
<div class="col-6">

<!-- results -->
<div class="container">
<div class="row">
  <div class="alert alert-secondary text-success" role="alert">
    <i class="fa fa-info-circle"></i> Pontos de Levantamento e compra do Bilhete de viagem.
</div>
</div>
</div>
<!-- results da pesquisa --> 
<!-- filtros --> 
<div class="row">
  <div class="col-6">
    <!-- numeros results --> 
    <p class="my-3">{{ $n_res = 3 }} resultado(s)</p>
  </div>
  <div class="col-6">
  <form class="form-inline float-right">
  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Ordenar por</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
    <option selected>Hora de Partida</option>
    <option value="1">Preço mais rápido</option>
    <option value="2">Mais rápido</option>
    <option value="3">Directo</option>
  </select>
    </form>
  </div>
</div>
<!-- end filtros --> 

<!-- card-bilhete -->
<div class="card bilhete-card-radius mb-2">
  <div class="card-body">

    <div class="row">
        <div class="col-3 text-left">
        <img src="{{ url('assets/img/logo/logo.png') }}" alt="Operadora" class="operadora-ico mb-1">
        </div>
        <div class="col-4 text-right">
        <img src="https://rnemedia.blob.core.windows.net/images/website/wifi.png" alt="Wifi"  class="svg-ico" data-toggle="tooltip" data-placement="top" title="Wifi">
        <img src="https://rnemedia.blob.core.windows.net/images/website/power_socket.png" alt="Tomadas"  class="svg-ico" data-toggle="tooltip" data-placement="top" title="Tomadas">
        <img src="https://rnemedia.blob.core.windows.net/images/website/comfort_seat.png" alt="Assento confortável"  class="svg-ico" data-toggle="tooltip" data-placement="top" title="Assento Confortável">
        <img src="https://rnemedia.blob.core.windows.net/images/website/active_cleaning.png" alt="Desinfeção" class="svg-ico" data-toggle="tooltip" data-placement="top" title="Desinfeção">
        </div>
        <div class="col-5">
          <h2 class="bilhete-preco">
            15.599,00 kz
          </h2>
        </div>
       </div>

       <div class="row">
         <div class="col-3">
         <div class="hora-local">
          <div class="hora">
            <h5><strong>14:05</strong></h5>
          </div>
          <div class="local">
            Huambo
          </div>
        </div>
         </div>

         <div class="col-4 text-right">
         <div class="hora-local">
          <div class="hora">
            <h5><strong>14:05</strong></h5>
          </div>
          <div class="local">
            Lubango
          </div>
        </div>
         </div>

         <div class="col-5 text-right">
          <div class="hora-local">
          <div class="hora">
            <h5><strong>Tipo</strong></h5>
          </div>
          <div class="local">
            Executivo
          </div>
        </div>
          </div>
       </div>


       <div class="row mt-3">
         <div class="col-3">
         <div class="desc-duracao my-2">
            <span class="text-muted">06h 40m, 387km</span>
          </div>
         </div>
         <div class="col-4 text-right">
           <a href="#" class="btn text-uppercase btn-sm" data-toggle="modal" data-target="#modalItinerario"><strong>Itinerário</strong></a>
         </div>
         <div class="col-5 text-right">
           <button class="btn btn-add btn-danger btn-sm"  data-toggle="modal" data-target="#modalReserva">Reservar Lugar</button>
         </div>
       </div>

  </div>
</div>

<!-- end card-bilhete -->

<div class="card bilhete-card-radius mb-2">
  <div class="card-body">

    <div class="row">
        <div class="col-3 text-left">
        <img src="http://localhost:8000/assets/img/logo/logo.png" alt="Operadora" class="operadora-ico mb-1">
        </div>
        <div class="col-4 text-right">
        <img src="https://rnemedia.blob.core.windows.net/images/website/wifi.png" alt="Wifi" class="svg-ico" data-toggle="tooltip" data-placement="top" title="Wifi">
        <img src="https://rnemedia.blob.core.windows.net/images/website/power_socket.png" alt="Tomadas" class="svg-ico" data-toggle="tooltip" data-placement="top" title="Tomadas">
        <img src="https://rnemedia.blob.core.windows.net/images/website/comfort_seat.png" alt="Assento confortável" class="svg-ico" data-toggle="tooltip" data-placement="top" title="Assento Confortável">
        <img src="https://rnemedia.blob.core.windows.net/images/website/active_cleaning.png" alt="Desinfeção" class="svg-ico" data-toggle="tooltip" data-placement="top" title="Desinfeção">
        </div>
        <div class="col-5">
          <h2 class="bilhete-preco">
            13.255,00 kz
          </h2>
        </div>
       </div>

       <div class="row">
         <div class="col-3">
         <div class="hora-local">
          <div class="hora">
            <h5><strong>4:05</strong></h5>
          </div>
          <div class="local">
            Luanda - Viana
          </div>
        </div>
         </div>

         <div class="col-4 text-right">
         <div class="hora-local">
          <div class="hora">
            <h5><strong>12:05</strong></h5>
          </div>
          <div class="local">
            Uíge
          </div>
        </div>
         </div>
         <div class="col-5 text-right">
          <div class="hora-local">
          <div class="hora">
            <h5><strong>Tipo</strong></h5>
          </div>
          <div class="local">
            Económico
          </div>
        </div>
          </div>
       </div>


       <div class="row mt-3">
         <div class="col-3">
         <div class="desc-duracao my-2">
            <span class="text-muted">06h 40m, 387km</span>
          </div>
         </div>
         <div class="col-4 text-right">
           <a href="#" class="btn text-uppercase btn-sm" data-toggle="modal" data-target="#modalItinerario"><strong>Itinerário</strong></a>
         </div>
         <div class="col-5 text-right">
           <button class="btn btn-add btn-danger btn-sm"   data-toggle="modal" data-target="#modalReserva">Reservar Lugar</button>
         </div>
       </div>

  </div>

</div>

<!-- end card-bilhete -->

<div class="card bilhete-card-radius mb-2">
  <div class="card-body">

    <div class="row">
        <div class="col-3 text-left">
        <img src="http://localhost:8000/assets/img/logo/logo.png" alt="Operadora" class="operadora-ico mb-1">
        </div>
        <div class="col-4 text-right">
        <img src="https://rnemedia.blob.core.windows.net/images/website/wifi.png" alt="Wifi" class="svg-ico" data-toggle="tooltip" data-placement="top" title="Wifi">
        <img src="https://rnemedia.blob.core.windows.net/images/website/power_socket.png" alt="Tomadas" class="svg-ico" data-toggle="tooltip" data-placement="top" title="Tomadas">
        <img src="https://rnemedia.blob.core.windows.net/images/website/comfort_seat.png" alt="Assento confortável" class="svg-ico" data-toggle="tooltip" data-placement="top" title="Assento Confortável">
        <img src="https://rnemedia.blob.core.windows.net/images/website/active_cleaning.png" alt="Desinfeção" class="svg-ico" data-toggle="tooltip" data-placement="top" title="Desinfeção">
        </div>
        <div class="col-5">
          <h2 class="bilhete-preco">
            12.199,00 kz
          </h2>
        </div>
       </div>

       <div class="row">
         <div class="col-3">
         <div class="hora-local">
          <div class="hora">
            <h5><strong>7:05</strong></h5>
          </div>
          <div class="local">
            Bié
          </div>
        </div>
         </div>

         <div class="col-4 text-right">
         <div class="hora-local">
          <div class="hora">
            <h5><strong>11:05</strong></h5>
          </div>
          <div class="local">
            Benguela
          </div>
        </div>
         </div>
          <div class="col-5 text-right">
          <div class="hora-local">
          <div class="hora">
            <h5><strong>Tipo</strong></h5>
          </div>
          <div class="local">
            Clássico
          </div>
        </div>
          </div>
       </div>


       <div class="row mt-3">
         <div class="col-3">
         <div class="desc-duracao my-2">
            <span class="text-muted">06h 40m, 387km</span>
          </div>
         </div>
         <div class="col-4 text-right">
           <a href="#" class="btn text-uppercase btn-sm" data-toggle="modal" data-target="#modalItinerario"><strong>Itinerário</strong></a>
         </div>
         <div class="col-5 text-right">
           <button class="btn btn-add btn-danger btn-sm"  data-toggle="modal" data-target="#modalReserva">Reservar Lugar</button>
         </div>
       </div>

  </div>

</div>

<!-- end card-bilhete -->
</div>

<!-- carrinho de compra -->
<div class="col-3">
<div class="card text-center card-reserve">
  <h5 class="card-header bg-reserve text-left">Carrinho</h5>
  <div class="card-body">
    <p class="card-text text-reserve">O seu carrinho está vazio. Por favor, adicione viagens e continue com a reserva.</p>
    <a href="#" class="btn btn-reserve">Reservar</a>
  </div>
</div>
</div> </div>
</div>
</div></div></div></div></div>
<!-- end results --> 
<!-- end results -->

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="modalItinerario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-header-modal">
        <h5 class="modal-title text-light text-center" id="exampleModalLabel">Itenerário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size:12px">
          <span class="text-white" aria-hidden="true">Fechar</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="p-2 alert alert-warning"> <i class="fa fa-info-circle"></i> Não foi encontrado nenhum Itenerário.</p>
      </div>
     
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalReserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-header-modal">
        <h5 class="modal-title text-light text-center" id="exampleModalLabel">Formulário de Reservas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size:12px">
          <span class="text-white" aria-hidden="true">Fechar</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="spinner-border" role="status">
  <span class="sr-only">Loading...</span>
</div>
        <p class="p-2 alert alert-success"> <i class="fa fa-info-circle"></i> Carregando o Formulário.</p>
      </div>
     
    </div>
  </div>
</div>
@endsection
