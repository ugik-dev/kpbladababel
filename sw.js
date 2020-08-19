var CACHE_NAME = 'kpbladababel';
var urlsToCache = [
  './index.php/login',
  'sw.js',
  'assets/icon/site.webmanifest?v=0.0.1',
  'assets/icon/mstile-150x150.png',
  'assets/icon/android-chrome-192x192.png',
  'assets/icon/android-chrome-384x384.png',
  'assets/icon/apple-touch-icon.png',
  'assets/icon/favicon-32x32.png',
  'assets/icon/favicon-16x16.png',
  'assets/icon/safari-pinned-tab.svg',
  'assets/icon/favicon.ico',
  'assets/css/bootstrap.min.css',
  'assets/css/plugins/dataTables/buttons.datatables.min.css',
  'assets/css/plugins/dataTables/datatables.min.css',
  'assets/font-awesome/css/fontawesome5.7-all.min.css',
  'assets/css/plugins/c3/c3.min.css',
  'assets/css/animate.css',
  'assets/css/style.css',
  'assets/css/custom.css',
  'assets/js/jquery-3.1.1.min.js',
  'assets/js/plugins/jquery-autocomplete.js',
  'assets/js/plugins/metisMenu/jquery.metisMenu.js',
  // 'assets/js/plugins/slimScroll/jquery.slimscroll.min.js',
  'assets/js/plugins/pace/pace.min.js',
  'assets/js/plugins/dataTables/datatables.min.js',
  'assets/js/plugins/dataTables/dataTables.bootstrap4.min.js',
  'assets/js/plugins/dataTables/dataTables.rowsGroup.js',
  'assets/js/plugins/sweetalert/sweetalert2.all.min.js',
  'assets/js/plugins/bootstrap-notify-master/bootstrap-notify.min.js',
  'assets/js/plugins/datapicker/bootstrap-datepicker.js',
  'assets/js/plugins/typeahead/bootstrap3-typeahead.min.js',
  'assets/js/plugins/popper/popper.min.js',
  'assets/js/plugins/chartJs/Chart.min.js',
  'assets/js/plugins/d3/d3.min.js',
  'assets/js/plugins/d3/d3-save-svg.min.js',
  'assets/js/plugins/c3/c3.min.js',
  'assets/js/custom.js?v=0.0.2',
  'assets/js/plugins/jquery-ui/jquery-ui.min.js',
  'assets/css/plugins/datapicker/datepicker3.css',
  'assets/css/plugins/daterangepicker/daterangepicker-bs3.css',
  'assets/css/plugins/jquery-autocomplete.css',
  'assets/img/logo-babel.png',
];
console.log('loading sw');

self.addEventListener('install', function(event) {
  // Perform install steps
  console.log('installing sw');
  event.waitUntil(
      caches.open(CACHE_NAME)
          .then(function(cache) {
              console.log('Opened cache');
              var x = cache.addAll(urlsToCache);
              console.log('cache added');
              return x;
          })
  );
});

self.addEventListener('fetch', function(event) {
  event.respondWith(
      caches.match(event.request)
          .then(function(response) {
                  // Cache hit - return response
                  if (response) {
                      return response;
                  }
                  return fetch(event.request);
              }
          )
  );
});