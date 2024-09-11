# Laravel Livewire Swal

Directly inspired by : https://github.com/jantinnerezo/livewire-alert

# :rocket: Installation

You can install the package via composer:

```bash

composer require matierenoire/laravel-livewire-swal

```

# Requirements

This package uses Livewire under the hood. Please make sure you include it in your dependencies before using this package.

- PHP 7.2 or higher

- Laravel 7, 8, 9, 10, 11

- Livewire

- SweetAlert2

# Usage

## Include Component

Insert Sweet2Alert2 and livewire alert scripts component after livewire scripts directive.

SweetAlert2 script is not included by default so make sure you include it before

```html
<body>
  ... @livewireScripts ...

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  ...
  <x-livewire-alert::scripts />
</body>
```

## Publish Config File

```php
php artisan vendor:publish --provider="MN\LivewireAlert\LivewireAlertServiceProvider" --tag="config"
```

## Show Alert

You can play around with SweetAlert2 configuration.

```php
$this->alert('success', 'Hello World!', [
      'position' =>  'top-end',
      'timer' =>  3000,
      'toast' =>  true,
      'text' =>  '',
      'confirmButtonText' =>  'Ok',
      'cancelButtonText' =>  'Cancel',
      'showCancelButton' =>  true,
      'showConfirmButton' =>  false,
]);
```

## Alert Confirmation

This package also supports showing confirmation alert on action.

This is a complete refactor of the previous alert confirmation to support multiple confirms on the same livewire component.
First, setup your action methods for onConfirmed and onCancelled callback. Of course you can name your methods anything you want.

```php
public function confirmed()
{
    // Example code inside confirmed callback

    $this->alert(
        'success',
        'Thanks! consider giving it a star on github.'
    );
}

public function cancelled()
{
    // Example code inside cancelled callback

    $this->alert('info', 'Understood');
}
```

Make sure you register confirmed and cancelled methods as event listeners.

See: laravel-livewire.com/docs/2.x/events for more information about event listeners.

If you have multiple confirmation alerts on the same livewire component, you can define as many callback methods you want and just add it to event listeners.

```php
protected $listeners = [
    'confirmed',
    'cancelled',
    ...
];
```

Finally, create an action method that triggers the confirmation alert with onConfirmed and onCancelled callbacks pointed to the event listeners you registered.

```php
public function triggerConfirm()
{
    $this->confirm('Do you love Livewire Alert?', [
        'toast' => false,
        'position' => 'center',
        'showConfirmButton' => true,
        'cancelButtonText' => Nope,
        'onConfirmed' => 'confirmed',
        // 'onConfirmed' => ['confirmed', $id], you can pass argument with array
        'onCancelled' => 'cancelled'
    ];
}
```
