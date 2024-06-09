<?php

declare(strict_types=1);

namespace App\Service\Mailer;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class DefaultMailer
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function buildMessage(
        string $from,
        string $to,
        string $subject,
        string $templatePath,
        array  $context = []
    ): Email
    {
        $message = new TemplatedEmail();

        $message->from($from)
            ->to($to)
            ->subject($subject)
            ->htmlTemplate($templatePath)
            ->context($context);

        return $message;
    }

    public function sendMail(
        string $from,
        string $to,
        string $subject,
        string $templatePath,
        array  $context = []): void
    {
        $message = $this->buildMessage($from, $to, $subject, $templatePath, $context);

        // send mail
        $this->mailer->send($message);
    }
}
