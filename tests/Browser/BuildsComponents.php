<?php

namespace Tests\Browser;

use Illuminate\Support\Facades\Blade;

trait BuildsComponents
{
    private function buildComponentHtml($component)
    {
        return Blade::render(
            "<html><head><meta name=\"csrf-token\" content=\"{{ csrf_token() }}\" />\n@bukStyles</head><body>\n" .
                "$component\n" .
                "\n@bukScripts</body></html>"
        );
    }

    private function deserializeAttributes($attributes)
    {
        $attributes = json_decode(urldecode($attributes), true);

        return collect($attributes)->map(function ($value, $key) {
            return is_numeric($key) ? $value : "$key=\"$value\"";
        })->implode(' ');
    }

    private function serializeAttributes($attributes)
    {
        return json_encode($attributes);
    }
}
