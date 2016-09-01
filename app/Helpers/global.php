<?php

if (! function_exists('get_classes')) {
    /**
     * Get classes in a particular directory
     *
     * @param  string  $directory
     * @param  Closure $closure
     * @return array
     */
    function get_classes($directory, Closure $closure = null)
    {
        $classes = array_filter(scandir($directory), function ($file) use ($closure) {
            if (!ends_with($file, '.php') || studly_case($file) !== $file) {
                return false;
            }

            if (is_null($closure)) {
                return true;
            }

            return $closure($file);
        });

        return array_map(function ($file) {
            return str_replace('.php', '', $file);
        }, $classes);
    }
}
