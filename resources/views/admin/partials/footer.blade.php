<footer class="d-footer">
    <span>Indonesia Superband Competition Admin Panel</span>
    <span class="d-footer-meta">
        <span>{{ now()->format('Y') }}</span>
        <span>{{ config('app.name') }}</span>
    </span>
</footer>

<script>
    document.querySelectorAll('[data-drawer-open]').forEach((button) => {
        button.addEventListener('click', () => document.body.classList.add('has-drawer-open'));
    });

    document.querySelectorAll('[data-drawer-close]').forEach((button) => {
        button.addEventListener('click', () => document.body.classList.remove('has-drawer-open'));
    });

    document.querySelectorAll('[data-profile-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            const menu = document.querySelector('[data-profile-menu]');
            menu?.classList.toggle('is-open');
        });
    });
</script>
