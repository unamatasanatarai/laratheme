<?php

class LaraTheme {
    static protected $theme = '';
    static protected $layout = 'default';

    /**
     * Set the name of the THEME views/themes/NAME
     * @param [type] $name [description]
     */
    static public function setTheme($name){
        self::$theme = trim($name);
    }

    /**
     * Set the name of the Layout views/theme/SETTHEME/layouts/LAYOUT.blade.php
     * @param [type] $name [description]
     */
    static public function setLayout($name){
        self::$layout = trim($name);
    }

    /**
     * Validate Theme access path (dot-path)
     * @return [type] [description]
     */
    static public function getThemePath(){
        if (empty(self::$theme)){
            return '';
        }

        return 'themes.' . self::$theme;
    }

    /**
     * Get the path to the layout
     * @return [type] [description]
     */
    static public function layout(){
        $path = self::getThemePath();
        if (empty($path)){
            return self::$layout;
        }
        return $path . '.layouts.' . self::$layout;
    }

    /**
     * Get the path to the element
     * @param  [type] $view [description]
     * @return [type]       [description]
     */
    static public function element($view){
        return self::path('elements.' . $view);
    }

    /**
     * Get the path to the view
     * @param  [type] $view [description]
     * @return [type]       [description]
     */
    static public function path($view){
        $path = array_filter([
            self::getThemePath(),
            $view
        ]);
        return implode('.', $path);
    }

    /**
     * Render the view accordingly to the Theme/Layout setup
     * @param  [type] $view [description]
     * @param  array  $vars [description]
     * @return [type]       [description]
     */
    static public function render($view, $vars = [])
    {
        return view(self::path($view), $vars);
    }
}
