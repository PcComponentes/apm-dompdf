# Elastic APM for Dompdf

This library supports Span traces of [Dompdf](https://github.com/dompdf/dompdf) renderings.

## Installation

1) Install via [composer](https://getcomposer.org/)

    ```shell script
    composer require pccomponentes/apm-dompdf
    ```

## Usage

In all cases, an already created instance of [ElasticApmTracer](https://github.com/zoilomora/elastic-apm-agent-php) is assumed.

### Instantiate directly

```php
<?php
declare(strict_types=1);

$domPdf = new PcComponentes\ElasticAPM\DomPdf\DomPdf(
    $apmTracer, /** \ZoiloMora\ElasticAPM\ElasticApmTracer instance. */
);
```

### Instantiate with factory

```php
<?php
declare(strict_types=1);

$domPdfFactory = new PcComponentes\ElasticAPM\DomPdf\DomPdfFactory(
    $apmTracer, /** \ZoiloMora\ElasticAPM\ElasticApmTracer instance. */
);

$domPdf = $domPdfFactory->create();
```

## License
Licensed under the [MIT license](http://opensource.org/licenses/MIT)

Read [LICENSE](LICENSE) for more information
