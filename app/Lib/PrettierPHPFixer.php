<?php

namespace App\Lib;

use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Tokens;
use Symfony\Component\Filesystem\Filesystem;
use SplFileInfo;
use stdClass;

/**
 * Fixer for using prettier-php to fix.
 */
final class PrettierPHPFixer implements FixerInterface
{
    /**
     * @inheritdoc
     */
    public function getPriority(): int
    {
        // Allow prettier to pre-process the code before php-cs-fixer
        return 999;
    }

    /**
     * @inheritdoc
     */
    public function isCandidate(Tokens $tokens): bool
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function isRisky(): bool
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function fix(SplFileInfo $file, Tokens $tokens): void
    {
        if (
            0 < $tokens->count() &&
            $this->isCandidate($tokens) &&
            $this->supports($file)
        ) {
            $this->applyFix($file, $tokens);
        }
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return "Prettier/php";
    }

    public function getDefinition(): FixerDefinitionInterface
    {
        return new PrettierPHPFixerDefinition();
    }

    /**
     * @inheritdoc
     */
    public function supports(SplFileInfo $file): bool
    {
        return true;
    }

    /**
     * @param SplFileInfo $file
     * @param Tokens      $tokens
     */
    private function applyFix(SplFileInfo $file, Tokens $tokens): void
    {
        exec("npm run prettier -- $file", $prettierOutput);
        $code = implode(PHP_EOL, $prettierOutput);
        $filteredOutput = [];
        $filteredOutput = array_slice($prettierOutput, 4);
        $code = implode(PHP_EOL, $filteredOutput);
        $tokens->setCode($code);
    }
}