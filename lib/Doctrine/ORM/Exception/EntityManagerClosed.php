<?php

declare(strict_types=1);

namespace Doctrine\ORM\Exception;

use Throwable;

final class EntityManagerClosed extends ORMException implements ManagerException
{
    public static function create(): self
    {
        return new self('The EntityManager is closed.');
    }

    public static function createWhere(?Throwable $e = null): self
    {
        if ($e === null) {
            return self::create();
        }

        return new self(
            'The EntityManager is closed (previous allows to trace back to where it was closed).',
            0,
            $e
        );
    }

    public static function createClosedHere(?Throwable $cause = null): self
    {
        if ($cause === null) {
            return new self('This exception allows to trace back to where close() was called.');
        }

        return new self(
            'This exception allows to trace back to where close() was called (see previous exception for the cause).',
            0,
            $cause
        );
    }
}
