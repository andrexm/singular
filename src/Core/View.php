<?php

namespace Src\Core;

use Jenssegers\Blade\Blade;

class View
{
    private Blade $blade;

    /**
     * Constructor
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->blade = new Blade($path, VIEWS_CACHE);
    }

    /**
     * Renders a view
     *
     * @param string $view
     * @param array $data
     */
    public function render(string $view, $data = [])
    {
        return $this->blade->make($view, $data);
    }
}
