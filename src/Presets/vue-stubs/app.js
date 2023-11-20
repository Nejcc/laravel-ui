/**
 * First, we load all of this project's JavaScript dependencies, including Vue and other libraries.
 * This is an excellent starting point for building robust and powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';


/**
 * Next, we create a fresh Vue application instance. This instance will serve as the foundation
 * for registering components, plugins, and methods, making them ready for use in the application's views.
 */

const app = createApp({});

/**
 * This function is responsible for registering various Vue plugins required by the application.
 * These plugins might include Vue Router, Vuex, pinia, or any custom plugins that enhance the application's functionality.
 */

import registerPlugins from './registerPlugins';


/**
 * The 'registerGlobalMethods' is imported to add globally accessible methods to the Vue application.
 * These methods provide shared functionality across various components, aiding in maintaining a DRY codebase.
 */

import registerGlobalMethods from './registerGlobalMethods';


/**
 * This function handles the registration of global components, ensuring they are available throughout the application.
 * Global components are especially useful for frequently used elements like custom buttons, modals, or layout structures.
 */

import registerComponents from './registerComponents';


/**
 * The 'registerPlugins' function call is essential for integrating various Vue plugins into the application.
 * These plugins extend Vue's core functionalities and are crucial for essential utilities like routing and state management.
 * Registering these plugins ensures they are available and properly configured before the application fully renders.
 */

registerPlugins(app);

/**
 * The 'registerComponents' function is a key step in initializing the Vue application.
 * It registers global components, making them reusable across the application without redundant imports,
 * thus streamlining development and enhancing UI consistency.
 */

registerComponents(app);


/**
 * The 'registerGlobalMethods' function is used here to add global methods to the Vue application instance.
 * These methods are accessible across all components, promoting code reusability and reducing complexity.
 */

app.use(registerGlobalMethods);


/**
 * Finally, we mount the Vue application instance to a HTML element with the "id" attribute of "app".
 * This is typically included in the Laravel "auth" scaffolding, or you may need to add it manually.
 */

app.mount('#app');
