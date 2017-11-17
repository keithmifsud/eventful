<?php declare(strict_types=1);

/**
 * This file is part of Eventful
 *
 * @licence   Please view the Licence file supplied with this source code.
 *
 * @author    Keith Mifsud <http://www.keith-mifsud.me>
 *
 * @copyright Keith Mifsud 2017 <mifsud.k@gmail.com>
 *
 * @since     1.0
 * @version   1.0 Initial Release
 */


namespace Eventful\Architect\Command\Generate;


use function Sodium\increment;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


/**
 * Generates the common model files into a custom directory with
 * the project's common model namespace.
 *
 */
class CommonModel extends Command
{

    /**
     * Configures the command.
     */
    protected function configure()
    {
        $this->setName('generate:common-model');
        $this->setDescription('Generates the common model');
        $this->setHelp(
            'This command allows you to generate the common model files into your own domain model.'
        );

        $this->addArgument(
            'destination_directory',
            InputArgument::REQUIRED,
            'Where would you like these files to be copied to?'
        );

        $this->addArgument(
            'namespace',
            InputArgument::REQUIRED,
            'What is the name space of the common model?'
        );
    }


    /**
     * Executes the command.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     * @return null|int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Generating the common model files ...");
        $output->writeln("To this location: ");
        $output->writeln(
            $input->getArgument('destination_directory')
        );
        $output->writeln("With this namespace: ");
        $output->writeln(
            $input->getArgument('namespace')
        );

    }
}
