<?php

namespace Vedian\Grapebuilder\Support;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Vedian\Grapebuilder\Classes\BaseTemplate;
use Vedian\Grapebuilder\Classes\HeaderTemplate;
use Vedian\Grapebuilder\Support\Enum\TemplateEnum;

class Template
{
    private BaseTemplate $template;
    private string $templateClass;

    public function __construct(?string $template = null)
    {
        $this->setTemplateClass($template);
    }

    /**
     * @param mixed $name 
     * @param mixed $arguments 
     * @return TemplateEnum|null|$this 
     */
    public function __call($name, $arguments)
    {
        switch ($name) {
            case 'edit':
            case 'create':
            case 'show':
            case 'index':
                $this->setTemplateClass();
                $this->setTemplate(...$arguments);
            default:
                
                if (!$this->canRenderView($name)) {
                    $this->template->view = '404';
                    $this->template->part = 'error';
                }
        };


        return $this->render();
    }

    private function canRenderView($name)
    {
        return $this->exists($name) ? true : false;
    }

    /**
     * @param string $type 
     * @return Template
     */
    public static function make(string $type): Template
    {
        return new Template($type);
    }

    /**
     * Check if template part exists
     * 
     * @return TemplateEnum|null 
     */
    public function exists(?string $part): ?TemplateEnum
    {
        return TemplateEnum::tryFrom($part);
    }

    private function setTemplateClass(?string $template = null)
    {
        $this->templateClass = TemplateEnum::class($template);
    }

    public function setTemplate(...$args)
    {
        $this->template = new ($this->templateClass)(...$args);
    }

    public function render()
    {
        return $this->template->render();
    }
}
