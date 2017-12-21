<?php

namespace AppBundle\Command;

use Inkasso\CoreBundle\Entity\User;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CreateUserCommand
 *
 * @package Inkasso\CoreBundle\Command
 */
class InitializeDatabaseCommand extends ContainerAwareCommand
{
    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this->setName('app:initialize-database')
            ->setDescription('Insert required data into database.');
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        // Insert OAUTH2 client
//        $em
//            ->getConnection()
//            ->query("INSERT INTO oauth2_clients VALUES (1, '3bcbxd9e24g0gk4swg0kwgcwg4o8k8g4g888kwc44gcc0gwwk4', 'a:0:{}', '4ok2x70rlfokc8g0wws8c8kwcokw80k44sg48goc0ok4w0so0k', 'a:1:{i:0;s:8:\"password\";}')");
//
        // Create admin user
        $admin = $this->getContainer()->get('fos_user.user_manager')->createUser();
        /**
         * @var $admin User
         */
        $admin->setUsername('admin')
            ->setEmail('admin@example.com')
            ->setPlainPassword('admin')
            ->addRole('ROLE_ADMIN')
            ->setName('Admin')
            ->setSurname('Admin')
            ->setEnabled(true);

        $this->getContainer()->get('fos_user.user_manager')->updateUser($admin);
    }
}
