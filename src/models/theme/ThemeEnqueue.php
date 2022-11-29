<?php
class ThemeEnqueue
{
    private $enqueueStyles = [];
    private $enqueueScripts = [];

    public function setStyles($enqueueStyles)
    {
        $this->enqueueStyles = $enqueueStyles;
    }

    public function setScripts($enqueueScripts)
    {
        $this->enqueueScripts = $enqueueScripts;
    }

    public function enqueue()
    {
        foreach ($this->enqueueScripts as $script => $path) {
            wp_enqueue_script('blank-theme-' . $script, $path, array(), _S_VERSION, true);
        }
        foreach ($this->enqueueStyles as $script => $path) {
            wp_enqueue_style('blank-theme-' . $script, $path, array(), _S_VERSION);
        }
    }
}
