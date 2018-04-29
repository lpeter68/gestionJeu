<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JeuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //TODO mettre la vérif en place
        return [
            /*'nom' => 'required|between:1,30|alpha_num_spaces',
            'photo' => 'image|dimensions:min_width=100,min_height=100',
            'edition' => 'alpha_num_spaces',
            'date_edition' => 'numeric|nullable',
            'remarque' => 'alpha_num_spaces',
            'nombre_joueur_min' => 'numeric|nullable',
            'nombre_joueur_max' => 'numeric|nullable',
            'age' => 'alpha_num_spaces',
            'temps_jeu' => 'numeric|nullable',
            'hasard' => '',
            'strategie' => '',
            'des' => '',
            'cartes' => '',
            'adresse' => '',
            'questions' => '',
            'lettres' => '',
            'chiffres' => '',
            'equipes' => '',
            'cooperation' => '',
            'memoire' => '',
            'argent' => '',
            'point_victoire' => '',
            'interet' => 'numeric|nullable',
            'etat' => 'numeric|nullable',
            'regle' => 'numeric|nullable',
            'mise_en_place' => 'numeric|nullable',
            'pieces_manquantes' => 'alpha_num_spaces',
            'divers' => 'alpha_num_spaces'*/
        ];
    }
}
