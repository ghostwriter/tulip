<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Console\Command;

use Symfony\Component\Console\Attribute\AsCommand;

/**
 * @see InitCommandTest
 */
#[AsCommand(name: 'init', description: 'Initialize version-based branching model Git workflow.')]
final class InitCommand extends AbstractCommand {}
