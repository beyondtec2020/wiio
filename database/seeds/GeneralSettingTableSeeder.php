<?php

use Illuminate\Database\Seeder;
use App\GeneralSetting;
use App\Seo;
class GeneralSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    										
        $data = new GeneralSetting();
        $data->about = "about us";
        $data->footer = "footer";
        $data->address = "address";
        $data->phone = "+88 01672 22 33 47";
        $data->fax = "fax";
        $data->office_email = "office@example.com";
        $data->title = "Propertise.com";
        $data->privacy = "privacy & Policy";
        $data->sitemap = "Sitemap";
        $data->terms = "Terms & Conditions";
        $data->save();


    										
        $data = new Seo();
        $data->analytics = "analytics";
        $data->siteurl = "https://www.facebook.com/";
        $data->metakeyword = "good, bad, lorem, ipsum";
        $data->save();
    }
}
