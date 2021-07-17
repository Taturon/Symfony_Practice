<?php
// src/Command/CreateUserCommand.php
namespace App\Command;

use App\Service\UserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'app:create-user';

    private $userManager;

    public function __construct(UserManager $userManager, bool $requirePassword = false)
    {
        $this->userManager = $userManager;
        $this->requirePassword = $requirePassword;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
        ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);

        $output->writeln('Username: '.$input->getArgument('username'));

        return Command::SUCCESS;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Creates a new user.')
            ->setHelp('This command allows you to create a user...')
            ->addArgument('password', $this->requirePassword ? InputArgument::REQUIRED : InputArgument::OPTIONAL, 'User password')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);
        $output->writeln($this->someMethod());
        $output->writeln('Whoa!');
        $output->write('You are about to ');
        $output->write('create a user.');

        return Command::SUCCESS;
    }
}
