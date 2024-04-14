<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Editors;

use Illuminate\Support\Str;
use BladeUIKit\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class Quill extends BladeComponent
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $options;

    protected static $assets = ['quill'];

    public function __construct($name = null, $id = null, $options = ['theme' => 'snow'])
    {
        $this->uniqueString = Str::random(6);
        $this->name = $name;
        $this->id = $id;
        $this->options = $options;
    }

    public function render(): View
    {
        return view('blade-ui-kit::components.editors.quill');
    }

    public function getUniqueString($prefix = '')
    {
        return $prefix . $this->uniqueString;
    }

    public function jsonOptions(): string
    {
        return json_encode((object) $this->options);
    }
}
