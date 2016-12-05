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
        $regionOne->status = 'enable';
        $regionOne->save();

        $regionTwo = new Region();
        $regionTwo->name = 'West Gurgaon';
        $regionTwo->status = 'enable';
        $regionTwo->save();

        $regionThree = new Region();
        $regionThree->name = 'North Gurgaon';
        $regionThree->status = 'enable';
        $regionThree->save();

        $regionFour = new Region();
        $regionFour->name = 'South Gurgaon';
        $regionFour->status = 'enable';
        $regionFour->save();
    }
}
