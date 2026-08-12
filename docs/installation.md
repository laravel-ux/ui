# Installation

Install Laravel UX UI with Composer.

```shell
composer require laravel-ux/ui
```

Laravel package discovery registers the service provider automatically.

## Run the installer

Run the package installer from your Laravel application.

```shell
php artisan ux:install
```

The installer prepares the application for Laravel UX UI:

- Adds the required Tailwind CSS 4 frontend packages to `package.json`.
- Imports the Laravel UX stylesheet from `resources/css/app.css`.
- Adds Laravel UX package views to Tailwind source detection.
- Imports the Laravel UX Alpine plugins from `resources/js/app.js`.

The command preserves the existing entrypoint contents and can be run again safely.

After the installer completes, install the frontend dependencies and use the normal frontend workflow for your
project.

```shell
npm install
npm run dev
```

For a production build, run:

```shell
npm run build
```

## Verify the installation

Render a component in any Blade or Livewire view.

```blade
<x-ux::button>Continue</x-ux::button>
```

## Laravel Boost

The package ships with the `laravel-ux-ui-development` skill for supported coding agents.

```shell
php artisan boost:install --skills
```

For an existing Boost installation, discover newly available package skills.

```shell
php artisan boost:update --discover
```
