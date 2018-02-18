<?php

namespace Crock\CharacterListBundle\Twig;

class FilmsFilterExtension extends \Twig_Extension
{
  public function getFunctions()
  {
    return [
      new \Twig_SimpleFunction('convertFilmLinksToFilmIds', [
        $this, 'filmFilter'
      ])
    ];
  }

  public function filmFilter($filmlink)
  {
    $filmsId = [];

    foreach ($filmlink as $film) {
      $filmPiece = explode("/", $film);
      array_push($filmsId, $filmPiece[5]);
    }

    return $filmsId;
  }

  public function getName()
  {
    return 'convertFilmLinksToFilmIds';
  }
}