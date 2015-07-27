<?php namespace Unamatasanatarai\LaraTheme;

class LaraTheme {
    protected $theme = '';
    protected $layout = 'default';

    public function render($view, $vars = [])
    {
        $path = [];
        if (!empty(self::$theme)){
            $path[] = self::$theme;
        }
        $path[] = $view;

        return view($path, $vars);
    }

    public function element($element, $vars = []){
        return self::render('elements' . $element, $vars);
    }
}
