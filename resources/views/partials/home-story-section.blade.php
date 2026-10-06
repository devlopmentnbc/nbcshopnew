{{-- Home page "story" section; content is managed in Admin > Settings > Home Story Sections. --}}
@if ($story['enabled'])
    <!-- Start NBC Factory Story Area -->
    <section class="rbt-component-area nbc-story-section" aria-labelledby="nbc-story-title-{{ $number }}">
        <div class="rbt-fullwidth-wrapper">
            <div class="nbc-story-card">
                <div class="nbc-story-copy rbt-scroll-trigger fade_in animation-order-1">
                    @if ($story['eyebrow'])
                        <span class="nbc-story-eyebrow">{{ $story['eyebrow'] }}</span>
                    @endif
                    <h2 id="nbc-story-title-{{ $number }}">
                        {{ $story['title'] }}
                        @if ($story['title_highlight'])
                            <em>{{ $story['title_highlight'] }}</em>
                        @endif
                    </h2>
                    @if ($story['description'])
                        <p class="nbc-story-lead">{!! nl2br(e($story['description'])) !!}</p>
                    @endif

                    @if ($story['button_text'] && $story['button_url'])
                        <a class="nbc-story-link" href="{{ $story['button_url'] }}"
                            @if ($story['button_new_tab']) target="_blank" rel="noopener" @endif>
                            {{ $story['button_text'] }}
                            <span class="nbc-story-link-icon" aria-hidden="true">
                                <i class="fa-solid fa-arrow-up-right"></i>
                            </span>
                        </a>
                    @endif
                </div>

                @if ($story['image_url'] || $story['media_type'] !== 'image')
                    <div class="nbc-story-media rbt-scroll-trigger fade_in animation-order-2">
                        @if ($story['media_type'] === 'image')
                            <div class="nbc-story-image">
                                <img src="{{ $story['image_url'] }}" alt="{{ $story['image_alt'] }}" loading="lazy">
                            </div>
                        @else
                            <div class="nbc-story-video" data-nbc-story-video
                                data-video-type="{{ $story['media_type'] }}"
                                data-video-src="{{ $story['media_type'] === 'youtube' ? $story['embed_url'] : $story['video_url'] }}"
                                data-video-title="{{ $story['image_alt'] ?: $story['title'] }}">
                                @if ($story['image_url'])
                                    <img src="{{ $story['image_url'] }}" alt="{{ $story['image_alt'] }}" loading="lazy">
                                @elseif ($story['media_type'] === 'video')
                                    {{-- No cover image: show the video's first frame instead. --}}
                                    <video src="{{ $story['video_url'] }}#t=0.1" preload="metadata" muted playsinline></video>
                                @endif
                                <button class="nbc-story-video-play" type="button" aria-label="Play video">
                                    <i class="fa-solid fa-play" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End NBC Factory Story Area -->

    @once
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('[data-nbc-story-video]').forEach(function(storyVideo) {
                    storyVideo.querySelector('.nbc-story-video-play')?.addEventListener('click', function() {
                        let player;

                        if (storyVideo.dataset.videoType === 'youtube') {
                            player = document.createElement('iframe');
                            player.allow =
                                'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
                            player.referrerPolicy = 'strict-origin-when-cross-origin';
                            player.allowFullscreen = true;
                        } else {
                            player = document.createElement('video');
                            player.controls = true;
                            player.autoplay = true;
                            player.playsInline = true;
                        }

                        player.src = storyVideo.dataset.videoSrc;
                        player.title = storyVideo.dataset.videoTitle;
                        storyVideo.replaceChildren(player);
                    });
                });
            });
        </script>
    @endonce
@endif
