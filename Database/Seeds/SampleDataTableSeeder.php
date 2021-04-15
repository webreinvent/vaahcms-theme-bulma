<?php
namespace VaahCms\Themes\BulmaBlogTheme\Database\Seeds;


use Illuminate\Database\Seeder;
use VaahCms\Modules\Cms\Libraries\CmsSeeder;

class SampleDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $theme_slug = 'bulmablogtheme';

        $file = __DIR__.'/json/sample/pages.json';
        CmsSeeder::createSampleField($theme_slug, $file);

        $file = __DIR__.'/json/sample/blogs.json';
        CmsSeeder::createSampleField($theme_slug, $file, 'blog');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */


}
