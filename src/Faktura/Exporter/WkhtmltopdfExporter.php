<?php

namespace Faktura\Exporter;

use Faktura\Transport\TransportInterface;

class WkhtmltopdfExporter implements ExporterInterface
{
    protected $tempDir;
    
    protected $timeout;
    
    protected $wkhtmltopdfCommand;
    
    protected $xvfbCommand;
    
    protected $timeoutCommand;
    
    public function __construct(
            $tempDir = '/tmp',
            $timeout = 10,
            $wkhtmltopdfCommand = 'wkhtmltopdf',
            $xvfbCommand = 'xvfb-run',
            $timeoutCommand = 'timeout')
    {
        $this->tempDir = (string) $tempDir;
        $this->timeout = (int) $timeout;
        $this->wkhtmltopdfCommand = (string) $wkhtmltopdfCommand;
        $this->xvfbCommand = (string) $xvfbCommand;
        $this->timeoutCommand = (string) $timeoutCommand;
    }
    
    public function export(TransportInterface $transport, $filename)
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
