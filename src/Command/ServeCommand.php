<?php

namespace App\Command;

use \Exception;
use Symfony\Bundle\WebServerBundle\WebServer;
use Symfony\Bundle\WebServerBundle\WebServerConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\Process;

/**
 * Class ServeCommand
 * @package App\Command
 */
class ServeCommand extends Command
{
    private $name = 'app:serve';
    private $docRoot;
    private $environment;
    private $pidFileDir;
    private $port;

    public function __construct($docRoot, $environment, $pidFileDir)
    {
        parent::__construct($this->name);

        $this->docRoot = $docRoot;
        $this->environment = $environment;
        $this->pidFileDir = $pidFileDir;
        $this->port = $_ENV['PORT'] ?? 8000;
    }

    protected function configure()
    {
        $this->setDescription('Serve application');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output instanceof ConsoleOutputInterface ? $output->getErrorOutput() : $output);
        $callback = null;
        $disableOutput = false;
        if ($output->isQuiet()) {
            $disableOutput = true;
        } else {
            $callback = function ($type, $buffer) use ($output) {
                if (Process::ERR === $type && $output instanceof ConsoleOutputInterface) {
                    $output = $output->getErrorOutput();
                }
                $output->write($buffer, false, OutputInterface::OUTPUT_RAW);
            };
        }

        try {
            $server = new WebServer($this->pidFileDir);
            $config = new WebServerConfig($this->docRoot, $this->environment, '0.0.0.0:' . $this->port);

            $message = sprintf('Server listening on http://%s', $config->getAddress());
            if ('' !== $displayAddress = $config->getDisplayAddress()) {
                $message = sprintf('Server listening on all interfaces, port %s -- see http://%s', $config->getPort(), $displayAddress);
            }
            $io->success($message);
            if (ini_get('xdebug.profiler_enable_trigger')) {
                $io->comment('Xdebug profiler trigger enabled.');
            }
            $io->comment('Quit the server with CONTROL-C.');

            $server->run($config, $disableOutput, $callback);
        } catch (Exception $e) {
            $io->error($e->getMessage());

            return 1;
        }
    }
}
