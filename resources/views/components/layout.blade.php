<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laravel News Podcast Player</title>
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
</head>
<body class="min-h-screen bg-gray-50 font-sans text-black antialiased">
<div class="mx-auto max-w-2xl px-6 py-24">
    @persist('logo')
    <a x-data x-init="console.log('running')"
        href="/episodes"
        class="mx-auto flex max-w-max items-center gap-3 font-bold text-[#FF2D20] transition hover:opacity-80"
    >
        <svg class="w-12 h-12" fill="none" height="132" viewBox="0 0 134 132" width="134" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><linearGradient id="a-mobile"><stop offset="0" stop-color="#fff"></stop><stop offset=".1217" stop-color="#fffbfb"></stop><stop offset=".241" stop-color="#fff0ef"></stop><stop offset=".3594" stop-color="#ffdedc"></stop><stop offset=".4773" stop-color="#ffc3c0"></stop><stop offset=".5948" stop-color="#ffa29c"></stop><stop offset=".7121" stop-color="#ff7970"></stop><stop offset=".8272" stop-color="#ff493e"></stop><stop offset=".8616" stop-color="#ff392d"></stop><stop offset="1" stop-color="#ff2d20"></stop></linearGradient><linearGradient id="b-mobile" gradientUnits="userSpaceOnUse" x1="27.8771" x2="86.7363" xlink:href="#a-mobile" y1="65.8138" y2="65.8138"></linearGradient><linearGradient id="c-mobile" gradientUnits="userSpaceOnUse" x1="54.7828" x2="54.7828" xlink:href="#a-mobile" y1="57.2727" y2="86.9087"></linearGradient><path d="m129.001 0h-124.22756c-2.20914 0-4.000002 1.79086-4.000002 4v123.628c0 2.209 1.790872 4 4.000012 4h124.22755c2.209 0 4-1.791 4-4v-123.628c0-2.20914-1.791-4-4-4z" fill="#ff2d20"></path><path d="m81.5414 89.0681h-42.8088v-56.1614h-10.8537v65.8141h9.0356 1.8181 47.9877z" fill="url(#b-mobile)"></path><path d="m105.894 32.9067h-10.3027v55.229l-30.0267-55.229h-15.8673v48.3734h10.1374v-37.7883l30.0268 55.229h16.0325z" fill="#fff"></path><path d="m59.8347 57.2583h-10.1374v29.6163h10.1374z" fill="url(#c-mobile)"></path></svg>
        <span>Laravel News Podcast</span>
    </a>
    @endpersist

    <div class="py-10">{{ $slot }}</div>
    <x-episode-player></x-episode-player>
</div>
</body>
</html>
