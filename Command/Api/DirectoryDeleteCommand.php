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

use Crowdin\Api\DeleteDirectory;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command to delete a directory from the Crowdin project. All nested files and directories will be deleted too.
 *
 * @author Julien Janvier <j.janvier@gmail.com>
 */
class DirectoryDeleteCommand extends AbstractApiCommand
{
    protected function configure()
    {
        $this
            ->setName('crowdin:api:delete-directory')
            ->setDescription('Delete a Crowdin project directory. All nested files and directories will be deleted too.')
            ->addArgument('directory', InputArgument::REQUIRED, 'Directory path you want to delete.');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var DeleteDirectory $deleteDirectory */
        $deleteDirectory = $this->getClient()->api('delete-directory');
        $deleteDirectory->setDirectory($input->getArgument('directory'));
        $result = $deleteDirectory->execute();

        $output->writeln($result);
    }
}
