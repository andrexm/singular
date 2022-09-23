<?php

namespace Src\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    private FilesystemLoader $loader;
    private Environment $twig;

    /**
     * Constructor
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->loader = new FilesystemLoader($path);
    }

    /**
     * Renders a view
     *
     * @param string $view
     * @param array $data
     * @return string
     */
    public function render(string $view, $data = []): string
    {
        $this->twig = new Environment($this->loader);
        return $this->twig->render($view, $data);
    }
}
