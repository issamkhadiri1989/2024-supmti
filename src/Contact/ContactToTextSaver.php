<?php

namespace App\Contact;

use Symfony\Component\DependencyInjection\Attribute\AsAlias;

#[AsAlias()]
class ContactToTextSaver implements ContactSaverInterface
{
    public function save(string $name, string $phone): string
    {
        // do something
        return "[$name $phone";
    }
}