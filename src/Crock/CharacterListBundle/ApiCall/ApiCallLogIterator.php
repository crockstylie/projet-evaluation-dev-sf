<?php

namespace Crock\CharacterListBundle\ApiCall;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Finder\Finder;

class ApiCallLogIterator
{
  private $container;

  public function __construct(ContainerInterface $container)
  {
    $this->container = $container;
  }

  public function iterateApiCallsInFile()
  {
    $rootDir = $this->container->get('kernel')->getRootDir() . '/../';

    $finder = new Finder();
    $finder
      ->files()
      ->in($rootDir)
      ->name('number_of_api_calls')
    ;

    foreach ($finder as $file) {
      $content = $file->getContents();
      $content ++;
      file_put_contents($file, $content);
    }
  }
}