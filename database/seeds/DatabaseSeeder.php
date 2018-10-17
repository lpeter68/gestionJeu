<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labelInteret = ['Nul','Moyen','Bien','Très-bien','Excellent'];
        foreach ($labelInteret as $label){
            $this->insertRessourceTable("interet", $label);
        }

        $labelEtat = ['Passable','Bien','Neuf'];
        foreach ($labelEtat as $label){
            $this-> insertRessourceTable('etat', $label);
        }

        $labelRegle = ['Facile','Moyenne','Longue'];
        foreach ($labelRegle as $label){
            $this->insertRessourceTable('regle', $label);
        }

        $this->call(RoleTableSeeder::class);
    }

    public static function insertRessourceTable($table, $valeur)
    {
        DB::table($table)->insert([
            'label' => $valeur,
        ]);
    }
}
