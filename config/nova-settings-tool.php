<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Settings Path
    |--------------------------------------------------------------------------
    |
    | Path to the JSON file where settings are stored.
    |
    */

    'path' => storage_path('app/settings.json'),

    /*
    |--------------------------------------------------------------------------
    | Sidebar Label
    |--------------------------------------------------------------------------
    |
    | The text that Nova displays for this tool in the navigation sidebar.
    |
    */

    'sidebar-label' => 'Settings',

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The browser/meta page title for the tool.
    |
    */

    'title' => 'Settings',

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    |
    | The good stuff :). Each setting defined here will render a field in the
    | tool. The only required key is `key`, other available keys include `type`,
    | `label`, `help`, `placeholder`, `language`, and `panel`.
    |
    */

    'settings' => [

        [
            'key' => 'payment_sum_success',
            'label' => 'Сумма подписки (после успешного платежа)',
            'panel' => 'Платежи',
            'type' => 'number',
        ],

        [
            'key' => 'payment_sum_error',
            'label' => 'Сумма подписки (после НЕ успешного платежа)',
            'panel' => 'Платежи',
            'type' => 'number',
        ],

        /*[
            'key' => 'payment_counts_error_delete',
            'label' => 'Количество неудачных транзакций перед деактивацией КОДА',
            'panel' => 'Платежи',
            'type' => 'number',
        ],*/

        [
            'key' => 'payment_counts_success_range',
            'label' => 'Интервал между списаниями в днях (успешный платеж)',
            'panel' => 'Платежи',
            'type' => 'number',
        ],

        /*[
            'key' => 'payment_counts_error_range',
            'label' => 'Интервал между списаниями в днях (не успешный платеж)',
            'panel' => 'Платежи',
            'type' => 'number',
        ],*/

        [
            'key' => 'payment_sum_error_range',
            'label' => 'На сколько раз разбивать при не удачном платеже',
            'panel' => 'Платежи',
            'type' => 'number',
            'value' => 2,
        ],

        [
            'key' => 'free_days',
            'label' => 'Бесплатных дней',
            'panel' => 'Платежи',
            'type' => 'number',
        ],

        [
            'key' => 'fio_doc',
            'label' => 'ИП на страницах',
            'panel' => 'Другое',
            'type' => 'text',
        ],

        [
            'key' => 'fio_doc_small',
            'label' => 'Организация на страницах',
            'panel' => 'Другое',
            'type' => 'text',
        ],

        [
            'key' => 'support_email',
            'label' => 'Email тех. поддержки',
            'panel' => 'Другое',
            'type' => 'text',
        ],

        [
            'key' => 'percent_for_home',
            'label' => 'Скидка на главной (%)',
            'panel' => 'Другое',
            'type' => 'number',
        ],

        [
            'key' => 'app_store_url',
            'label' => 'App store URL',
            'panel' => 'Приложение',
            'type' => 'text',
        ],

        [
            'key' => 'google_play_market_url',
            'label' => 'Google Play Market URL',
            'panel' => 'Приложение',
            'type' => 'text',
        ],

    ],

];
