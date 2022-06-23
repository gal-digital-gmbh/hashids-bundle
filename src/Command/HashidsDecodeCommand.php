<?php

namespace GalDigitalGmbh\HashidsBundle\Command;

use Symfony\Component\Console\Command\Command;
use GalDigitalGmbh\HashidsBundle\Service\HashService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\Service\Attribute\Required;

#[AsCommand(
    name: 'app:hashids:decode',
    description: 'Outputs the ID for a given hashids hash',
)]
class HashidsDecodeCommand extends Command
{
    #[Required]
    public HashService $hashService;

    /**
     * @return void
     */
    protected function configure()
    {
        $this->addArgument('hash');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $hash = $input->getArgument('hash');

        if (!is_string($hash)) {
            throw new InvalidArgumentException('Argument hash has to be a string');
        }

        $id = $this->hashService->decode($hash);

        if ($id === null) {
            throw new InvalidArgumentException('Argument hash is not a hashid');
        }

        $output->writeln((string) $id);

        return self::SUCCESS;
    }
}
