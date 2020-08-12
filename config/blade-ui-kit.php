<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all components that should be loaded for your app.
    | By default all components from Blade UI Kit are loaded in.
    |
    */

    'components' => [
        'alert' => BladeUIKit\Components\Alerts\Alert::class,
        'form-button' => BladeUIKit\Components\Buttons\FormButton::class,
        'logout' => BladeUIKit\Components\Buttons\Logout::class,
        'countdown' => BladeUIKit\Components\DateTime\Countdown::class,
        'date-time' => BladeUIKit\Components\DateTime\DateTime::class,
        'pikaday' => BladeUIKit\Components\DateTime\Pikaday::class,
        'easy-mde' => BladeUIKit\Components\Editors\EasyMDE::class,
        'trix' => BladeUIKit\Components\Editors\Trix::class,
        'error' => BladeUIKit\Components\Forms\Error::class,
        'form' => BladeUIKit\Components\Forms\Form::class,
        'label' => BladeUIKit\Components\Forms\Label::class,
        'input' => BladeUIKit\Components\Forms\Inputs\Input::class,
        'checkbox' => BladeUIKit\Components\Forms\Inputs\Checkbox::class,
        'color-picker' => BladeUIKit\Components\Forms\Inputs\ColorPicker::class,
        'input-email' => BladeUIKit\Components\Forms\Inputs\Email::class,
        'input-password' => BladeUIKit\Components\Forms\Inputs\Password::class,
        'textarea' => BladeUIKit\Components\Forms\Inputs\Textarea::class,
        'html' => BladeUIKit\Components\Layouts\Html::class,
        'social-meta' => BladeUIKit\Components\Layouts\SocialMeta::class,
        'mapbox' => BladeUIKit\Components\Maps\Mapbox::class,
        'markdown' => BladeUIKit\Components\Markdown\Markdown::class,
        'toc' => BladeUIKit\Components\Markdown\ToC::class,
        'dropdown' => BladeUIKit\Components\Navigation\Dropdown::class,
        'avatar' => BladeUIKit\Components\Support\Avatar::class,
        'cron' => BladeUIKit\Components\Support\Cron::class,
        'unsplash' => BladeUIKit\Components\Support\Unsplash::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all the Livewire components that should be loaded
    | for your app. By default all components from Blade UI Kit are loaded in.
    |
    */

    'livewire' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Components Prefix
    |--------------------------------------------------------------------------
    |
    | This value will set a prefix for all Blade UI Kit components.
    | By default it's empty. This is useful if you want to avoid
    | collision with components from other libraries.
    |
    | If set with "ui", for example, you can reference components like:
    |
    | <x-ui-button />
    |
    */

    'prefix' => '',

    /*
    |--------------------------------------------------------------------------
    | Third Party Asset Libraries
    |--------------------------------------------------------------------------
    |
    | These settings hold reference to all third party libraries and their
    | asset files served through a CDN. Individual components can require
    | these asset files through their static `$assets` property.
    |
    */

    'assets' => [

        'alpine' => 'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js',

        'easy-mde' => [
            'https://unpkg.com/easymde/dist/easymde.min.css',
            'https://unpkg.com/easymde/dist/easymde.min.js',
        ],

        'moment' => [
            'https://cdn.jsdelivr.net/npm/moment@2.26.0/moment.min.js',
            'https://cdn.jsdelivr.net/npm/moment-timezone@0.5.31/builds/moment-timezone-with-data.min.js',
        ],

        'pikaday' => [
            'https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css',
            'https://cdn.jsdelivr.net/npm/pikaday/pikaday.js',
        ],

        'trix' => [
            'https://unpkg.com/trix@1.2.3/dist/trix.css',
            'https://unpkg.com/trix@1.2.3/dist/trix.js',
        ],

        'pickr' => [
            'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css',
            'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js',
        ],

        'mapbox' => [
            'https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css',
            'https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js',
        ],

    ],

];
