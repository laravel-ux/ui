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

- Adds the required frontend packages.
- Configures the Laravel UX styles and Tailwind source detection.
- Adapts the application CSS and JavaScript entrypoints.
- Preserves the package conventions expected by interactive components.

After the installer completes, use the normal frontend workflow for your project.

```shell
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
