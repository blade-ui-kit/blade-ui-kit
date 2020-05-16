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
        BladeUI\Buttons\Button::class,
        BladeUI\Buttons\Submit::class,
        BladeUI\Forms\Form::class,
        BladeUI\Forms\Input::class,
        BladeUI\Support\Cron::class,
        BladeUI\Support\DateTime::class,
        BladeUI\Support\Markdown::class,
        BladeUI\Support\Unsplash::class,
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
