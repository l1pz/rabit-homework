<?php
declare(strict_types=1);

namespace Framework;

class Viewer
{
    /**
     * Render a template to a string with the provided data
     * @param string $template Template file path inside view folder
     * @param array $data Data that the template receives
     * @return string Rendered template
     */
    public static function render(string $template, array $data = []): string
    {
        // import variable from the array to current scope, but don't overwrite it
        extract($data, EXTR_SKIP);

        // start output buffering
        ob_start();

        // render the template to output buffer
        require ROOT_PATH . "/views/$template";

        // return the rendered template
        return ob_get_clean();
    }
}