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
        'alert' => BladeUIKit\Alerts\Alert::class,
        'form-button' => BladeUIKit\Buttons\FormButton::class,
        'logout' => BladeUIKit\Buttons\Logout::class,
        'countdown' => BladeUIKit\DateTime\Countdown::class,
        'date-time' => BladeUIKit\DateTime\DateTime::class,
        'pikaday' => BladeUIKit\DateTime\Pikaday::class,
        'easy-mde' => BladeUIKit\Editors\EasyMDE::class,
        'trix' => BladeUIKit\Editors\Trix::class,
        'error' => BladeUIKit\Forms\Error::class,
        'form' => BladeUIKit\Forms\Form::class,
        'label' => BladeUIKit\Forms\Label::class,
        'input' => BladeUIKit\Forms\Inputs\Input::class,
        'checkbox' => BladeUIKit\Forms\Inputs\Checkbox::class,
        'color-picker' => BladeUIKit\Forms\Inputs\ColorPicker::class,
        'input-email' => BladeUIKit\Forms\Inputs\Email::class,
        'input-password' => BladeUIKit\Forms\Inputs\Password::class,
        'textarea' => BladeUIKit\Forms\Inputs\Textarea::class,
        'html' => BladeUIKit\Layouts\Html::class,
        'mapbox' => BladeUIKit\Maps\Mapbox::class,
        'markdown' => BladeUIKit\Markdown\Markdown::class,
        'toc' => BladeUIKit\Markdown\ToC::class,
        'avatar' => BladeUIKit\Support\Avatar::class,
        'cron' => BladeUIKit\Support\Cron::class,
        'unsplash' => BladeUIKit\Support\Unsplash::class,
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
