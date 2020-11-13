<?php


namespace app\services;

//require __DIR__ . '/../config/config.php';

class Autoloader
{
    private string $fileExtension = ".php";

    public function loadClass(string $className)
    {
        $search = ['app\\', '\\'];
        $className = ROOT_DIR . str_replace($search, DIRECTORY_SEPARATOR, $className);
        $fileName = realpath("{$className}{$this->fileExtension}");
        //var_dump($fileName);

        if (file_exists($fileName)) {
            require $fileName;
            return true;
        }
        return false;
    }
}