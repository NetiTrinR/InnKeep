<?php

use Illuminate\Database\Seeder;

class CharacterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keehla_template = [
            'level' =>          2,
            'strength' =>       8,
            'dexterity' =>      19,
            'constitution' =>   14,
            'intellegence' =>   14,
            'wisdom' =>         12,
            'charisma' =>       16,
            'inspiration' =>    1,
            'proficiency' =>    2,
            'str' =>    "\${floor((strength - 10) / 2)}",
            'dex' =>    "\${floor((dexterity - 10) / 2)}",
            'con' =>    "\${floor((constitution - 10) / 2)}",
            'int' =>    "\${floor((intellegence - 10) / 2)}",
            'wis' =>    "\${floor((wisdom - 10) / 2)}",
            'cha' =>    "\${floor((charisma - 10) / 2)}",
            'str_save' =>   "\${str}",
            'dex_save' =>   "\${dex + proficiency}",
            'con_save' =>   "\${con}",
            'int_save' =>   "\${int + proficiency}",
            'wis_save' =>   "\${wis}",
            'cha_save' =>   "\${cha}",
            'acrobatics' =>         "\${dex + proficiency}",
            'animal_handling' =>    "\${wis}",
            'arcana' =>             "\${int}",
            'athletics' =>          "\${str}",
            'deception' =>          "\${cha + proficiency}",
            'history' =>            "\${int}",
            'insight' =>            "\${wis}",
            'intimidation' =>       "\${cha}",
            'investigation' =>      "\${int}",
            'medicine' =>           "\${wis}",
            'nature' =>             "\${int}",
            'perception' =>         "\${wis + proficiency}",
            'performance' =>        "\${cha + proficiency}",
            'persuasion' =>         "\${cha + proficiency}",
            'religion' =>           "\${int}",
            'slight_of_hand' =>     "\${dex + proficiency}",
            'stealth' =>            "\${dex + proficiency}",
            'survival' =>           "\${wis}",
            'passive_wisdom' =>     "\${wis}",
            'hit_die' =>    '1d8',
            'hit_points' => '8',
            'initiative' => "\${dex}`",
            'speed' =>  '30',
            'proficiencies' => "",
            'class' => 'Rouge',
            'background' => "Charlatan",
            'race' =>   "Catfolk",
            'alignment' => "Chaotic Netural",
            'personality' => "",
            'ideals' => "",
            'bonds' => "",
            'flaws' => "",
            'age' => "",
            'height' => "",
            'weight' => "",
            'eyes' => "Turquoice",
            'skin' => "Tan",
            'hair' => "Brown",
            'cp' => 25,
            'sp' => 0,
            'ep' => 0,
            'gp' => 108,
            'pp' => 1
        ];
        DB::table('characters')->truncate();
        $char = new App\Character(['name'=>'Keehla']);
        $char->stats = json_encode($keehla_template);
        App\User::find(1)->characters()->save($char);
        App\Campaign::find(1)->characters()->save($char);
        $char->save();
    }
}
