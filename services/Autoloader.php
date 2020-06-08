<?php
namespace services;

class AutoLoader
{
  const DEV_NAMESPACE = "php-hw\\";
  const FILE_PATH = "/../#PATH#";
  const FILE_EXT = ".php";

  protected $filePath;
  protected $fileName;

  public function loadClass($className)
  {
    if (stristr($className, self::DEV_NAMESPACE))
    {
      $this->filePath = str_replace(array(self::DEV_NAMESPACE, "\\"), array("", DIRECTORY_SEPARATOR), $className);
      $this->fileName = str_replace("#PATH#", $this->filePath, $_SERVER["DOCUMENT_ROOT"].self::FILE_PATH);
      $this->fileName .= self::FILE_EXT;
    }
    if (file_exists($this->fileName))
    {
      include_once($this->fileName);
    }
  }
}
?>
