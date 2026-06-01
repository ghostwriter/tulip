<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Exception;

use Ghostwriter\Tulip\Interface\TulipExceptionInterface;
use LogicException;

final class ShouldNotHappenException extends LogicException implements TulipExceptionInterface {}
