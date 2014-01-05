<?php namespace Bigecko\LaravelTheme;

class Theme
{
    /**
     * Base path for contain themes.
     */
    public $basePath;

    private $initialized = false;

    private $theme;

    protected $finder;

    protected $urlGenerator;

    public function __construct($finder, $urlGenerator)
    {
        $this->finder = $finder;

        $this->UrlGenerator = $urlGenerator;
    }

    public function setTheme($value)
    {
        $this->theme = $value;
    }

    /**
     * Get current theme.
     */
    public function getTheme()
    {
        return $this->theme;
    }

    public function init()
    {
        if ($this->initialized) {
            return;
        }

        // add theme hints to existing namespaces
        foreach ($this->finder->getHints() as $namespace => $hints) {
            $this->finder->prependNamespace($namespace, $this->viewPath() . '/' . $namespace);
        }

        // add theme views path
        $this->finder->prependLocation($this->viewPath());

        // Default path for put themes is 'public/themes'.
        if (!isset($this->basePath)) {
            $this->basePath = $this->urlGenerator->asset('/') . '/themes';
        }

        $this->initialized = true;
    }

    /**
     * Helper method for generate asset url based on current theme path.
     *
     * @param  string  $path  The asset path relative to theme path.
     * @return string  The full url for the asset.
     */
    public function asset($path)
    {
        $this->urlGenerator->asset($this->viewPath() . '/' . trim($path, '/'));
    }

    /**
     * Get current theme view path.
     */
    public function viewPath()
    {
        return $this->themePath() . '/views';
    }

    /**
     * Get current theme path.
     */
    public function themePath()
    {
        return $this->basePath . '/' . $this->theme;
    }

}
