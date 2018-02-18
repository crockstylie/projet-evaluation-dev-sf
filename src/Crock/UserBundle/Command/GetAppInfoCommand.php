<?php

namespace Crock\UserBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GetAppInfoCommand extends ContainerAwareCommand
{
  protected function configure()
  {
    $this
      ->setName('application:informations')
      ->setDescription('informations sur l\'application')
      ->setHelp('Affiche des informations à propos de l\'application')
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {

    $appName = $this
      ->getContainer()
      ->getParameter('app_name');

    $appVersion = $this
      ->getContainer()
      ->getParameter('version');

    $symfonyVersion = $this
      ->getApplication()
      ->getVersion();

    $appEnvironment = $this
      ->getContainer()
      ->getParameter('kernel.environment');

    $style = new SymfonyStyle($input, $output);

    $style->text([
      '',
      '            8888888888  888    88888',
      '           88     88   88 88   88  88',
      '            8888  88  88   88  88888',
      '               88 88 888888888 88   88',
      '        88888888  88 88     88 88    888888',
      '',
      '        88  88  88   888    88888    888888',
      '        88  88  88  88 88   88  88  88',
      '        88 8888 88 88   88  88888    8888',
      '         888  888 888888888 88   88     88',
      '          88  88  88     88 88    8888888',
      '',
      '====================================================',
      '|             Application Informations             |',
      '====================================================',
      '',
    ]);

    $style->table(
      [],
      [
        [ 'Nom de l\'application      :', $appName ],
        [ 'Version de l\'application  :', $appVersion ],
        [ 'Version de Symfony        :', $symfonyVersion ],
        [ 'Environnement d\'éxécution :', $appEnvironment ]
      ]
    );
  }
}