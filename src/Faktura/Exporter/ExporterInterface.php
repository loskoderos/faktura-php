<?php

namespace Faktura\Exporter;

use Faktura\Transport\TransportInterface;

interface ExporterInterface
{
    /**
     * Export transport object to an output file.
     * @param TransportInterface $transport
     * @param type $filename
     */
    public function export(TransportInterface $transport, $filename);
}
