<?php

namespace Vedian\Grapebuilder\Support\Enum;

use Vedian\Grapebuilder\Classes\BaseTemplate;
use Vedian\Grapebuilder\Classes\HeaderTemplate;

enum TemplateEnum: string
{
    case HEADER = 'header';
    case FOOTER = 'footer';
    case SECTION = 'section';

    public static function class(?string $template)
    {
         return match($template) {
            TemplateEnum::HEADER->value => HeaderTemplate::class,
            // TemplateEnum::FOOTER => new FooterTemplate(),
            // TemplateEnum::SECTION => new SectionTemplate(),
            default => BaseTemplate::class,
        };
    }

    public static function toArray()
    {
        return array_map(function ($case) {
            return $case->value;
        }, self::cases());
    }
}
