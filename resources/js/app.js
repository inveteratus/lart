import './bootstrap';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';

function themeSelector() {
    return {
        'open': false,
        'dark': null,
        set state(state) {
            if (state === 'system') {
                localStorage.removeItem('theme')
            }
            else {
                localStorage.theme = state
            }
            this.init()
            this.open = false
        },
        init() {
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
                this.dark = true
            } else {
                document.documentElement.classList.remove('dark')
                this.dark = false
            }
        }
    }
}

Alpine.data('themeSelector', themeSelector)

Livewire.start()
