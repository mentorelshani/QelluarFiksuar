<?php

use Illuminate\Database\Seeder;
use App\Entities\TemplatePage;

class CmsConfig extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = array(
            array('name' => 'Home', 'slug' => 'home'),
            array('name' => 'About', 'slug' => 'about'),
            array('name' => 'Product', 'slug' => 'product'),
            array('name' => 'News', 'slug' => 'news'),
            array('name' => 'Career', 'slug' => 'career')
        );

        \DB::table('tpl_pages')->insert($pages);

        $sections = array(
            array('name' => 'Section_1_Home', 'slug' => 'section_1_home', 'page_id' => 1),
            array('name' => 'Section_2_Home', 'slug' => 'section_2_home', 'page_id' => 1),
            array('name' => 'Section_4_Home', 'slug' => 'section_4_home', 'page_id' => 1),
            array('name' => 'Section_1_About', 'slug' => 'section_1_about', 'page_id' => 2),
            array('name' => 'Section_2_About', 'slug' => 'section_2_about', 'page_id' => 2)
         
        );


        \DB::table('tpl_sections')->insert($sections);


        $section_field = array(
            array('section_id' => 1),
            array('section_id' => 2),
            array('section_id' => 3),
            array('section_id' => 4),
            array('section_id' => 5)
        );

        \DB::table('tpl_sections_template')->insert($section_field);

         $module = array(
            array('prefix' => 'our_team'),
            array('prefix' => 'product'),
            array('prefix' => 'news'),
            array('prefix' => 'career')
        );

         \DB::table('tpl_modules')->insert($module);

        $moduleTemplate = array(
            array('module_id' => 1),
            array('module_id' => 2),
            array('module_id' => 3),
            array('module_id' => 4)
        );

        \DB::table('tpl_modules_template')->insert($moduleTemplate);

        $moduleRelations = array(
            array('prefix' => 'product_brand'),
        );

        \DB::table('tpl_modules_relations')->insert($moduleRelations);


    }
}
