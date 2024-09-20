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

        $tty = $result ? "Enabled" : "Disabled";

        $this->info("\n\nTTY mode: $tty \n\n");

        $process->run(function ($type, $line) {
            $this->info($line, $type);
        });
    }
}
