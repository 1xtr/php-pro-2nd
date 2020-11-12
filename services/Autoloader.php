<?php


namespace services;

require __DIR__ . '/../config/config.php';

class Autoloader
{
    private string $fileExtension = ".php";

    public function loadClass(string $classname)
    {
        $classname = ROOT_DIR . $classname . $this->fileExtension;
        $filename = realpath(preg_replace('/\\\\/', '/', $classname));
        //var_dump($filename);

        if (file_exists($filename)) {
            require $filename;
            return true;
        }
        return false;
    }
}