<?php

    function boom_festive_register_plugins( $plugins ) {
        $theme_plugins = [
            [
                'name'        => 'DIVI Builder',
                'description' => 'Page Builder plugin for pages',
                'slug'        => 'divi-builder',  // The slug has to match the extracted folder from the zip.
                'source'      => 'https://demo.ibsofts.com/boom-festive/plugins/divi-builder.zip',
                'required' => true,
                'preselected' => true,
            ],
        ];
    
        return array_merge( $plugins, $theme_plugins );
    }
    add_filter( 'ocdi/register_plugins', 'boom_festive_register_plugins' );

    function boom_festive_import_files() {
        return [
          [
            'import_file_name'             => 'Shop 1',
            'categories'                   => ['E-Commerce'],            
            'import_file_url'            => 'http://www.your_domain.com/ocdi/demo-content.xml',
            'import_widget_file_url'     => 'http://www.your_domain.com/ocdi/widgets.json',
            'import_customizer_file_url' => 'http://www.your_domain.com/ocdi/customizer.dat',
            'import_redux'               => [
                [
                'file_url'    => 'http://www.your_domain.com/ocdi/redux.json',
                'option_name' => 'redux_option_name',
                ],
            ],
            'import_preview_image_url'   => 'http://demo.ibsofts.com/boom-festive/demo/demo1.png',
            'preview_url'                => 'https://demo.ibsofts.com/boom-fest/',
          ],
          [
            'import_file_name'             => 'Lawyer 1',
            'categories'                   => [ 'Lawyer' ],        
            'import_file_url'            => 'http://www.your_domain.com/ocdi/demo-content.xml',
            'import_widget_file_url'     => 'http://www.your_domain.com/ocdi/widgets.json',
            'import_customizer_file_url' => 'http://www.your_domain.com/ocdi/customizer.dat',
            'import_redux'               => [
                [
                'file_url'    => 'http://www.your_domain.com/ocdi/redux.json',
                'option_name' => 'redux_option_name',
                ],
            ],
            'import_preview_image_url'   => 'http://demo.ibsofts.com/boom-festive/demo/demo1.png',
            'preview_url'                => 'https://demo.ibsofts.com/boom-fest/',
          ],
          [
            'import_file_name'             => 'Blog 1',
            'categories'                   => [ 'Blog' ],        
            'import_file_url'            => 'http://www.your_domain.com/ocdi/demo-content.xml',
            'import_widget_file_url'     => 'http://www.your_domain.com/ocdi/widgets.json',
            'import_customizer_file_url' => 'http://www.your_domain.com/ocdi/customizer.dat',
            'import_redux'               => [
                [
                'file_url'    => 'http://www.your_domain.com/ocdi/redux.json',
                'option_name' => 'redux_option_name',
                ],
            ],
            'import_preview_image_url'   => 'http://demo.ibsofts.com/boom-festive/demo/demo1.png',
            'preview_url'                => 'https://demo.ibsofts.com/boom-fest/',
          ],
        ];
    }
    add_filter( 'ocdi/import_files', 'boom_festive_import_files' );