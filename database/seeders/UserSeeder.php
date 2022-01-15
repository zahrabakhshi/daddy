<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grandparents = [
            [
                'name' => 'محمد حسین',
                'last_name' => 'بخشی',
                'national_code' => '000',
                'gender' => 'male',
            ], [
                'name' => 'عالیه',
                'last_name' => 'فاتح',
                'national_code' => '001',
                'gender' => 'female',
            ]
        ];

        foreach ($grandparents as $Grandparent) {
            User::create($Grandparent);
        }

        $spouses = [
            [
                'name' => 'عطیه',
                'last_name' => 'صباغی',
                'national_code' => '006',
                'gender' => 'female',
            ], [
                'name' => 'محمد حسین',
                'last_name' => 'عامریون',
                'national_code' => '007',
                'gender' => 'male',
            ], [
                'name' => 'زهرا',
                'last_name' => 'سبحانی',
                'national_code' => '008',
                'gender' => 'female',
            ], [
                'name' => 'احسان',
                'last_name' => 'مهران',
                'national_code' => '009',
                'gender' => 'male',
            ],
        ];
        foreach ($spouses as $spouse) {
            User::create($spouse);
        }

        $children = [
            [
                'name' => 'محمد',
                'last_name' => 'بخشی',
                'father_id' => User::where('national_code', '000')->first()->id,
                'mother_id' => User::where('national_code', '001')->first()->id,
                'spouse_id' => User::where('national_code', '006')->first()->id,
                'national_code' => '002',
                'gender' => 'male',
            ], [
                'name' => 'فاطمه',
                'last_name' => 'بخشی',
                'father_id' => User::where('national_code', '000')->first()->id,
                'mother_id' => User::where('national_code', '001')->first()->id,
                'spouse_id' => User::where('national_code', '007')->first()->id,
                'national_code' => '003',
                'gender' => 'female',
            ], [
                'name' => 'مهدی',
                'last_name' => 'بخشی',
                'father_id' => User::where('national_code', '000')->first()->id,
                'mother_id' => User::where('national_code', '001')->first()->id,
                'spouse_id' => User::where('national_code', '008')->first()->id,
                'national_code' => '004',
                'gender' => 'male',
            ], [
                'name' => 'زهرا',
                'last_name' => 'بخشی',
                'father_id' => User::where('national_code', '000')->first()->id,
                'mother_id' => User::where('national_code', '001')->first()->id,
                'spouse_id' => User::where('national_code', '009')->first()->id,
                'national_code' => '005',
                'gender' => 'female',
            ],
        ];

        foreach ($children as $child) {
            User::create($child);
        }

        //add spouses
        User::where('national_code', '000')->first()->update(array('spouse_id' => User::where('national_code', '001')->first()->id));
        User::where('national_code', '001')->first()->update(array('spouse_id' => User::where('national_code', '000')->first()->id));
        User::where('national_code', '006')->first()->update(array('spouse_id' => User::where('national_code', '002')->first()->id));
        User::where('national_code', '007')->first()->update(array('spouse_id' => User::where('national_code', '003')->first()->id));
        User::where('national_code', '008')->first()->update(array('spouse_id' => User::where('national_code', '004')->first()->id));
        User::where('national_code', '009')->first()->update(array('spouse_id' => User::where('national_code', '005')->first()->id));

        $grandchildren = [
            [
                'name' => 'زینب',
                'last_name' => 'عامریون',
                'father_id' => User::where('national_code', '007')->first()->id,
                'mother_id' => User::where('national_code', '003')->first()->id,
                'national_code' => '010',
                'gender' => 'female',
            ], [
                'name' => 'محمد هادی',
                'last_name' => 'عامریون',
                'father_id' => User::where('national_code', '007')->first()->id,
                'mother_id' => User::where('national_code', '003')->first()->id,
                'national_code' => '011',
                'gender' => 'male',
            ], [
                'name' => 'محمد کاظم',
                'last_name' => 'عامریون',
                'father_id' => User::where('national_code', '007')->first()->id,
                'mother_id' => User::where('national_code', '003')->first()->id,
                'national_code' => '012',
                'gender' => 'male',
            ],
            [
                'name' => 'محمد حسین',
                'last_name' => 'بخشی',
                'father_id' => User::where('national_code', '002')->first()->id,
                'mother_id' => User::where('national_code', '006')->first()->id,
                'national_code' => '013',
                'gender' => 'male',
            ], [
                'name' => 'فاطمه',
                'last_name' => 'بخشی',
                'father_id' => User::where('national_code', '002')->first()->id,
                'mother_id' => User::where('national_code', '006')->first()->id,
                'national_code' => '014',
                'gender' => 'female',
            ],
            [
                'name' => 'هدی',
                'last_name' => 'بخشی',
                'father_id' => User::where('national_code', '004')->first()->id,
                'mother_id' => User::where('national_code', '008')->first()->id,
                'national_code' => '015',
                'gender' => 'female',
            ],
        ];

        foreach ($grandchildren as $grandchild) {
            User::create($grandchild);
        }

    }
}
