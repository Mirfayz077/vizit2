const storageKey = 'vizitka-theme';

const registerThemePanel = (Alpine) => {
    Alpine.data('themePanel', () => ({
        theme: localStorage.getItem(storageKey) || 'silk',
        themes: ['silk', 'autumn', 'night'],

        init() {
            this.applyTheme(this.theme);
        },

        applyTheme(nextTheme) {
            this.theme = nextTheme;
            document.documentElement.setAttribute('data-theme', nextTheme);
            localStorage.setItem(storageKey, nextTheme);
        },

        isActive(name) {
            return this.theme === name;
        },
    }));
};

export { registerThemePanel };
