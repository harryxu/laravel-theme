<?php namespace Bigecko\LaravelTheme;

class Theme
{
    private $theme;

    protected $finder;

    protected $urlGenerator;

    public function __construct($finder, $urlGenerator)
    {
        $this->finder = $finder;

        $this->UrlGenerator = $urlGenerator;
    }

    /**
     * init theme
     */
    public function init($name)
    {
        $this->theme = $name;
        $this->updateFinder();
    }

    /**
     * Get current theme name.
     */
    public function name()
    {
        return $this->theme;
    }

    protected function updateFinder()
    {
        // add theme hints to existing namespaces
        foreach ($this->finder->getHints() as $namespace => $hints) {
            $this->finder->prependNamespace($namespace, $this->viewPath() . '/' . $namespace);
        }

        // add theme views path
        $this->finder->prependLocation($this->viewPath());
    }

    /**
     * Helper method to generate asset url based on current theme path.
     *
     * @param  string  $path  The asset path relative to theme path.
     * @return string  The full url for the asset.
     */
    public function asset($path)
    {
        $this->urlGenerator->asset($this->theme . '/' . trim($path, '/'));
    }

    /**
     * Get current theme view path.
     */
    public function viewPath()
    {
        return public_path($this->theme . '/views');
    }
}
