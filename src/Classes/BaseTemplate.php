<?php

namespace Vedian\Grapebuilder\Classes;

use Vedian\Grapebuilder\Contracts\TemplateContract;
use Vedian\Grapebuilder\Support\Enum\TemplateEnum;

class BaseTemplate implements TemplateContract
{
    protected string $bladeNamespace = 'Grapebuilder::template';

    public function __construct(
        protected array $data = [],
        protected array $mergeData = []
    ) {
    }

    public function __get(string $key)
    {
        return $this->data[$key];
    }

    public function __set(string $key, $value)
    {
        $this->data[$key] = $value;
    }

    public function getViewSelector(): string
    {
        return implode('.', [
            $this->getBladeNamespace(),
            $this->part,
            $this->view,
        ]);
    }

    public function getData(): array
    {
        return ['data' => (object) $this->data];
    }

    public function setData(array $data = []): void
    {
        $this->data = (object) $data;
    }

    public function getMergeData(): array
    {
        return $this->mergeData;
    }

    public function getBladeNamespace(): string
    {
        return $this->bladeNamespace;
    }

    public function render(): \Illuminate\View\View
    {
        return view(
            $this->getViewSelector(),
            $this->getData(),
            $this->getMergeData()
        );
    }
}
