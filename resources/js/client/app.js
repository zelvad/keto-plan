import Alpine from "alpinejs";

// Alpine
window.Alpine = Alpine;

document.addEventListener('DOMContentLoaded', () => {
    Alpine.start();
});

document.addEventListener('alpine:initializing', () => {
    // Plugins
    //Alpine.plugin(plugin)

    // Stores
    //Alpine.store('store', store())

    // Components
    //Alpine.data('tabs', tabs())
});

document.addEventListener('alpine:init', () => {
    Alpine.data('app', () => {
        //
    });
});
