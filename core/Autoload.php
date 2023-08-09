<?php

namespace Core;

class AutoLoad
{
    private $extension = ".php";
    public $directories = [];

    function __construct($initial_directory = false)
    {
        if ($initial_directory) {
            $this->add($initial_directory);
        }
    }

    public function add($directory)
    {
        $this->directories[] = $directory;
    }

    public function load()
    {
        foreach ($this->directories as $dir) {
            $this->load_directory($dir);
        }
    }

    private function load_directory($directory)
    {
        if (is_dir($directory)) {
            $scan = scandir($directory);
            unset($scan[0], $scan[1]); //unset . and ..
            foreach ($scan as $file) {
                if (is_dir($directory . "/" . $file)) {
                    $this->load_directory($directory . "/" . $file);
                } else {
                    if (strpos($file, $this->extension) !== false) {
                        include_once($directory . "/" . $file);
                    }
                }
            }
        } else if (file_exists($directory)) {
            if (strpos($directory, $this->extension) !== false) {
                include_once($directory);
            }
        }
    }
}
