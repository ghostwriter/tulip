<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Exception;

use Ghostwriter\Tulip\Interface\ExceptionInterface;
use LogicException;

final class ShouldNotHappenException extends LogicException implements ExceptionInterface {}
