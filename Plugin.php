<?php namespace October\Test;

use Backend;
use System\Classes\PluginBase;

/**
 * Test Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'October Tester',
            'description' => 'Used for testing the Relation Controller behavior and others.',
            'author'      => 'Alexey Bobkov, Samuel Georges',
            'icon'        => 'icon-child'
        ];
    }

    public function registerNavigation()
    {
        return [
            'test' => [
                'label'       => 'Playground',
                'url'         => Backend::url('october/test/people'),
                'icon'        => 'icon-child',
                'order'       => 100,

                'sideMenu' => [
                    'people' => [
                        'label'       => 'People',
                        'icon'        => 'icon-database',
                        'url'         => Backend::url('october/test/people'),
                    ],
                    'posts' => [
                        'label'       => 'Posts',
                        'icon'        => 'icon-database',
                        'url'         => Backend::url('october/test/posts'),
                    ],
                    'users' => [
                        'label'       => 'Users',
                        'icon'        => 'icon-database',
                        'url'         => Backend::url('october/test/users'),
                    ],
                    'countries' => [
                        'label'       => 'Countries',
                        'icon'        => 'icon-database',
                        'url'         => Backend::url('october/test/countries'),
                    ],
                    'stafforders' => [
                        'label'       => 'Staff / Orders',
                        'icon'        => 'icon-database',
                        'url'         => Backend::url('october/test/stafforders'),
                    ],
                ]
            ]
        ];
    }

    public function registerReportWidgets()
    {
        return [
            'October\Test\ReportWidgets\PostStats' => [
                'label' => 'Post stats',
                'context' => 'dashboard'
            ]
        ];
    }

}
