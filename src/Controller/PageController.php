<?php

namespace App\Controller;

use App\Contact\ContactSaverInterface;
use App\Contact\ContactToTextSaver;
use App\Persister\Doctrine\ContactPersister;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    private string $secret;

    public function __construct(
        private readonly ContactSaverInterface $textSaver, // ContactToTextSaver
        private readonly ContactSaverInterface $csvSaver, // ContactToCsvSaver
        #[Autowire(env: 'APP_SECRET')] string $secret,
    ) {
        $this->secret = $secret;
    }

    #[Route('/', name: 'app_homepage')]
    public function index(ContactPersister $persister): Response
    {
        $persister->persist();
//        dd(get_class($this->csvSaver), get_class($this->textSaver));
        $this->textSaver->save('issam khadiri', '0123456789');

        return $this->render('page/homepage.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }
}
