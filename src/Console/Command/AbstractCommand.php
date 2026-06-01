<?php

declare(strict_types=1);

namespace Ghostwriter\Tulip\Console\Command;

use Ghostwriter\EventDispatcher\Interface\EventDispatcherInterface;
use Override;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\StyleInterface;
use Throwable;

use function str_repeat;

abstract class AbstractCommand extends Command
{
    public const string BRANCH_PREFIX_BUGFIX = 'bugfix/';

    public const string BRANCH_PREFIX_FEATURE = 'feature/';

    public const string BRANCH_PREFIX_HOTFIX = 'hotfix/';

    public const string BRANCH_PREFIX_RELEASE = 'release/';

    public const string BRANCH_PREFIX_SUPPORT = 'support/';

    public function __construct(
        public readonly EventDispatcherInterface $eventDispatcher,
        public readonly StyleInterface $style,
    ) {
        parent::__construct();
    }

    /** @throws Throwable */
    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([$this->getName(), str_repeat('=', 12), $this->getDescription()]);

        return self::SUCCESS;
    }

    #[Override]
    protected function configure(): void
    {
        $this->addArgument(name: 'branch', mode: InputArgument::REQUIRED, description: 'The name of the branch');

        $this->addOption(
            name: 'base',
            shortcut: 'b',
            mode: InputOption::VALUE_OPTIONAL,
            description: 'The base branch name',
            default: '0.1.x'
        );

        $this->addOption(
            name: 'remote',
            shortcut: 'r',
            mode: InputOption::VALUE_OPTIONAL,
            description: 'The remote repository',
            default: 'origin'
        );

        $this->addOption(
            name: 'push',
            shortcut: 'p',
            mode: InputOption::VALUE_NONE,
            description: 'Whether to push the new branch to the remote repository'
        );

        parent::configure();
    }
}
