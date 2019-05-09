<?php

namespace Jobcerto\CardView;

use Laravel\Nova\Card;

class CardView extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = 'full';

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'card-view';
    }

    public function view($view, $data = [])
    {
        return $this->withMeta(['view' => view($view, $data)->render()]);

    }

    public function hideResourceIndex()
    {
        return $this->withMeta(['hideResourceIndex' => true]);
    }

    public function hideResourceDetail()
    {
        return $this->withMeta(['hideResourceDetail' => true]);
    }

    public function divide($classes)
    {
        return $this->withMeta(['divide' => $classes]);
    }

    /**
     * Prepare the element for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return array_merge([
            'name'  => $this->component . '-' . str_random(32),
            'width' => $this->width,
        ], parent::jsonSerialize());
    }
}
