<?php
declare(strict_types=1);

namespace PcComponentes\ElasticAPM\DomPdf;

use Dompdf\Dompdf as DomPdfBase;
use ZoiloMora\ElasticAPM\ElasticApmTracer;

final class DomPdf extends DomPdfBase
{
    private const SPAN_NAME = 'Dompdf Render';
    private const SPAN_TYPE = 'template';
    private const SPAN_SUBTYPE = 'dompdf';
    private const SPAN_ACTION = 'render';
    private const STACKTRACE_SKIP = 2;

    private ElasticApmTracer $elasticApmTracer;

    public function __construct(ElasticApmTracer $elasticApmTracer, $options = null)
    {
        parent::__construct($options);

        $this->elasticApmTracer = $elasticApmTracer;
    }

    public function render()
    {
        if (false === $this->elasticApmTracer->active()) {
            parent::render();

            return;
        }

        $span = $this->elasticApmTracer->startSpan(
            self::SPAN_NAME,
            self::SPAN_TYPE,
            self::SPAN_SUBTYPE,
            self::SPAN_ACTION,
            null,
            self::STACKTRACE_SKIP,
        );

        parent::render();

        $span->stop();
    }
}
