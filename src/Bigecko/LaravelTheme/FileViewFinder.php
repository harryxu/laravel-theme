<?php namespace Bigecko\LaravelTheme;

class FileViewFinder extends \Illuminate\View\FileViewFinder
{

    public function prependNamespace($namespace, $hints)
    {
        $hints = (array) $hints;

        if (isset($this->hints[$namespace])) {
            $this->hints[$namespace] = array_merge($hints, $this->hints[$namespace]);
        }
        else {
            $this->addNamespace($namespace, $hints);
        }
    }

    public function prependLocation($location)
    {
        array_unshift($this->paths, $location);
    }

}
