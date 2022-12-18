<?php

namespace Koderos\Faktura\Exporter;

use Koderos\Faktura\Transport\TransportInterface;

interface ExporterInterface
{
    /**
     * Export transport object to an output file.
     * @param TransportInterface $transport
     * @param string $filename
     */
    public function export(TransportInterface $transport, string $filename);
}
