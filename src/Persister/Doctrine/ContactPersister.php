<?php

namespace App\Persister\Doctrine;

use App\Contact\ContactSaverInterface;
use App\Contact\ContactToCsvSaver;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\DependencyInjection\Attribute\Target;

class ContactPersister
{
    private ContactSaverInterface $saver;
    private EntityManagerInterface $manager;
    private LoggerInterface $logger;

    public function __construct(
        #[Autowire(service: ContactToCsvSaver::class)] ContactSaverInterface $saver,
        EntityManagerInterface $manager,
//        #[Autowire('@monolog.logger.cache')] LoggerInterface $logger,
        #[Target('$securityLogger')] LoggerInterface $logger,
    ) {
        $this->saver = $saver;
        $this->manager = $manager;
        $this->logger = $logger;
    }

    public function persist(): void
    {
        dump(get_class($this->saver), get_debug_type($this->logger));

        $this->saver->save('Issam', '0672049753');
    }
}
