<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SectionAction;

class SectionActionSeeder extends Seeder
{
    public function run(): void {
        $this->CreateNormalSectionActions();
    }

    public function CreateNormalSectionActions(): void
    {
        if (SectionAction::where('section_id', '<', 65)->count() >= 99) {
            return;
        }
        $sectionActions = [
            /*==================================CANOARIA1=========================================*/
            ['section_id' => 1, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 1, 'type' => 2, 'wood_cost' => 0, 'fish_cost' => 1, 'stone_cost' => 0],
            ['section_id' => 1, 'type' => 3, 'wood_cost' => 0, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 2, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 2, 'type' => 3, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 3, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 3, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 4, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            /*==================================CANOARIA2=========================================*/
            ['section_id' => 5, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 5, 'type' => 2, 'wood_cost' => 0, 'fish_cost' => 1, 'stone_cost' => 0],
            ['section_id' => 5, 'type' => 3, 'wood_cost' => 0, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 6, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 6, 'type' => 3, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 7, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 7, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 8, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            /*==================================CANOARIA3=========================================*/
            ['section_id' => 9, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 9, 'type' => 2, 'wood_cost' => 0, 'fish_cost' => 1, 'stone_cost' => 0],
            ['section_id' => 9, 'type' => 3, 'wood_cost' => 0, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 10, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 10, 'type' => 3, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 11, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 11, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 12, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            /*==================================MADEREIRA4========================================*/
            ['section_id' => 13, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 13, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 14, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 14, 'type' => 3, 'wood_cost' => 1, 'fish_cost' => 0, 'stone_cost' => 1],

            ['section_id' => 16, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 16, 'type' => 2, 'wood_cost' => 2, 'fish_cost' => 0, 'stone_cost' => 2],
            /*==================================MADEREIRA5========================================*/
            ['section_id' => 17, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 17, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 18, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 18, 'type' => 3, 'wood_cost' => 1, 'fish_cost' => 0, 'stone_cost' => 1],

            ['section_id' => 20, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 20, 'type' => 2, 'wood_cost' => 2, 'fish_cost' => 0, 'stone_cost' => 2],
            /*==================================MADEREIRA6========================================*/
            ['section_id' => 21, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 21, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 22, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 22, 'type' => 3, 'wood_cost' => 1, 'fish_cost' => 0, 'stone_cost' => 1],

            ['section_id' => 24, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 24, 'type' => 2, 'wood_cost' => 2, 'fish_cost' => 0, 'stone_cost' => 2],
            /*==================================PEDREIRA7=========================================*/
            ['section_id' => 25, 'type' => 2, 'wood_cost' => 2, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 25, 'type' => 3, 'wood_cost' => 0, 'fish_cost' => 2, 'stone_cost' => 0],

            ['section_id' => 26, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 26, 'type' => 2, 'wood_cost' => 2, 'fish_cost' => 1, 'stone_cost' => 2],

            ['section_id' => 27, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 27, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 2, 'stone_cost' => 2],

            ['section_id' => 28, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            /*==================================PEDREIRA8=========================================*/
            ['section_id' => 29, 'type' => 2, 'wood_cost' => 2, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 29, 'type' => 3, 'wood_cost' => 0, 'fish_cost' => 2, 'stone_cost' => 0],

            ['section_id' => 30, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 30, 'type' => 2, 'wood_cost' => 2, 'fish_cost' => 1, 'stone_cost' => 2],

            ['section_id' => 31, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 31, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 2, 'stone_cost' => 2],

            ['section_id' => 32, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            /*==================================PEDREIRA9=========================================*/
            ['section_id' => 33, 'type' => 2, 'wood_cost' => 2, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 33, 'type' => 3, 'wood_cost' => 0, 'fish_cost' => 2, 'stone_cost' => 0],

            ['section_id' => 34, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 34, 'type' => 2, 'wood_cost' => 2, 'fish_cost' => 1, 'stone_cost' => 2],

            ['section_id' => 35, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 35, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 2, 'stone_cost' => 2],

            ['section_id' => 36, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            /*==================================MERCADO10=========================================*/
            ['section_id' => 37, 'type' => 1, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],
            ['section_id' => 37, 'type' => 2, 'wood_cost' => 2, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 37, 'type' => 3, 'wood_cost' => 0, 'fish_cost' => 2, 'stone_cost' => 0],

            ['section_id' => 38, 'type' => 1, 'wood_cost' => 1, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 38, 'type' => 3, 'wood_cost' => 1, 'fish_cost' => 0, 'stone_cost' => 1],

            ['section_id' => 39, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 1, 'stone_cost' => 0],
            ['section_id' => 39, 'type' => 2, 'wood_cost' => 0, 'fish_cost' => 1, 'stone_cost' => 1],

            ['section_id' => 40, 'type' => 1, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 1],
            /*=============================POSTOCOMERCIAL11=======================================*/
            ['section_id' => 41, 'type' => 1, 'wood_cost' => 2, 'fish_cost' => 2, 'stone_cost' => 0],
            ['section_id' => 41, 'type' => 2, 'wood_cost' => 0, 'fish_cost' => 1, 'stone_cost' => 0],
            ['section_id' => 41, 'type' => 3, 'wood_cost' => 1, 'fish_cost' => 0, 'stone_cost' => 0],

            ['section_id' => 42, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 2, 'stone_cost' => 2],
            ['section_id' => 42, 'type' => 3, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 43, 'type' => 1, 'wood_cost' => 2, 'fish_cost' => 1, 'stone_cost' => 2],
            ['section_id' => 43, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 44, 'type' => 1, 'wood_cost' => 2, 'fish_cost' => 2, 'stone_cost' => 0],
            ['section_id' => 44, 'type' => 2, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 1],
            ['section_id' => 44, 'type' => 3, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 1],
            /*=============================FERRAMENTARIA12========================================*/
            ['section_id' => 45, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 2],
            ['section_id' => 45, 'type' => 3, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 47, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 47, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 1],

            ['section_id' => 48, 'type' => 1, 'wood_cost' => 0, 'fish_cost' => 0, 'stone_cost' => 0],
            ['section_id' => 48, 'type' => 3, 'wood_cost' => 2, 'fish_cost' => 2, 'stone_cost' => 2],
            /*================================HABITAÇÃO13=========================================*/
            ['section_id' => 49, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 50, 'type' => 3, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 1],

            ['section_id' => 52, 'type' => 2, 'wood_cost' => 2, 'fish_cost' => 2, 'stone_cost' => 2],
            /*================================HABITAÇÃO14=========================================*/
            ['section_id' => 53, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 0],

            ['section_id' => 54, 'type' => 3, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 1],

            ['section_id' => 56, 'type' => 2, 'wood_cost' => 2, 'fish_cost' => 2, 'stone_cost' => 2],
            /*=================================TEMPLO15===========================================*/
            ['section_id' => 57, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 2],

            ['section_id' => 58, 'type' => 3, 'wood_cost' => 2, 'fish_cost' => 2, 'stone_cost' => 3],

            ['section_id' => 60, 'type' => 2, 'wood_cost' => 3, 'fish_cost' => 3, 'stone_cost' => 4],
            /*=================================TEMPLO16===========================================*/
            ['section_id' => 61, 'type' => 2, 'wood_cost' => 1, 'fish_cost' => 1, 'stone_cost' => 2],

            ['section_id' => 62, 'type' => 3, 'wood_cost' => 2, 'fish_cost' => 2, 'stone_cost' => 3],

            ['section_id' => 64, 'type' => 2, 'wood_cost' => 3, 'fish_cost' => 3, 'stone_cost' => 4],
        ];
        SectionAction::insert($sectionActions);
    }
}
