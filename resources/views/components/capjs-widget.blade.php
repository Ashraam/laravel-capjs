@props([
    'id' => "capjs",
    'locale' => app()->getLocale() ?? 'en'
])

<cap-widget id="{{ $id }}"
    data-cap-api-endpoint="{{ config('capjs.host') }}/{{ config('capjs.key') }}/"
    data-cap-i18n-verifying-label="{{ __('capjs::capjs.verifying', [], $locale) }}"
    data-cap-i18n-initial-state="{{ __('capjs::capjs.initial_state', [], $locale) }}"
    data-cap-i18n-solved-label="{{ __('capjs::capjs.solved', [], $locale) }}"
    data-cap-i18n-error-label="{{ __('capjs::capjs.error', [], $locale) }}"
    data-cap-i18n-wasm-disabled="{{ __('capjs::capjs.wasm_disabled', [], $locale) }}"
    verify-aria-label="{{ __('capjs::capjs.aria.verify', [], $locale) }}"
    verifying-aria-label="{{ __('capjs::capjs.aria.verifying', [], $locale) }}"
    verified-aria-label="{{ __('capjs::capjs.aria.verified', [], $locale) }}"
    error-aria-label="{{ __('capjs::capjs.aria.error', [], $locale) }}"
></cap-widget>
