<?php

namespace App\Support;

use App\Models\Setting;
use Illuminate\Support\Str;

/**
 * Content for the two "Award-Winning, World-Class" story sections on the home page,
 * stored as JSON in the settings table (keys home_story_section_1 / home_story_section_2).
 */
class HomeStorySections
{
    public const SECTIONS = [1, 2];

    public const MEDIA_TYPES = [
        'image' => 'Image only',
        'youtube' => 'YouTube video',
        'video' => 'Uploaded video file',
    ];

    public static function settingKey(int $section): string
    {
        return "home_story_section_{$section}";
    }

    /**
     * The content the home page shipped with, used until an admin saves changes.
     */
    public static function defaults(int $section): array
    {
        return [
            'enabled' => true,
            'eyebrow' => "Nature's Beauty Creations Limited",
            'title' => 'An Award-Winning, World-Class,',
            'title_highlight' => 'Eco-friendly Factory',
            'description' => "We are honoured to be Sri Lanka's most awarded, certified and environment-friendly cosmetics manufacturer",
            'button_text' => 'Read More Of Our Story',
            'button_url' => 'https://palegoldenrod-squirrel-304943.hostingersite.com/',
            'button_new_tab' => true,
            'media_type' => $section === 2 ? 'youtube' : 'image',
            'image' => 'https://img.youtube.com/vi/TpYrcp4VdDs/maxresdefault.jpg',
            'image_alt' => "A glimpse inside Nature's Beauty Creations",
            'youtube_url' => $section === 2 ? 'https://www.youtube.com/watch?v=TpYrcp4VdDs' : '',
            'video' => null,
        ];
    }

    public static function get(int $section): array
    {
        $saved = json_decode((string) Setting::get(self::settingKey($section), ''), true);

        return array_merge(self::defaults($section), is_array($saved) ? $saved : []);
    }

    public static function save(int $section, array $content): void
    {
        Setting::set(self::settingKey($section), json_encode($content, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

    /**
     * All sections, prepared for the storefront (media URLs resolved).
     */
    public static function forHome(): array
    {
        return collect(self::SECTIONS)->mapWithKeys(function ($section) {
            $content = self::get($section);
            $youtubeId = self::youtubeId($content['youtube_url']);

            // Fall back to an image if the chosen video source is missing.
            $mediaType = match ($content['media_type']) {
                'youtube' => $youtubeId ? 'youtube' : 'image',
                'video' => $content['video'] ? 'video' : 'image',
                default => 'image',
            };

            $imageUrl = self::url($content['image'])
                ?: ($youtubeId ? "https://img.youtube.com/vi/{$youtubeId}/maxresdefault.jpg" : null);

            return [$section => array_merge($content, [
                'media_type' => $mediaType,
                'image_url' => $imageUrl,
                'video_url' => self::url($content['video']),
                'embed_url' => $youtubeId
                    ? "https://www.youtube.com/embed/{$youtubeId}?autoplay=1&controls=0&rel=0&modestbranding=1"
                    : null,
            ])];
        })->all();
    }

    /**
     * Extract the video ID from any common YouTube link format (or a bare ID).
     */
    public static function youtubeId(?string $url): ?string
    {
        $url = trim((string) $url);

        if ($url === '') {
            return null;
        }

        if (preg_match('/^[A-Za-z0-9_-]{11}$/', $url)) {
            return $url;
        }

        if (preg_match('~(?:youtube\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/|live/|v/)|youtu\.be/)([A-Za-z0-9_-]{11})~', $url, $matches)) {
            return $matches[1];
        }

        return null;
    }

    /**
     * Uploaded files are stored as public paths; defaults may be full URLs.
     */
    public static function url(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        return Str::startsWith($path, ['http://', 'https://', '//']) ? $path : asset($path);
    }
}
