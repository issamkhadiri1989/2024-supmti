<?php

namespace App\Contact;

class ContactToCsvSaver implements ContactSaverInterface
{

    public function save(string $name, string $phone): string
    {
       return "$name;$phone";
    }
}