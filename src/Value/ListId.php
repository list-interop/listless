<?php

declare(strict_types=1);

namespace GSteel\Listless\Value;

use GSteel\Listless\Assert;
use GSteel\Listless\ListId as ListIdContract;

/**
 * @psalm-immutable
 */
final class ListId implements ListIdContract
{
    /** @var string */
    private $id;

    private function __construct(string $id)
    {
        $this->id = $id;
    }

    public static function fromString(string $id): self
    {
        Assert::notEmpty($id, 'The mailing list identifier cannot be empty');

        return new self($id);
    }

    /**
     * @psalm-mutation-free
     */
    public function toString(): string
    {
        return $this->id;
    }

    public function isEqualTo(ListIdContract $other): bool
    {
        return $this->toString() === $other->toString();
    }
}
