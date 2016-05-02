<?php

use Illuminate\Database\Seeder;

class TemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template = [
            'level' =>           1,
            'strength' =>       10,
            'dexterity' =>      10,
            'constitution' =>   10,
            'intellegence' =>   10,
            'wisdom' =>         10,
            'charisma' =>       10,
            'inspiration' =>    0,
            'proficiency' =>    2,
            'str' =>    "\${floor((strength - 10) / 2)}",
            'dex' =>    "\${floor((dexterity - 10) / 2)}",
            'con' =>    "\${floor((constitution - 10) / 2)}",
            'int' =>    "\${floor((intellegence - 10) / 2)}",
            'wis' =>    "\${floor((wisdom - 10) / 2)}",
            'cha' =>    "\${floor((charisma - 10) / 2)}",
            'str_save' =>   "\${str}",
            'dex_save' =>   "\${dex}",
            'con_save' =>   "\${con}",
            'int_save' =>   "\${int}",
            'wis_save' =>   "\${wis}",
            'cha_save' =>   "\${cha}",
            'acrobatics' =>         "\${dex}",
            'animal_handling' =>    "\${wis}",
            'arcana' =>             "\${int}",
            'athletics' =>          "\${str}",
            'deception' =>          "\${cha}",
            'history' =>            "\${int}",
            'insight' =>            "\${wis}",
            'intimidation' =>       "\${cha}",
            'investigation' =>      "\${int}",
            'medicine' =>           "\${wis}",
            'nature' =>             "\${int}",
            'perception' =>         "\${wis}",
            'performance' =>        "\${cha}",
            'persuasion' =>         "\${cha}",
            'religion' =>           "\${int}",
            'slight_of_hand' =>     "\${dex}",
            'stealth' =>            "\${dex}",
            'survival' =>           "\${wis}",
            'passive_wisdom' =>     "\${wis}",
            'hp' =>         '1d8',
            'hp_max' =>     8,
            'hp_current' => 8,
            'hp_temp' =>    0,
            'armor' =>      0,
            'ac' =>         "\${dex + armor}",
            'initiative' => "\${dex}",
            'speed' =>      30,
            'proficiencies' => "",
            'class' => "",
            'background' => "",
            'race' =>   "",
            'alignment' => "",
            'personality' => "",
            'ideals' => "",
            'bonds' => "",
            'flaws' => "",
            'age' => "",
            'height' => "",
            'weight' => "",
            'eyes' => "",
            'skin' => "",
            'hair' => "",
            'cp' => 0,
            'sp' => 0,
            'ep' => 0,
            'gp' => 0,
            'pp' => 0
        ];
        DB::table('templates')->truncate();
        DB::table('templates')->insert([
            'name' => 'Generic D&D 5e Character',
            'tag_id' => App\Tag::find(1)->value('id'),
            'json' => json_encode($template)
        ]);
    }
}
