<?php

namespace Lhilton\TextAutoComplete;

use Laravel\Nova\Fields\Field;

class TextAutoComplete extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'text-auto-complete';

    /**
     * Set options to use with the vue selection box
     *
     * @param  array  $items
     * @return TextAutoComplete
     */
    public function items(array $items): TextAutoComplete
    {
        $this->withMeta([
            'items' => $items
        ]);
        return $this;
    }
}
