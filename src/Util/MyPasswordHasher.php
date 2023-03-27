<?php

namespace App\Util;

use Symfony\Component\PasswordHasher\PasswordHasherInterface;

class MyPasswordHasher implements PasswordHasherInterface
{
    public function hash(string $plainPassword): string
    {
        // Aquí defines la lógica para hashear la contraseña
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }

    public function verify(string $hashedPassword, string $plainPassword): bool
    {
        // Aquí defines la lógica para verificar si la contraseña hasheada coincide con la contraseña en texto plano
        return password_verify($plainPassword, $hashedPassword);
    }

    public function needsRehash(string $hashedPassword): bool
    {
        // Aquí defines la lógica para verificar si una contraseña hasheada necesita ser rehasheada
        return false; // Por ejemplo, en este caso, no se necesita rehashear la contraseña
    }
}
