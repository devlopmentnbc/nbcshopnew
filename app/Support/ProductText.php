<?php

namespace App\Support;

class ProductText
{
    /**
     * Turn admin-entered text into display HTML.
     *
     * Content that already contains HTML block/line tags is returned as-is so
     * existing formatted descriptions keep working. Plain text is escaped,
     * blank lines become paragraphs and single line breaks become <br>.
     */
    public static function format(?string $text): string
    {
        $text = trim((string) $text);

        if ($text === '') {
            return '';
        }

        if (preg_match('/<(p|br|ul|ol|li|div|h[1-6]|table|strong|em|b|i|span)\b[^>]*>/i', $text)) {
            return $text;
        }

        $text = str_replace(["\r\n", "\r"], "\n", $text);
        $paragraphs = preg_split('/\n\s*\n/', $text);

        return collect($paragraphs)
            ->map(fn ($p) => trim($p))
            ->filter()
            ->map(fn ($p) => '<p>' . nl2br(e($p), false) . '</p>')
            ->implode("\n");
    }
}
