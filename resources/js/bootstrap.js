/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: pusherKey,
    cluster: pusherCluster ?? 'mt1',
    wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

window.Echo.channel('guiapag')
    .listen('GuiapagNotificationEvent', (e) => {
        console.log(e);
        let html = `<li class="notification-message">
        <a href="{{ route('activities') }}">
            <div class="media d-flex">
                <span class="avatar flex-shrink-0">
                    <img alt=""
                        src="{{ URL::asset('/build/img/profiles/avatar-02.jpg') }}">
                </span>
                <div class="media-body flex-grow-1">
                    <p class="noti-details"><span class="noti-title">Guilherme - fiscal
                    </span>${e.message}</span>
                    </p>
                    <p class="noti-time"><span class="notification-time">4 mins ago</span>
                    </p>
                </div>
            </div>
        </a>
    </li>`;

        $('.guia_notification').prepend(html);
    });



