<?php
namespace App\Lib;

use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;

class PrettierPHPFixerDefinition implements FixerDefinitionInterface
{
    public function getSummary(): string
    {
        return "sample";
    }

    public function getDescription(): string
    {
        return "sample";
    }

    public function getRiskyDescription(): string
    {
        return "sample";
    }

    public function getCodeSamples(): array
    {
        return [];
    }
}