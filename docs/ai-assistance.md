# AI Assistance

Laravel UX UI ships package-specific guidance for supported AI coding agents through Laravel Boost.

The `laravel-ux-ui-development` skill teaches an agent to:

- Use `x-ux::` components instead of recreating shadcn or React markup.
- Read the matching component reference before writing Blade.
- Follow documented props and compound-component composition.
- Preserve built-in accessibility and Alpine behavior.
- Integrate component state with Livewire property types.
- Apply application styling through merged Tailwind classes.
- Verify responsive layouts, dark mode, and right-to-left behavior.

## Discover the skill

List the skills Laravel Boost can discover in the current project.

```shell
php artisan boost:list-skills
```

For an existing Boost installation, discover newly available package skills.

```shell
php artisan boost:update --discover
```

The skill includes package-owned references for each documented component. Because it is versioned with the package,
the agent's guidance can evolve alongside the component API.
