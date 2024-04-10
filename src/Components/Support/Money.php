<?php

declare(strict_types=1);

namespace BladeUIKit\Components\Support;

use BladeUIKit\Components\BladeComponent;
use Closure;
use Illuminate\Support\Number;
use Illuminate\View\ComponentSlot;

class Money extends BladeComponent
{
    /** @var string */
    public $currency;

    /** @var string */
    public $locale;

    public function __construct(?string $currency = 'USD', ?string $locale = null)
    {
        $this->currency = $currency;
        $this->locale = $locale ?? config('app.locale');
    }

    public function render(): Closure
    {
        return function (array $data) {
            return view('blade-ui-kit::components.support.money', [
                'amount' => $this->format($data['slot']),
            ]);
        };
    }

    protected function format(ComponentSlot $amount): string
    {
        return Number::currency(
            floatval((string) $amount),
            in: $this->currency,
            locale: $this->locale,
        );
    }
}
