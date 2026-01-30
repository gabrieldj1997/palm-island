<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    public function run(): void {
        $this->createNormalSections();
    }

    public function createNormalSections(): void
    {
        if (Section::where('card_id', '<', 17)->count() >= 65) {
            return;
        }
        $sections = [
            ['card_id' => 1, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 1, 'stone_resource' => 0],
            ['card_id' => 1, 'section_number' => 2, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 2, 'stone_resource' => 0],
            ['card_id' => 1, 'section_number' => 3, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 1, 'fish_resource' => 1, 'stone_resource' => 0],
            ['card_id' => 1, 'section_number' => 4, 'stars' => 0, 'improvements' => 2, 'wood_resource' => 1, 'fish_resource' => 2, 'stone_resource' => 0],

            ['card_id' => 2, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 1, 'stone_resource' => 0],
            ['card_id' => 2, 'section_number' => 2, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 2, 'stone_resource' => 0],
            ['card_id' => 2, 'section_number' => 3, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 1, 'fish_resource' => 1, 'stone_resource' => 0],
            ['card_id' => 2, 'section_number' => 4, 'stars' => 0, 'improvements' => 2, 'wood_resource' => 1, 'fish_resource' => 2, 'stone_resource' => 0],

            ['card_id' => 3, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 1, 'stone_resource' => 0],
            ['card_id' => 3, 'section_number' => 2, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 2, 'stone_resource' => 0],
            ['card_id' => 3, 'section_number' => 3, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 1, 'fish_resource' => 1, 'stone_resource' => 0],
            ['card_id' => 3, 'section_number' => 4, 'stars' => 0, 'improvements' => 2, 'wood_resource' => 1, 'fish_resource' => 2, 'stone_resource' => 0],

            ['card_id' => 4, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 1, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 4, 'section_number' => 2, 'stars' => 1, 'improvements' => 1, 'wood_resource' => 1, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 4, 'section_number' => 3, 'stars' => 5, 'improvements' => 3, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 4, 'section_number' => 4, 'stars' => 2, 'improvements' => 2, 'wood_resource' => 2, 'fish_resource' => 0, 'stone_resource' => 0],

            ['card_id' => 5, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 1, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 5, 'section_number' => 2, 'stars' => 1, 'improvements' => 1, 'wood_resource' => 1, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 5, 'section_number' => 3, 'stars' => 5, 'improvements' => 3, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 5, 'section_number' => 4, 'stars' => 2, 'improvements' => 2, 'wood_resource' => 2, 'fish_resource' => 0, 'stone_resource' => 0],

            ['card_id' => 6, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 1, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 6, 'section_number' => 2, 'stars' => 1, 'improvements' => 1, 'wood_resource' => 1, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 6, 'section_number' => 3, 'stars' => 5, 'improvements' => 3, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 6, 'section_number' => 4, 'stars' => 2, 'improvements' => 2, 'wood_resource' => 2, 'fish_resource' => 0, 'stone_resource' => 0],

            ['card_id' => 7, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 7, 'section_number' => 2, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 1],
            ['card_id' => 7, 'section_number' => 3, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 1],
            ['card_id' => 7, 'section_number' => 4, 'stars' => 2, 'improvements' => 2, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 2],

            ['card_id' => 8, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 8, 'section_number' => 2, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 1],
            ['card_id' => 8, 'section_number' => 3, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 1],
            ['card_id' => 8, 'section_number' => 4, 'stars' => 2, 'improvements' => 2, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 2],

            ['card_id' => 9, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 9, 'section_number' => 2, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 1],
            ['card_id' => 9, 'section_number' => 3, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 1],
            ['card_id' => 9, 'section_number' => 4, 'stars' => 2, 'improvements' => 2, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 2],

            ['card_id' => 10, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 1],
            ['card_id' => 10, 'section_number' => 2, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 1, 'stone_resource' => 1],
            ['card_id' => 10, 'section_number' => 3, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 1, 'fish_resource' => 0, 'stone_resource' => 1],
            ['card_id' => 10, 'section_number' => 4, 'stars' => 0, 'improvements' => 2, 'wood_resource' => 1, 'fish_resource' => 1, 'stone_resource' => 1],

            ['card_id' => 11, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 1, 'fish_resource' => 1, 'stone_resource' => 0],
            ['card_id' => 11, 'section_number' => 2, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 3, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 11, 'section_number' => 3, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 3, 'stone_resource' => 0],
            ['card_id' => 11, 'section_number' => 4, 'stars' => 0, 'improvements' => 2, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 3],

            ['card_id' => 12, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 12, 'section_number' => 2, 'stars' => 4, 'improvements' => 3, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 12, 'section_number' => 3, 'stars' => 0, 'improvements' => 1, 'wood_resource' => 1, 'fish_resource' => 1, 'stone_resource' => 0],
            ['card_id' => 12, 'section_number' => 4, 'stars' => 0, 'improvements' => 2, 'wood_resource' => 1, 'fish_resource' => 1, 'stone_resource' => 1],

            ['card_id' => 13, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 13, 'section_number' => 2, 'stars' => 1, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 13, 'section_number' => 3, 'stars' => 6, 'improvements' => 3, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 13, 'section_number' => 4, 'stars' => 3, 'improvements' => 2, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],

            ['card_id' => 14, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 14, 'section_number' => 2, 'stars' => 1, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 14, 'section_number' => 3, 'stars' => 6, 'improvements' => 3, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 14, 'section_number' => 4, 'stars' => 3, 'improvements' => 2, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],

            ['card_id' => 15, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 15, 'section_number' => 2, 'stars' => 3, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 15, 'section_number' => 3, 'stars' => 10, 'improvements' => 3, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 15, 'section_number' => 4, 'stars' => 6, 'improvements' => 2, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],


            ['card_id' => 16, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 16, 'section_number' => 2, 'stars' => 3, 'improvements' => 1, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 16, 'section_number' => 3, 'stars' => 10, 'improvements' => 3, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 16, 'section_number' => 4, 'stars' => 6, 'improvements' => 2, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],

            ['card_id' => 17, 'section_number' => 1, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 17, 'section_number' => 2, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 17, 'section_number' => 3, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
            ['card_id' => 17, 'section_number' => 4, 'stars' => 0, 'improvements' => 0, 'wood_resource' => 0, 'fish_resource' => 0, 'stone_resource' => 0],
        ];
        Section::insert($sections);
    }
}
