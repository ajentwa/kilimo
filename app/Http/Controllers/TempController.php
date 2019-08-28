<?php

namespace App\Http\Controllers;

use App\Models\Setups\District;
use App\Models\Setups\Region;
use App\Models\Setups\Ward;
use Illuminate\Support\Facades\DB;

class TempController extends Controller
{
   /* public function index()
    {
        $districts = DB::table('temp')->select('district', 'region')->distinct()->get();

        foreach ($districts as $district) {
            $selectedDistrict = District::where('name', $district->district)->first();
            if ($selectedDistrict == null) {
                $region_id = Region::where('name', $district->region)->first()->id;
                $district_id = DB::table('tbl_districts')->insert(
                    ['region_id' => $region_id, 'name' => $district->district]);
                $wards = DB::table('temp')->select('ward')->where('district', '=', $district->district)
                    ->distinct()->get();

                foreach ($wards as $ward) {
                    DB::table('wards')->insert(
                        ['district_id' => $district_id, 'name' => $ward->ward]
                    );
//                 }
                }
            } else {
                $wards = DB::table('temp')->select('ward', 'district')->where('district', '=', $district->district)
                    ->distinct()->get();

                foreach ($wards as $ward) {
                    $dist_id = District::where('name', $ward->district)->first()->id;
                    $selectedWard = Ward::where([['name', $ward->ward], ['district_id', $dist_id]])->first();
                    if ($selectedWard == null) {
                        DB::table('wards')->insert(
                            ['district_id' => $dist_id, 'name' => $ward->ward]
                        );
                    }
                }
            }
        }
    }*/

    public function createRegion()
    {
        $regions = DB::table('temp')->select('region')->distinct()->get();

        foreach ($regions as $region) {
            DB::table('regions')->insert(
                ['name' => $region->region]
            );
        }
    }
    public function createDistrict()
    {
        $districts = DB::table('temp')->select('district', 'region')->distinct()->get();

        foreach ($districts as $district) {
            $region_id = Region::where('name', $district->region)->first()->id;
            DB::table('districts')->insert(
                ['region_id' => $region_id, 'name' => $district->district]);
        }
    }

    public function createWards()
    {
        /*$wards = DB::table('temp')->select('ward', 'district')->distinct()->get();

        foreach ($wards as $ward) {
            $dist_id = District::where('name', $ward->district)->first()->id;
                DB::table('wards')->insert(
                    ['district_id' => $dist_id, 'name' => $ward->ward]
                );
        }*/

        $districts = DB::table('temp')->select('district', 'region')->distinct()->get();

        foreach ($districts as $district)
        {
            $wards = DB::table('temp')->select('ward', 'district')->where('district', '=', $district->district)
                ->distinct()->get();
 
            foreach ($wards as $ward) {
                $dist_id = District::where('name', $ward->district)->first()->id;
                $selectedWard = Ward::where([['name', $ward->ward], ['district_id', $dist_id]])->first();
                if ($selectedWard == null) {
                    DB::table('wards')->insert(
                        ['district_id' => $dist_id, 'name' => $ward->ward]
                    );
                }
            }
        }
    }

}
