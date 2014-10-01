<?php

/*
 * This file is part of the Crowdin library.
 *
 * (c) Julien Janvier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jjanvier\Library\Crowdin\Command\Api;

use Crowdin\Api\AddFile;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command to add a new file to the Crowdin project.
 *
 * @author Julien Janvier <j.janvier@gmail.com>
 */
class FileAddCommand extends AbstractApiCommand
{
    protected function configure()
    {
        $this
            ->setName('crowdin:api:add-file')
            ->setDescription('Add a new file to the Crowdin project.')
            ->addArgument('file', InputArgument::REQUIRED, 'File you want to add.')
            ->addArgument('crowdinPath', InputArgument::REQUIRED, 'Crowdin path where you want to add the file.')
            ->addOption('exportPattern', 'p', InputOption::VALUE_REQUIRED, 'Export pattern of your file.')
            ->addOption('title', 't', InputOption::VALUE_REQUIRED, 'Title of your file.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var AddFile $addFile */
        $addFile = $this->getClient()->api('add-file');
        $addFile->addTranslation(
            $input->getArgument('file'),
            $input->getArgument('crowdinPath'),
            $input->getOption('exportPattern'),
            $input->getOption('title')
        );

        $result = $addFile->execute();

        $output->writeln($result);
    }
}
