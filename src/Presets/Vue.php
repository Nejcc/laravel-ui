<?php

namespace Laravel\Ui\Presets;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;

class Vue extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install() : void
    {
        static::ensureComponentDirectoryExists();
        static::updatePackages();
        static::updateViteConfiguration();
        static::updateBootstrapping();
        static::updateComponent();
        static::addRegisterComponents();
        static::addRegisterPlugins();
        static::addRegisterGlobalMethods();
        static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages) : array
    {
        return [
            '@vitejs/plugin-vue' => '^4.0.0',
            'vue' => '^3.2.37',
        ] + Arr::except($packages, [
            '@vitejs/plugin-react',
            'react',
            'react-dom',
        ]);
    }

    /**
     * Update the Vite configuration.
     *
     * @return void
     */
    protected static function updateViteConfiguration() : void
    {
        copy(__DIR__.'/vue-stubs/vite.config.js', base_path('vite.config.js'));
    }

    /**
     * Update the example component.
     *
     * @return void
     */
    protected static function updateComponent() : void
    {
        (new Filesystem)->delete(
            resource_path('js/components/Example.js')
        );

        copy(
            __DIR__.'/vue-stubs/ExampleComponent.vue',
            resource_path('js/components/ExampleComponent.vue')
        );
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping() :void
    {
        copy(__DIR__.'/vue-stubs/app.js', resource_path('js/app.js'));
    }

    /**
     * Add the Vue plugins registration file if it doesn't exist.
     *
     * This method checks if the 'registerPlugins.js' file already exists in the application's 
     * JavaScript resource directory. If not, it copies a predefined template for registering 
     * Vue plugins. This ensures that the application is equipped with the latest configuration 
     * for integrating essential Vue plugins, while avoiding overwriting any existing customizations.
     *
     * @return void
     */
    protected static function addRegisterPlugins() : void
    {
        static::copyFileIfNotExists(
            __DIR__.'/vue-stubs/registerPlugins.js', 
            resource_path('js/registerPlugins.js')
        );
    }


    /**
     * Add the global components registration file if it doesn't exist.
     *
     * Before copying, this method checks for the existence of the 'registerComponents.js' file 
     * in the application's JavaScript resources. If the file is not present, it copies a template 
     * file, enabling the application to have an updated list for registering frequently used components. 
     * This action prevents overwriting any existing files and ensures the addition of necessary components.
     *
     * @return void
     */
    protected static function addRegisterComponents() : void
    {
        static::copyFileIfNotExists(
            __DIR__.'/vue-stubs/registerComponents.js', 
            resource_path('js/registerComponents.js')
        );
    }


    /**
     * Add the global methods registration file if it doesn't exist.
     *
     * This function first checks whether 'registerGlobalMethods.js' exists in the JavaScript 
     * resource directory. If not, it proceeds to copy a template file for global methods. 
     * This ensures the Vue application has access to shared functionalities without overwriting 
     * any existing configurations, aiding in maintaining a modern and efficient codebase.
     *
     * @return void
     */
    protected static function addRegisterGlobalMethods() : void
    {
        static::copyFileIfNotExists(
            __DIR__.'/vue-stubs/registerGlobalMethods.js', 
            resource_path('js/registerGlobalMethods.js')
        );
    }


    /**
     * Copy a file from the source to the destination if it doesn't already exist.
     *
     * This method is a generalized utility function for copying files. It checks if the target file 
     * already exists in the destination directory. If it doesn't, the file is copied from the source.
     * This is used to safely add various Vue-related files like plugin registration, component registration,
     * and global methods without overwriting existing files.
     *
     * @param string $source Source file path.
     * @param string $destination Destination file path.
     * @return void
     */
    private static function copyFileIfNotExists(string $source, string $destination) : void
    {
        if (!file_exists($destination)) {
            copy($source, $destination);
        }
    }
}

}
