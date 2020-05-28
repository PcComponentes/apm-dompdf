<?php
declare(strict_types=1);

namespace PcComponentes\ElasticAPM\DomPdf;

use ZoiloMora\ElasticAPM\ElasticApmTracer;

final class DomPdfFactory
{
    private ElasticApmTracer $elasticApmTracer;

    public function __construct(ElasticApmTracer $elasticApmTracer)
    {
        $this->elasticApmTracer = $elasticApmTracer;
    }

    public function create($options = null): DomPdf
    {
        return new DomPdf($this->elasticApmTracer, $options);
    }
}
