<?php

namespace Helldar\Sitemap\Validators;

use Helldar\Core\Xml\Abstracts\Validation;
use Helldar\Sitemap\Helpers\Frequencies;
use Illuminate\Validation\Rule;

class ManualValidator extends Validation
{
    protected function rules(): array
    {
        $frequencies = Frequencies::all();

        return [
            'items'              => ['required', 'array', 'min:1', 'max:50000'],
            'items.*.loc'        => ['required', 'url', 'max:255'],
            'items.*.changefreq' => ['string', 'max:20', Rule::in($frequencies)],
            'items.*.lastmod'    => ['date'],
            'items.*.priority'   => ['numeric'],
        ];
    }
}
