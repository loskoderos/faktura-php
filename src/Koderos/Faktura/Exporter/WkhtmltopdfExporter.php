<?php

namespace Koderos\Faktura\Exporter;

use Koderos\Faktura\Transport\TransportInterface;

class WkhtmltopdfExporter implements ExporterInterface
{
    protected string $tempDir;
    protected int $timeout;
    protected string $wkhtmltopdfCommand;
    protected string $xvfbCommand;
    protected string $timeoutCommand;
    
    public function __construct(
            string $tempDir = '/tmp',
            int $timeout = 10,
            string $wkhtmltopdfCommand = 'wkhtmltopdf',
            string $xvfbCommand = 'xvfb-run',
            string $timeoutCommand = 'timeout')
    {
        $this->tempDir = $tempDir;
        $this->timeout = $timeout;
        $this->wkhtmltopdfCommand = $wkhtmltopdfCommand;
        $this->xvfbCommand = $xvfbCommand;
        $this->timeoutCommand = $timeoutCommand;
    }
    
    public function export(TransportInterface $transport, string $filename)
    {
        $tmpFilename = tempnam($this->tempDir, 'faktura-');
        rename($tmpFilename, $tmpFilename . '.html');
        $tmpFilename .= '.html';
        if (file_put_contents($tmpFilename, $transport->getContent()) === false) {
            throw new ExporterException("Can't save content to {$tmpFilename}");
        }
        $command = sprintf('%s %d %s -a -l %s -q -O Portrait -s A4 %s %s',
                $this->timeoutCommand,
                $this->timeout,
                $this->xvfbCommand,
                $this->wkhtmltopdfCommand,
                $tmpFilename,
                $filename);
        @system($command);
        @unlink($tmpFilename);
        if (!file_exists($filename)) {
            throw new ExporterException("Exporting to PDF has failed");
        }
    }
}
