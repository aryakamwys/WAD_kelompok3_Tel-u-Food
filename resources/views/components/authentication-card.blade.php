<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white dark:bg-white ">
    <div>
        {{ $logo }}
    </div>

    <div {{ $attributes->merge(['class' => 'max-w-md mx-auto bg-white p-6 shadow-md rounded-lg']) }}>
        {{ $slot }}
    </div>

