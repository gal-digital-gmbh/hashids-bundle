<?php

namespace GalDigitalGmbh\HashidsBundle\Command;

use GalDigitalGmbh\HashidsBundle\Service\HashService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\Service\Attribute\Required;

#[AsCommand(
    name: 'app:hashids:encode',
    description: 'Outputs the hashids hash for a given ID',
)]
class HashidsEncodeCommand extends Command
{
    #[Required]
    public HashService $hashService;

    /**
     * @return void
     */
    protected function configure()
    {
        $this->addArgument('id');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        if (!is_numeric($id)) {
            throw new InvalidArgumentException('Argument id has to be numeric');
        }

        $output->writeln($this->hashService->encode((int) $id));

        return self::SUCCESS;
    }
}
