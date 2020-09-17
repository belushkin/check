<?php declare(strict_types=1);

namespace App\Services\Http;

interface IRequest
{
    public function getBody(): ?array;
}
