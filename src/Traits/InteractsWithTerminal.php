<?php

namespace Casimirorocha\LaravelPackageMaker\Traits;

use Symfony\Component\Process\Process;

trait InteractsWithTerminal
{
    /**
     * Run the given command as a process.
     *
     * @param string $command
     * @param string $path
     */
    protected function runConsoleCommand($command, $path)
    {
        $process = Process::fromShellCommandline($command, $path)->setTimeout(null);

        $result = $process->isTtySupported();

        $process->setTty($result);

        $process->run(function ($type, $line) {
            // $this->command->output->write($line);
            info($type);
            info($line);
            $this->info($line, $type);
        });
    }
}
