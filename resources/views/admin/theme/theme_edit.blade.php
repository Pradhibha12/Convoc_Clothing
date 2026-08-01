@extends('layouts.admin')
@push('title', get_phrase('Theme edit'))
@push('meta')
@endpush
@push('css')
    <style>
        .min-w-100px {
            min-width: 100px;
        }
    </style>
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-2 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
            <ul class="nav nav-pills mb-3 px-2" id="pills-tab" role="tablist">
               
                <li class="nav-item" role="presentation">
                    <button class="nav-link  active" id="pills-theme-config-tab" data-bs-toggle="pill" data-bs-target="#pills-theme-config" type="button" role="tab" aria-controls="pills-theme-config" aria-selected="false">{{ get_phrase('Theme Configuration') }}</button>
                </li>
            </ul>
                <a href="{{ route('admin.themes') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-arrow-alt-left"></span>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
            </div>
        </div>
    </div>

    

    <div class="tab-content" id="pills-tabContent">
      
        {{-- tab-2 --}}
        <div class="tab-pane fade  show active " id="pills-theme-config" role="tabpanel" aria-labelledby="pills-theme-config-tab" tabindex="0">
            <div class="row">
                <div class="col-md-7">
                    <form action="{{ route('admin.theme.update', ['id' => $theme->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @php

                            $general = json_decode($theme->general, true);
                            $topbar = json_decode($theme->topbar, true);
                            $header = json_decode($theme->header, true);
                            $page_titles = json_decode($theme->page_title, true);
                            $primary_button = json_decode($theme->primary_button, true);
                            $secondary_button = json_decode($theme->secondary_button, true);
                            $body = json_decode($theme->body, true);
                            $filter = json_decode($theme->filter, true);
                            $theme_button = json_decode($theme->theme_button, true);

                            
                        @endphp

                        <div class="ol-card p-4 mb-4">
                            <div class="ol-card-body">
                                <h3 class="title fs-16px mb-4">{{ get_phrase('General configuration') }}</h3>
                                     <div class="row">
                                        <div class="col-auto mb-2 w-100 mb-3">
                                            <label for="general_light_color" class="form-label ol-form-label">{{ get_phrase('Font family') }}</label>
                                            <select name="general[font_family]" class="ol-select2">
                                                <option value="Open Sans" @if ($general['font_family'] == 'Open Sans') selected @endif>{{ get_phrase('Open Sans') }}</option>
                                                <option value="Inter" @if ($general['font_family'] == 'Inter') selected @endif>{{ get_phrase('Inter') }}</option>
                                                <option value="Manrope" @if ($general['font_family'] == 'Manrope') selected @endif>{{ get_phrase('Manrope') }}</option>
                                                <option value="Antonio" @if ($general['font_family'] == 'Antonio') selected @endif>{{ get_phrase('Antonio') }}</option>
                                                <option value="Mulish" @if ($general['font_family'] == 'Mulish') selected @endif>{{ get_phrase('Mulish') }}</option>
                                                <option value="Albert Sans" @if ($general['font_family'] == 'Albert Sans') selected @endif>{{ get_phrase('Albert Sans') }}</option>
                                                <option value="Oswald" @if ($general['font_family'] == 'Oswald') selected @endif>{{ get_phrase('Oswald') }}</option>
                                                <option value="Satoshi" @if ($general['font_family'] == 'Satoshi') selected @endif>{{ get_phrase('Satoshi') }}</option>
                                                <option value="Lato" @if ($general['font_family'] == 'Lato') selected @endif>{{ get_phrase('Lato') }}</option>
                                                <option value="Mica Valo" @if ($general['font_family'] == 'Mica Valo') selected @endif>{{ get_phrase('Mica Valo') }}</option>
                                                <option value="Century Gothic" @if ($general['font_family'] == 'Century Gothic') selected @endif>{{ get_phrase('Century Gothic') }}</option>
                                                <option value="Runtime" @if ($general['font_family'] == 'Runtime') selected @endif>{{ get_phrase('Runtime') }}</option>
                                                <option value="Staatliches" @if ($general['font_family'] == 'Staatliches') selected @endif>{{ get_phrase('Staatliches') }}</option>
                                                <option value="DM Sans" @if ($general['font_family'] == 'DM Sans') selected @endif>{{ get_phrase('DM Sans') }}</option>
                                                <option value="Onest" @if ($general['font_family'] == 'Onest') selected @endif>{{ get_phrase('Onest') }}</option>
                                                <option value="Bricolage Grotesque" @if ($general['font_family'] == 'Bricolage Grotesque') selected @endif>{{ get_phrase('Bricolage Grotesque') }}</option>
                                                <option value="Manuale" @if ($general['font_family'] == 'Manuale') selected @endif>{{ get_phrase('Manuale') }}</option>
                                                <option value="Plus Jakarta Sans" @if ($general['font_family'] == 'Plus Jakarta Sans') selected @endif>{{ get_phrase('Plus Jakarta Sans') }}</option>
                                                <option value="Outfit" @if ($general['font_family'] == 'Outfit') selected @endif>{{ get_phrase('Outfit') }}</option>
                                                <option value="Gilroy" @if ($general['font_family'] == 'Gilroy') selected @endif>{{ get_phrase('Gilroy') }}</option>
                                                <option value="Bebas Neue" @if ($general['font_family'] == 'Bebas Neue') selected @endif>{{ get_phrase('Bebas Neue') }}</option>
                                                <option value="Space Grotesk" @if ($general['font_family'] == 'Space Grotesk') selected @endif>{{ get_phrase('Space Grotesk') }}</option>
                                                <option value="FSP DEMO - Juana Alt" @if ($general['font_family'] == 'FSP DEMO - Juana Alt') selected @endif>{{ get_phrase('FSP DEMO - Juana Alt') }}</option>
                                                <option value="Reigo" @if ($general['font_family'] == 'Reigo') selected @endif>{{ get_phrase('Reigo') }}</option>
                                                <option value="Didact Gothic" @if ($general['font_family'] == 'Didact Gothic') selected @endif>{{ get_phrase('Didact Gothic') }}</option>
                                                <option value="Barlow" @if ($general['font_family'] == 'Barlow') selected @endif>{{ get_phrase('Barlow') }}</option>
                                                <option value="Bebas Neue" @if ($general['font_family'] == 'Bebas Neue') selected @endif>{{ get_phrase('Bebas Neue') }}</option>
                                                
                                            </select>
                                        </div>
                                        <div class="col-auto mb-2 w-100 mb-3">
                                            <label for="title_font_family" class="form-label ol-form-label">{{ get_phrase('Title Font family') }}</label>
                                            <select name="general[title_font_family]" class="ol-select2">
                                                <option value="Open Sans" @if ($general['title_font_family'] == 'Open Sans') selected @endif>{{ get_phrase('Open Sans') }}</option>
                                                <option value="Inter" @if ($general['title_font_family'] == 'Inter') selected @endif>{{ get_phrase('Inter') }}</option>
                                                <option value="Manrope" @if ($general['title_font_family'] == 'Manrope') selected @endif>{{ get_phrase('Manrope') }}</option>
                                                <option value="Antonio" @if ($general['title_font_family'] == 'Antonio') selected @endif>{{ get_phrase('Antonio') }}</option>
                                                <option value="Mulish" @if ($general['title_font_family'] == 'Mulish') selected @endif>{{ get_phrase('Mulish') }}</option>
                                                <option value="Mica Valo" @if ($general['title_font_family'] == 'Mica Valo') selected @endif>{{ get_phrase('Mica Valo') }}</option>
                                                <option value="Oswald" @if ($general['title_font_family'] == 'Oswald') selected @endif>{{ get_phrase('Oswald') }}</option>
                                                <option value="Satoshi" @if ($general['title_font_family'] == 'Satoshi') selected @endif>{{ get_phrase('Satoshi') }}</option>
                                                <option value="Lato" @if ($general['title_font_family'] == 'Lato') selected @endif>{{ get_phrase('Lato') }}</option>
                                                <option value="Gilroy" @if ($general['title_font_family'] == 'Gilroy') selected @endif>{{ get_phrase('Gilroy') }}</option>
                                                <option value="Albert Sans" @if ($general['title_font_family'] == 'Albert Sans') selected @endif>{{ get_phrase('Albert Sans') }}</option>
                                                <option value="Playfair Display" @if ($general['title_font_family'] == 'Playfair Display') selected @endif>{{ get_phrase('Playfair Display') }}</option>
                                                <option value="Century Gothic" @if ($general['title_font_family'] == 'Century Gothic') selected @endif>{{ get_phrase('Century Gothic') }}</option>
                                                <option value="Runtime" @if ($general['title_font_family'] == 'Runtime') selected @endif>{{ get_phrase('Runtime') }}</option>
                                                <option value="Staatliches" @if ($general['title_font_family'] == 'Staatliches') selected @endif>{{ get_phrase('Staatliches') }}</option>
                                                <option value="DM Sans" @if ($general['title_font_family'] == 'DM Sans') selected @endif>{{ get_phrase('DM Sans') }}</option>
                                                <option value="Onest" @if ($general['title_font_family'] == 'Onest') selected @endif>{{ get_phrase('Onest') }}</option>
                                                <option value="Bricolage Grotesque" @if ($general['title_font_family'] == 'Bricolage Grotesque') selected @endif>{{ get_phrase('Bricolage Grotesque') }}</option>
                                                <option value="Manuale" @if ($general['title_font_family'] == 'Manuale') selected @endif>{{ get_phrase('Manuale') }}</option>
                                                <option value="Plus Jakarta Sans" @if ($general['title_font_family'] == 'Plus Jakarta Sans') selected @endif>{{ get_phrase('Plus Jakarta Sans') }}</option>
                                                <option value="Bebas Neue" @if ($general['title_font_family'] == 'Bebas Neue') selected @endif>{{ get_phrase('Bebas Neue') }}</option>
                                                <option value="Space Grotesk" @if ($general['title_font_family'] == 'Space Grotesk') selected @endif>{{ get_phrase('Space Grotesk') }}</option>
                                                <option value="FSP DEMO - Juana Alt" @if ($general['title_font_family'] == 'FSP DEMO - Juana Alt') selected @endif>{{ get_phrase('FSP DEMO - Juana Alt') }}</option>
                                                <option value="Reigo" @if ($general['title_font_family'] == 'Reigo') selected @endif>{{ get_phrase('Reigo') }}</option>
                                                <option value="Didact Gothic" @if ($general['title_font_family'] == 'Didact Gothic') selected @endif>{{ get_phrase('Didact Gothic') }}</option>
                                                <option value="Barlow" @if ($general['title_font_family'] == 'Barlow') selected @endif>{{ get_phrase('Barlow') }}</option>
                                                <option value="Bebas Neue" @if ($general['title_font_family'] == 'Bebas Neue') selected @endif>{{ get_phrase('Bebas Neue') }}</option>
                                            </select>
                                        </div>
                                        
                                         <div class="col-auto mb-2 w-100">
                                            <label for="body_background_color" class="form-label ol-form-label">{{ get_phrase('Theme color') }}</label>
                                              <div class="d-flex align-items-center gap-2">
                                                <input  type="color" value="{{ $body['background-color'] }}"  name="body[background-color]"  id="body_background_color"  class="form-control form-control-color min-w-100px"  oninput="document.getElementById('body_background_text').value = this.value">
                                                <input  type="text"  value="{{ $body['background-color'] }}"   
                                                    id="body_background_text"   class="form-control min-w-100px"  oninput="document.getElementById('body_background_color').value = this.value">
                                              </div>
                                          </div>
                                         <div class="col-auto mb-2 w-100">
                                            <label for="body_text_color" class="form-label ol-form-label">{{ get_phrase('Theme Text color') }}</label>
                                              <div class="d-flex align-items-center gap-2">
                                                <input  type="color" value="{{ $body['color'] }}"  name="body[color]"  id="body_text_color"  class="form-control form-control-color min-w-100px"  oninput="document.getElementById('body_text').value = this.value">
                                                <input  type="text"  value="{{ $body['color'] }}"   
                                                    id="body_text"   class="form-control min-w-100px"  oninput="document.getElementById('body_text_color').value = this.value">
                                              </div>
                                          </div>
                                         <div class="col-auto mb-2 w-100">
                                            <label for="card_background_color" class="form-label ol-form-label">{{ get_phrase('Product Card Background color') }}</label>
                                              <div class="d-flex align-items-center gap-2">
                                                <input  type="color" value="{{ $body['card-background-color'] }}"  name="body[card-background-color]"  id="card_background_color"  class="form-control form-control-color min-w-100px"  oninput="document.getElementById('card_background_text').value = this.value">
                                                <input  type="text"  value="{{ $body['card-background-color'] ?? '#ffffff' }}"  name="body[card-background-color]" 
                                                    id="card_background_text"   class="form-control min-w-100px"  oninput="document.getElementById('card_background_color').value = this.value">
                                              </div>
                                          </div>
                                         <div class="col-auto mb-2 w-100">
                                            <label for="section_background_color" class="form-label ol-form-label">{{ get_phrase('Section Background color') }}</label>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="color" 
                                                    value="{{ Str::startsWith($body['section-background-color'] ?? '', '#') ? $body['section-background-color'] : '#000000' }}" 
                                                    name="body[section-background-color]"  
                                                    id="section_background_color"  
                                                    class="form-control form-control-color min-w-100px"  
                                                    oninput="document.getElementById('section_background_text').value = this.value">
                                                <input type="text" 
                                                name="body[section-background-color]"
                                                    value="{{ $body['section-background-color'] ?? '#ffffff' }}"   
                                                    id="section_background_text"  
                                                    class="form-control min-w-100px"  
                                                     placeholder="Ex: #FFFFFF, #FFFFFFB3, rgba(255,255,255,0.7), linear-gradient(...)"
                                                oninput="if(this.value.startsWith('#')) document.getElementById('section_background_color').value = this.value;">
                                            </div>
                                        </div>

                                         <div class="col-auto mb-2 w-100">
                                            <label for="footer_background_color" class="form-label ol-form-label">{{ get_phrase('Footer Background color') }}</label>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="color" 
                                                    value="{{ Str::startsWith($body['footer-background-color'] ?? '', '#') ? $body['footer-background-color'] : '#000000' }}"  
                                                    name="body[footer-background-color]"  
                                                    id="footer_background_color"  
                                                    class="form-control form-control-color min-w-100px"  
                                                    oninput="document.getElementById('footer_background_text').value = this.value">
                                                <input type="text" 
                                                    name="body[footer-background-color]"
                                                    value="{{ $body['footer-background-color'] ?? '' }}"   
                                                    id="footer_background_text"  
                                                    class="form-control min-w-100px"  
                                                     placeholder="Ex: #FFFFFF, #FFFFFFB3, rgba(255,255,255,0.7), linear-gradient(...)"
                                                    oninput="if(this.value.startsWith('#')) document.getElementById('footer_background_color').value = this.value;">
                                            </div>
                                        </div>

                                    </div>
                                   
                               
                                
                            </div>
                        </div>

                        <div class="ol-card p-4 mb-4">
                            <div class="ol-card-body">
                                <h3 class="title fs-16px mb-3">{{ get_phrase('Header') }}:</h3>
                               <div class="row">
                                    {{-- Header Background color --}}
                                    <div class="col-auto mb-2 w-100">
                                        <label for="header_background_color" class="form-label ol-form-label">{{ get_phrase('Background color') }}</label>
                                        <div class="d-flex align-items-center gap-2">
                                            

                                                <input type="color"  
                                                value="{{ Str::startsWith($header['background-color'] ?? '', '#') ? $header['background-color'] : '#000000' }}" 
                                                id="header_background_color"  
                                                class="form-control form-control-color min-w-100px"
                                                oninput="document.getElementById('header_background_color_text').value = this.value">
                                            <input type="text"  
                                                name="header[background-color]"  
                                                value="{{ $header['background-color'] ?? '' }}"   
                                                id="header_background_color_text"  
                                                class="form-control min-w-100px"
                                                placeholder="Ex: #FFFFFF, #FFFFFFB3, rgba(255,255,255,0.7), linear-gradient(...)"
                                                oninput="if(this.value.startsWith('#')) document.getElementById('header_background_color').value = this.value;">
                                        </div>
                                    </div>

                                    
                                </div>

                            </div>
                        </div>


                        <div class="ol-card p-4 mb-4">
                            <div class="ol-card-body">
                                <h3 class="title fs-16px mb-3">{{ get_phrase('Page Breadcrumb') }}:</h3>
                                <div class="row">
                                    {{-- Page Title Background color --}}
                                   <div class="col-auto mb-2 w-100">
                                        <label for="page_title_background_color" class="form-label ol-form-label">{{ get_phrase('Background color') }}</label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="color"  
                                                value="{{ Str::startsWith($page_titles['background-color'] ?? '', '#') ? $page_titles['background-color'] : '#000000' }}" 
                                                id="page_title_background_color_picker"  
                                                class="form-control form-control-color min-w-100px"
                                                oninput="document.getElementById('page_title_background_color_text').value = this.value">
                                            <input type="text"  
                                                name="page_title[background-color]"  
                                                value="{{ $page_titles['background-color'] ?? '' }}"   
                                                id="page_title_background_color_text"  
                                                class="form-control min-w-100px"
                                                placeholder="Ex: #FFFFFF, #FFFFFFB3, rgba(255,255,255,0.7), linear-gradient(...)"
                                                oninput="if(this.value.startsWith('#')) document.getElementById('page_title_background_color_picker').value = this.value;">
                                        </div>

                                    </div>

                                    
                                </div>

                            </div>
                        </div>
                     <div class="ol-card p-4 mb-4">
                        <div class="ol-card-body">
                            <h3 class="title fs-16px mb-3">{{ get_phrase('Theme button') }}:</h3>
                            <div class="row">

                                {{-- Theme Button Background color --}}
                                <div class="col-auto mb-2 w-100">
                                    <label for="theme_button_background_color" class="form-label ol-form-label">{{ get_phrase('Background color') }}</label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="color"  
                                            value="{{ Str::startsWith($theme_button['background-color'] ?? '', '#') ? $theme_button['background-color'] : '' }}" 
                                            id="theme_button_background_color_picker"  
                                            class="form-control form-control-color min-w-100px"
                                            oninput="document.getElementById('theme_button_background_color_text').value = this.value">

                                        <input type="text"  
                                            name="theme_button[background-color]"
                                            value="{{ $theme_button['background-color'] ?? '' }}"   
                                            id="theme_button_background_color_text"  
                                            class="form-control min-w-100px"
                                            placeholder="Ex: #FFFFFF, rgba(255,255,255,0.7), linear-gradient(...)"
                                            oninput="if(this.value.startsWith('#')) document.getElementById('theme_button_background_color_picker').value = this.value;">
                                    </div>
                                </div>

                                {{-- Theme Button Text color --}}
                                <div class="col-auto mb-2 w-100">
                                    <label for="theme_button_color" class="form-label ol-form-label">{{ get_phrase('Text color') }}</label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="color"  
                                            value="{{ Str::startsWith($theme_button['color'] ?? '', '#') ? $theme_button['color'] : '#000000' }}" 
                                            id="theme_button_color_picker"   
                                            class="form-control form-control-color min-w-100px"  
                                            oninput="document.getElementById('theme_button_color_text').value = this.value">

                                        <input type="text" 
                                            name="theme_button[color]"
                                            value="{{ $theme_button['color'] ?? '' }}"   
                                            id="theme_button_color_text" 
                                            class="form-control min-w-100px"  
                                            placeholder="Ex: #000000 or rgba(...)"
                                            oninput="if(this.value.startsWith('#')) document.getElementById('theme_button_color_picker').value = this.value;">
                                    </div>
                                </div>

                                {{-- Theme Button Hover Background color --}}
                                <div class="col-auto mb-2 w-100 d-none">
                                    <label for="theme_button_hover_background_color" class="form-label ol-form-label">{{ get_phrase('Background hover color') }}</label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="color"  
                                            value="{{ Str::startsWith($theme_button['hover-background-color'] ?? '', '#') ? $theme_button['hover-background-color'] : '' }}" 
                                            id="theme_button_hover_background_color_picker"  
                                            class="form-control form-control-color min-w-100px"
                                            oninput="document.getElementById('theme_button_hover_background_color_text').value = this.value">

                                        <input type="text"  
                                            name="theme_button[hover-background-color]"
                                            value="{{ $theme_button['hover-background-color'] ?? '' }}"   
                                            id="theme_button_hover_background_color_text"  
                                            class="form-control min-w-100px"
                                            placeholder="Ex: #FFFFFF, rgba(...), linear-gradient(...)"
                                            oninput="if(this.value.startsWith('#')) document.getElementById('theme_button_hover_background_color_picker').value = this.value;">
                                    </div>
                                </div>

                                {{-- Theme Button Hover Text color --}}
                                <div class="col-auto mb-2 w-100 d-none">
                                    <label for="theme_button_hover_color" class="form-label ol-form-label">{{ get_phrase('Text hover color') }}</label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="color"  
                                            value="{{ Str::startsWith($theme_button['hover-color'] ?? '', '#') ? $theme_button['hover-color'] : '#000000' }}" 
                                            id="theme_button_hover_color_picker"   
                                            class="form-control form-control-color min-w-100px"  
                                            oninput="document.getElementById('theme_button_hover_color_text').value = this.value">

                                        <input type="text" 
                                            name="theme_button[hover-color]"
                                            value="{{ $theme_button['hover-color'] ?? '' }}"   
                                            id="theme_button_hover_color_text" 
                                            class="form-control min-w-100px"  
                                            placeholder="Ex: #000000 or rgba(...)"
                                            oninput="if(this.value.startsWith('#')) document.getElementById('theme_button_hover_color_picker').value = this.value;">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                        <div class="ol-card p-4 mb-4">
                            <div class="ol-card-body">
                                <h3 class="title fs-16px mb-3">{{ get_phrase('Primary button (Dark)') }}:</h3>
                               <div class="row">
                                    {{-- Primary Button Background color --}}
                                   <div class="col-auto mb-2 w-100">
                                        <label for="primary_button_background_color" class="form-label ol-form-label">{{ get_phrase('Background color') }}</label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input  type="color"  value="{{ $primary_button['background-color'] }}" 
                                                name="primary_button[background-color]"   id="primary_button_background_color"  class="form-control form-control-color min-w-100px"  oninput="document.getElementById('primary_button_background_color_text').value = this.value">
                                            
                                            <input  type="text"  value="{{ $primary_button['background-color'] }}"   
                                                id="primary_button_background_color_text"  class="form-control min-w-100px"  oninput="document.getElementById('primary_button_background_color').value = this.value">
                                        </div>
                                    </div>

                                    {{-- Primary Button Text color --}}
                                  <div class="col-auto mb-2 w-100">
                                        <label for="primary_button_color" class="form-label ol-form-label">{{ get_phrase('Text color') }}</label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input  type="color"  value="{{ $primary_button['color'] }}"   name="primary_button[color]" id="primary_button_color"   class="form-control form-control-color min-w-100px"  oninput="document.getElementById('primary_button_color_text').value = this.value">
                                            
                                            <input  type="text" value="{{ $primary_button['color'] }}"   
                                                id="primary_button_color_text" class="form-control min-w-100px"  oninput="document.getElementById('primary_button_color').value = this.value">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        
                            <div class="ol-card p-4 mb-4">
                                <div class="ol-card-body">
                                    <h3 class="title fs-16px mb-3">{{ get_phrase('Secondary button') }}:</h3>
                                    <div class="row">
                                            {{-- Secondary Button Background color --}}
                                           <div class="col-auto mb-2 w-100">
                                                <label for="secondary_button_background_color" class="form-label ol-form-label">{{ get_phrase('Background color') }}</label>
                                                <div class="d-flex align-items-center gap-2">
                                                    <input  type="color"  value="{{ Str::startsWith($secondary_button['background-color'] ?? '', '#') ? $secondary_button['background-color'] : '#000000' }}"
                                                        name="secondary_button[background-color]"  id="secondary_button_background_color"  class="form-control form-control-color min-w-100px"   oninput="document.getElementById('secondary_button_background_color_text').value = this.value">
                                                    
                                                    <input name="secondary_button[background-color]"  type="text"  value="{{ $secondary_button['background-color'] }}"   
                                                        id="secondary_button_background_color_text"  class="form-control min-w-100px"
                                                        oninput="document.getElementById('secondary_button_background_color').value = this.value">
                                                </div>
                                            </div>
                                            {{-- Secondary Button Background hover color --}}
                                           <div class="col-auto mb-2 w-100">
                                                <label for="secondary_button_background_hover_color" class="form-label ol-form-label">{{ get_phrase('Background Hover color') }}</label>
                                                <div class="d-flex align-items-center gap-2">
                                                    <input  type="color" value="{{ Str::startsWith($secondary_button['background-hover-color'] ?? '', '#') ? $secondary_button['background-hover-color'] : '#000000' }}"  
                                                        name="secondary_button[background-hover-color]"  id="secondary_button_background_hover_color"  class="form-control form-control-color min-w-100px"   oninput="document.getElementById('secondary_button_background_hover_text').value = this.value">
                                                    
                                                    <input  name="secondary_button[background-hover-color]" type="text"  value="{{ $secondary_button['background-hover-color'] }}"   
                                                        id="secondary_button_background_hover_text"  class="form-control min-w-100px"
                                                        oninput="document.getElementById('secondary_button_background_hover_color').value = this.value">
                                                </div>
                                            </div>

                                            {{-- Secondary Button Text color --}}
                                             <div class="col-auto mb-2 w-100">
                                                <label for="secondary_button_color" class="form-label ol-form-label">{{ get_phrase('Text color') }}</label>
                                                  <div class="d-flex align-items-center gap-2">
                                                    <input   type="color"  value="{{ Str::startsWith($secondary_button['color'] ?? '', '#') ? $secondary_button['color'] : '#000000' }}"   name="secondary_button[color]"  
                                                        id="secondary_button_color" class="form-control form-control-color min-w-100px" oninput="document.getElementById('secondary_button_color_text').value = this.value">
                                                         <input  name="secondary_button[color]"  type="text"  value="{{ $secondary_button['color'] }}"   
                                                        id="secondary_button_color_text"   class="form-control min-w-100px" oninput="document.getElementById('secondary_button_color').value = this.value">
                                                   </div>
                                               </div>
                                            {{-- Secondary Button Text color --}}
                                             <div class="col-auto mb-2 w-100">
                                                <label for="secondary_button_hover_color" class="form-label ol-form-label">{{ get_phrase('Text Hover color') }}</label>
                                                  <div class="d-flex align-items-center gap-2">
                                                    <input   type="color"  value="{{ Str::startsWith($secondary_button['hover-color'] ?? '', '#') ? $secondary_button['hover-color'] : '#000000' }}"   name="secondary_button[hover-color]"  
                                                        id="secondary_button_hover_color" class="form-control form-control-color min-w-100px" oninput="document.getElementById('secondary_button_hover_color_text').value = this.value">
                                                         <input  type="text" name="secondary_button[hover-color]"  value="{{ $secondary_button['hover-color'] }}"   
                                                        id="secondary_button_hover_color_text"   class="form-control min-w-100px" oninput="document.getElementById('secondary_button_hover_color').value = this.value">
                                                   </div>
                                               </div>

                                        </div>

                                </div>
                            </div>

                            <div class="ol-card p-4 mb-4">
                            <div class="ol-card-body">
                                <h3 class="title fs-16px mb-3">{{ get_phrase('Top bar') }}</h3>
                                
                                <div class="row">
                                    {{-- Background color --}}
                                    <div class="col-auto mb-2 w-100">
                                        <label for="topbar_background_color" class="form-label ol-form-label">{{ get_phrase('Background color') }}</label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="color"  
                                                value="{{ Str::startsWith($topbar['background-color'] ?? '', '#') ? $topbar['background-color'] : '#000000' }}" 
                                                id="topbar_background_color"  
                                                class="form-control form-control-color min-w-100px"
                                                oninput="document.getElementById('topbar_background_color_text').value = this.value">
                                            <input type="text"  
                                                name="topbar[background-color]"  
                                                value="{{ $topbar['background-color'] ?? '' }}"   
                                                id="topbar_background_color_text"  
                                                class="form-control min-w-100px"
                                                placeholder="Ex: #FFFFFF, #FFFFFFB3, rgba(255,255,255,0.7), linear-gradient(...)"
                                                oninput="if(this.value.startsWith('#')) document.getElementById('topbar_background_color').value = this.value;">
                                        </div>
                                    </div>

                                    {{-- Text color --}}
                                    <div class="col-auto mb-2 w-100">
                                        <label for="topbar_color" class="form-label ol-form-label">{{ get_phrase('Text color') }}</label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input   type="color"  
                                                value="{{ $topbar['color'] ?? '' }}"   name="topbar[color]"    id="topbar_color"   class="form-control form-control-color min-w-100px"   oninput="document.getElementById('topbar_color_text').value = this.value">
                                            
                                            <input name="topbar[color]"   type="text" value="{{ $topbar['color'] ?? '' }}"   
                                                id="topbar_color_text"  class="form-control min-w-100px"
                                                oninput="document.getElementById('topbar_color').value = this.value">
                                        </div>
                                    </div>

                                   
                                </div>

                            </div>
                        </div>


                        <div class="ol-card p-4 mb-4">
                            <div class="ol-card-body">
                                <div class="row">
                                    <h3 class="title fs-16px mb-3">{{ get_phrase('Filter') }}:</h3>
                                    <div class="row">
                                        {{-- Filter Background color --}}
                                        <div class="col-auto mb-2 w-100">
                                            <label for="filter_background_color" class="form-label ol-form-label">{{ get_phrase('Background color') }}</label>
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="color" value="{{ $filter['background-color'] }}" name="filter[background-color]"  
                                                    id="filter_background_color"  class="form-control form-control-color min-w-100px"
                                                    oninput="document.getElementById('filter_background_color_text').value = this.value">
                                                <input  type="text" value="{{ $filter['background-color'] }}" id="filter_background_color_text"  
                                                    class="form-control min-w-100px" oninput="document.getElementById('filter_background_color').value = this.value">
                                            </div>
                                        </div>

                                        {{-- Filter Text color --}}
                                        <div class="col-auto mb-2 w-100">
                                            <label for="filter_color" class="form-label ol-form-label">{{ get_phrase('Text color') }}</label>
                                            <div class="d-flex align-items-center gap-2">
                                                <input  type="color" value="{{ $filter['color'] }}" name="filter[color]"  
                                                    id="filter_color"  class="form-control form-control-color min-w-100px"  oninput="document.getElementById('filter_color_text').value = this.value">
                                                <input   type="text"   value="{{ $filter['color'] }}"   
                                                    id="filter_color_text"   class="form-control min-w-100px" oninput="document.getElementById('filter_color').value = this.value">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <button class="btn ol-btn-primary">{{ get_phrase('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('js')
@endpush
