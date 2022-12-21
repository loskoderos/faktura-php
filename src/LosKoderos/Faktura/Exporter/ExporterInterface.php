<?php

namespace LosKoderos\Faktura\Exporter;

use LosKoderos\Faktura\Transport\TransportInterface;

interface ExporterInterface
{
    /**
     * Export transport object to an output file.
     * @param TransportInterface $transport
     * @param string $filename
     */
    public function export(TransportInterface $transport, string $filename);
}
