{{-- Home page promo popup (Admin > Settings > Home Popup). Usage: @include('partials.home-popup') --}}
@php
    $homePopup = \App\Support\HomePopup::get();
    // Admins can preview it from the admin page with ?popup_preview=1, even while it is turned off.
    $homePopupPreview = request()->boolean('popup_preview') && auth()->user()?->is_admin;
    $homePopupImage = \App\Support\HomePopup::imageUrl($homePopup);
    $homePopupShow = $homePopupPreview
        || \App\Support\HomePopup::shouldShow($homePopup);
@endphp
@if ($homePopupShow)
    @php $homePopupUrl = \App\Support\HomePopup::linkUrl($homePopup); @endphp
    <div class="nbc-home-popup" id="nbcHomePopup" role="dialog" aria-modal="true" aria-hidden="true"
        @if ($homePopup['title']) aria-labelledby="nbcHomePopupTitle" @else aria-label="Special offer" @endif
        data-frequency="{{ $homePopupPreview ? 'always' : $homePopup['frequency'] }}"
        data-delay="{{ $homePopupPreview ? 0 : (int) $homePopup['delay'] }}"
        data-version="{{ $homePopup['version'] }}">
        <div class="nbc-home-popup__backdrop" data-popup-close></div>
        <div class="nbc-home-popup__dialog {{ $homePopupImage ? '' : 'is-text-only' }}">
            <button type="button" class="nbc-home-popup__close" data-popup-close aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
            @if ($homePopupImage)
                <a href="{{ $homePopupUrl }}" class="nbc-home-popup__media" tabindex="-1">
                    <img src="{{ $homePopupImage }}" alt="{{ $homePopup['title'] }}">
                </a>
            @endif
            <div class="nbc-home-popup__body">
                @if ($homePopup['title'] !== '')
                    <h2 class="nbc-home-popup__title" id="nbcHomePopupTitle">{{ $homePopup['title'] }}</h2>
                @endif
                @if ($homePopup['message'] !== '')
                    <p class="nbc-home-popup__message">{!! nl2br(e($homePopup['message'])) !!}</p>
                @endif
                <a href="{{ $homePopupUrl }}" class="nbc-home-popup__btn">
                    {{ $homePopup['button_text'] }}
                    <i class="fa-regular fa-cart-shopping"></i>
                </a>
            </div>
        </div>
    </div>

    <script>
        (function () {
            var popup = document.getElementById('nbcHomePopup');
            if (!popup) return;

            var frequency = popup.dataset.frequency;
            var key = 'nbcHomePopup:' + popup.dataset.version;
            var periods = { day: 864e5, week: 6048e5 };

            function store(kind) {
                try { return kind === 'session' ? window.sessionStorage : window.localStorage; } catch (e) { return null; }
            }

            // Has this visitor already seen this version of the popup recently?
            function alreadySeen() {
                if (frequency === 'always') return false;
                var s = store(frequency);
                if (!s) return false;
                try {
                    var seenAt = parseInt(s.getItem(key) || '0', 10);
                    if (!seenAt) return false;
                    return frequency === 'session' || (Date.now() - seenAt) < periods[frequency];
                } catch (e) { return false; }
            }

            function markSeen() {
                if (frequency === 'always') return;
                var s = store(frequency);
                try { if (s) s.setItem(key, String(Date.now())); } catch (e) {}
            }

            var lastFocus = null;

            function open() {
                lastFocus = document.activeElement;
                popup.classList.add('is-open');
                popup.setAttribute('aria-hidden', 'false');
                document.documentElement.classList.add('nbc-home-popup-lock');
                markSeen();
                var closeBtn = popup.querySelector('.nbc-home-popup__close');
                if (closeBtn) closeBtn.focus({ preventScroll: true });
            }

            function close() {
                popup.classList.remove('is-open');
                popup.setAttribute('aria-hidden', 'true');
                document.documentElement.classList.remove('nbc-home-popup-lock');
                if (lastFocus && lastFocus.focus) lastFocus.focus({ preventScroll: true });
            }

            popup.querySelectorAll('[data-popup-close]').forEach(function (el) {
                el.addEventListener('click', close);
            });
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && popup.classList.contains('is-open')) close();
            });

            if (!alreadySeen()) {
                setTimeout(open, Math.max(0, parseInt(popup.dataset.delay, 10) || 0) * 1000);
            }
        })();
    </script>
@endif
