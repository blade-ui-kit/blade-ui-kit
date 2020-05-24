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
        'button' => BladeUI\Buttons\Button::class,
        'submit' => BladeUI\Buttons\Submit::class,
        'error' => BladeUI\Forms\Error::class,
        'form' => BladeUI\Forms\Form::class,
        'label' => BladeUI\Forms\Label::class,
        'mapbox' => BladeUI\Maps\Mapbox::class,
        'input' => BladeUI\Forms\Inputs\Input::class,
        'checkbox' => BladeUI\Forms\Inputs\Checkbox::class,
        'input-email' => BladeUI\Forms\Inputs\Email::class,
        'input-password' => BladeUI\Forms\Inputs\Password::class,
        'textarea' => BladeUI\Forms\Inputs\Textarea::class,
        'cron' => BladeUI\Support\Cron::class,
        'date-time' => BladeUI\Support\DateTime::class,
        'markdown' => BladeUI\Support\Markdown::class,
        'unsplash' => BladeUI\Support\Unsplash::class,
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
