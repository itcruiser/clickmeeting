<?php

namespace App\Command;

use App\Exception\FileNotExistException;
use App\Filter\CompositeFilter;
use App\Filter\SimpleFilter;
use App\Service\ThumbnailGenerator;
use Liip\ImagineBundle\Exception\Binary\Loader\NotLoadableException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateThumbnailCommand extends Command
{
    private const ARGUMENT_PATH = 'path';

    protected static $defaultName = 'app:thumbnail';

    private $generator;

    public function __construct(ThumbnailGenerator $generator)
    {
        $this->generator = $generator;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument(self::ARGUMENT_PATH, InputArgument::REQUIRED, 'Source file path');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $path = $input->getArgument(self::ARGUMENT_PATH);
        try {

            $compositeFilter = new CompositeFilter();
            $compositeFilter->addFilter(new SimpleFilter());

            $thumbnailUrl = $this->generator->generate($path, $compositeFilter);

            $output->writeln(sprintf('Thumbnaild URL: %s', $thumbnailUrl));

            return Command::SUCCESS;
        } catch (NotLoadableException $exception) {
            $output->writeln($exception->getMessage());
            return Command::INVALID;
        }
    }
}