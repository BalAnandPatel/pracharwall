// [START initialize_firebase_in_sw] 
// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here, other Firebase libraries
// are not available in the service worker.
importScripts('https://www.gstatic.com/firebasejs/3.5.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.5.2/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in the
// messagingSenderId.
//'messagingSenderId': '363984206617'
firebase.initializeApp({
    'messagingSenderId': '248782090747'
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
// [END initialize_firebase_in_sw]

var _escape = function (s) {
    return _escapeHTMLEntity(_escapeHTML(s));
};

var _escapeHTML = function (s) {
    return s.replace(/&amp;/g, '&')
            .replace(/&quot;/g, '"')
            .replace(/&lt;/g, '<')
            .replace(/&gt;/g, '>');
};

var _escapeHTMLEntity = function (str) {
    return str.replace(/&#(\d+);/g, function (match, dec) {
        return String.fromCharCode(dec);
    });
}

// If you would like to customize notifications that are received in the
// background (Web app is closed or not in browser focus) then you should
// implement this optional method.
// [START background_handler]
messaging.setBackgroundMessageHandler(function (payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);

    if (payload.source && payload.source === 'WebEngage') {
        return;
    }

    var title = (typeof payload.data.Subject !== "undefined") ? _escape(payload.data.Subject) : "You have a new message!";
    var message = (typeof payload.data.Message !== "undefined") ? _escape(payload.data.Message) : "Click to view more details.";
    var clickUrl = (typeof payload.data.ClickActionUrl !== "undefined") ? payload.data.ClickActionUrl : "https://www.sulekha.com/?utm_source=web_notification";
    var notificationTag = (typeof payload.data.TemplateTypeName !== "undefined") ? payload.data.TemplateTypeName : "web-notification";
    var ImageUrl = (typeof payload.data.ImageUrl !== "undefined") ? payload.data.ImageUrl : "";

    const notificationTitle = title;
    var notificationOptions = null
        if (ImageUrl.length > 0) {
            notificationOptions = {
                body: message,
                icon: '/c/pwa/sulekha-logo-2x.png',
                badge: '/c/pwa/sulekha-logo-1-5x.png',
                image: ImageUrl,
                tag: notificationTag,
				data: {
					url: clickUrl,
				}
            };
        }
        else {
            notificationOptions = {
                body: message,
                icon: '/c/pwa/sulekha-logo-2x.png',
                badge: '/c/pwa/sulekha-logo-1-5x.png',
                tag: notificationTag,
				data: {
					url: clickUrl,
				}
            };
        }

    return self.registration.showNotification(notificationTitle,
        notificationOptions);
});
// [END background_handler]

self.addEventListener('notificationclick', function (event) {
    console.log('On notification click: ', event.notification.tag);
    event.notification.close();

    let clickResponsePromise = Promise.resolve();
    if (event.notification.data && event.notification.data.url) {
        clickResponsePromise = clients.openWindow(event.notification.data.url);
    }

    event.waitUntil(
      Promise.all([
        clickResponsePromise
      ])
    );
});
var version = 'v1';
var cacheNameSpace = 'SulMobile';
var cacheName = cacheNameSpace + '-' + version;

var staticAssetRegex = /(^(https?:\/\/)(m\.sulekha\.com|lscdn\.azureedge\.net|lscdnv2\.azureedge\.net).*\.(js|css|png|svg|ttf|woff2?|pe?g))|(^https?:\/\/fonts\.(googleapis|gstatic)\.com\/.*)/i;
var urisToExclude = /^(https?:\/\/)(azsearch\.sulekha\.com|www\.google-analytics\.com|www\.youtube\.com).*/i;
var flyoutsRegex = /^(https?:\/\/).*common\/sul-hp-proc.*/i;

// Delete old caches that are not our current one!
self.addEventListener('activate', function(e) {
    console.log('[service-worker] Activating...');
    self.clients.claim();
    e.waitUntil(caches.keys().then(function(storedCaches) {
        return Promise.all(storedCaches.map(function(storedCacheName) {
            if (storedCacheName.indexOf(cacheNameSpace) === 0 && storedCacheName.indexOf(cacheName) === -1) {
                console.log('%c DELETE: Out of date cache: %s', 'color: #ff0000', storedCacheName);
                caches.delete(storedCacheName)
            }
            return false
        }))
    }))
});

// The first time the user starts up the PWA, 'install' is triggered.
self.addEventListener('install', function() {
    console.log('[service-worker] Installing .. ');
    self.skipWaiting()
});
var fetchWithSave = function fetchWithSave(cache, request) {
    return new Promise(function(resolve, reject) {
        fetch(request).then(function(response) {
            console.log('putting in cache and serving the response');
            cache.put(request, response.clone());
            resolve(response)
        }).
        catch (function(error) {
            console.error('Fetching failed:', error);
            reject(error)
        })
    })
};

var cacheWithNWFallback = function cacheWithNWFallback(cacheName, request, alwaysNet) {
    return new Promise(function(resolve, reject) {
        caches.open(cacheName).then(function(cache) {
            return cache.match(request).then(function(response) {
                if (response) {
                    alwaysNet && fetchWithSave(cache, request);
                    console.log('serving response from cache ' + cacheName, response);
                    return resolve(response)
                }
                return resolve(fetchWithSave(cache, request))
            }).
            catch (function(e) {
                console.log('Cache open error occured', request.url);
                reject(e)
            })
        })
    })
};
self.addEventListener('fetch', function(event) {   
	if(location.href+"".indexOf("sulekha.com/local-services/business-owners")!=-1 && location.href+"".indexOf("sulekha.com/service-provider")!=-1){ /*Console.log('Biz-no-cache')*/} 
	else
	{ 
	if (staticAssetRegex.test(event.request.url)) {
        event.respondWith(cacheWithNWFallback(cacheName, event.request))
    } else if (event.request.mode === 'navigate' && !urisToExclude.test(event.request.url) && !flyoutsRegex.test(event.request.url)) {
        event.respondWith(cacheWithNWFallback(cacheName, event.request, true))
    }}
});