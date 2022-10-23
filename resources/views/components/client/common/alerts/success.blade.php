@if($message = session()->get('success'))
    <div class="w-full p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        {{ $message }}
    </div>
@endif
