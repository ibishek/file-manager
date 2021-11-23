// require('./bootstrap');

import { createInertiaApp } from '@inertiajs/inertia-svelte'
import { InertiaProgress } from "@inertiajs/progress";
InertiaProgress.init({
  color: '#2563EB',
  showSpinner: true
});

createInertiaApp({
  resolve: name => require(`./Pages/${name}.svelte`),
  setup({ el, App, props }) {
    new App({ target: el, props })
  },
})