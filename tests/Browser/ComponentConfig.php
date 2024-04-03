<?php

namespace Tests\Browser;

use Illuminate\Support\Facades\Blade;

class ComponentConfig
{
    public string $name;
    public array $attributes;

    public function __construct(string $name, array $attributes)
    {
        $this->name = $name;
        $this->attributes = $attributes;
    }

    /**
     * Renders the component to HTML.
     */
    public function render(): string
    {
        $attributes = collect($this->attributes)
            ->map(function ($value, $key) {
                return is_bool($value) ? $key : "$key=\"$value\"";
            })
            ->implode(' ');

        return Blade::render(
            "<x-dynamic-component component=\"$this->name\" $attributes />"
        );
    }

    /**
     * Deserialize and render the component configs from JSON to HTML.
     */
    public static function deserializeComponentConfigsToHtml(string $componentConfigs): string
    {
        $componentConfigs = collect(json_decode($componentConfigs))->map(function ($componentConfig) {
            return new ComponentConfig($componentConfig->name, (array)$componentConfig->attributes);
        });

        return collect($componentConfigs)->map(function ($componentConfig) {
            return $componentConfig->render();
        })->implode("\n");
    }

    /**
     * Serialize the component configs to JSON.
     */
    public static function serializeComponentsConfigs(array $componentConfigs): string
    {
        return json_encode($componentConfigs);
    }

    /**
     * Wrap the component(s) HTML in a full HTML document.
     * 
     * @param string $componentHtml 
     * @return string 
     */
    public static function wrapComponentHtml(string $componentHtml)
    {
        return Blade::render(
            "<html><head><meta name=\"csrf-token\" content=\"{{ csrf_token() }}\" />\n@bukStyles</head><body>\n" .
                "$componentHtml\n" .
                "\n@bukScripts</body></html>"
        );
    }
}
