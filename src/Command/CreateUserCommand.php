<?php
namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'api:create-user';

    private $passwordEncoder;
    private $em;

    public function __construct(UserPasswordEncoderInterface $encoder, EntityManagerInterface $em) {

        parent::__construct();
        $this->passwordEncoder = $encoder;
        $this->em = $em;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Add new user.')
            ->addArgument('email', InputArgument::REQUIRED, 'email')
            ->addArgument('password',InputArgument::REQUIRED,'passowrd');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $user = new User();
        $email = $input->getArgument('email');
        $password = $this->passwordEncoder->encodePassword($user,$input->getArgument('password'));
        $user
            ->setEmail($email)
            ->setPassword($password);

        $this->em->persist($user);
        $this->em->flush();
        $io->success('User '.$email.' is created');

        return 0;
    }
}
