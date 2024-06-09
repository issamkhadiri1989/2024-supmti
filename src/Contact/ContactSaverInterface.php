<?php

namespace App\Contact;

interface ContactSaverInterface
{
    public function save(string $name, string $phone): string;
}
