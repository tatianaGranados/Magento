<?php


namespace Tati\CrearComando\Console;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Saludo extends Command
{
    protected function configure()
    {
        $this->setName("com:decirHola");
        $this->setDescription("este es un comando para decir hola");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //parent::execute($input, $output);
        $output->writeln("hola tatiana");
    }
}
