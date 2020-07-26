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
        'alert' => BladeUI\Alerts\Alert::class,
        'logout' => BladeUI\Buttons\Logout::class,
        'countdown' => BladeUI\DateTime\Countdown::class,
        'date-time' => BladeUI\DateTime\DateTime::class,
        'pikaday' => BladeUI\DateTime\Pikaday::class,
        'easy-mde' => BladeUI\Editors\EasyMDE::class,
        'trix' => BladeUI\Editors\Trix::class,
        'error' => BladeUI\Forms\Error::class,
        'form' => BladeUI\Forms\Form::class,
        'label' => BladeUI\Forms\Label::class,
        'mapbox' => BladeUI\Maps\Mapbox::class,
        'input' => BladeUI\Forms\Inputs\Input::class,
        'checkbox' => BladeUI\Forms\Inputs\Checkbox::class,
        'input-email' => BladeUI\Forms\Inputs\Email::class,
        'input-password' => BladeUI\Forms\Inputs\Password::class,
        'textarea' => BladeUI\Forms\Inputs\Textarea::class,
        'markdown' => BladeUI\Markdown\Markdown::class,
        'toc' => BladeUI\Markdown\ToC::class,
        'avatar' => BladeUI\Support\Avatar::class,
        'cron' => BladeUI\Support\Cron::class,
        'unsplash' => BladeUI\Support\Unsplash::class,
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

];
