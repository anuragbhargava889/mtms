<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regionOne = new Region();
        $regionOne->name = 'East Gurgaon';
        $regionOne->staus = 'enable';
        $regionOne->save();

        $regionTwo = new Region();
        $regionTwo->name = 'West Gurgaon';
        $regionTwo->staus = 'enable';
        $regionTwo->save();

        $regionThree = new Region();
        $regionThree->name = 'North Gurgaon';
        $regionThree->staus = 'enable';
        $regionThree->save();

        $regionFour = new Region();
        $regionFour->name = 'South Gurgaon';
        $regionFour->staus = 'enable';
        $regionFour->save();
    }
}
