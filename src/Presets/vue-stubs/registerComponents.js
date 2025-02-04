/**
 * This script is integral to the process of modularly incorporating Vue components
 * into the main application instance, facilitating their reuse across various parts 
 * of the application.
 * 
 * The script begins by importing 'ExampleComponent' from './components/ExampleComponent.vue'.
 * 'ExampleComponent' is a Vue Single File Component (SFC), designed to encapsulate specific
 * functionality or layout in a self-contained unit. This could be anything from a user interface
 * element, like a button or form, to a more complex feature, like a custom data display.
 * 
 * Following the import, the script exports the 'registerComponents' function. This function
 * accepts the primary Vue application instance ('app') as a parameter. Inside this function,
 * the 'app.component' method is employed to globally register the 'ExampleComponent'. 
 * The first argument, 'example-component', acts as the custom tag for this component, allowing 
 * it to be used in the application’s templates with this name.
 * 
 * Globally registering the 'ExampleComponent' in this manner makes it available throughout the 
 * application, obviating the need for repeated imports. This strategy not only streamlines the
 * code but also enhances its maintainability and readability.
 */

import ExampleComponent from './components/ExampleComponent.vue';

export default function registerComponents(app) {
    app.component('example-component', ExampleComponent);
}

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 * The 'registerGlobalMethods' is imported to add globally accessible methods to the Vue application.
 * These methods provide shared functionality across various components, aiding in maintaining a DRY codebase.
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });
