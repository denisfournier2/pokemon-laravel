<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\ModelPokemon;
use Illuminate\Support\Facades\Validator;

use App\Traits\HttpResponses;

class PokemonController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $objPokemon;
    public function __construct()
    {
        $this->objBook=new ModelPokemon();
    }

    public function index()
    {
        return ModelPokemon::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type1' => 'required',
            'type2' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'sprite' => 'required',
          ]);
      
        if ($validator->fails()) {
            return $this->error('Dado inválido', 422, $validator->errors());
        }
    
        $created = ModelPokemon::create($validator->validated());
    
        if ($created) {
            return $this->response('Pokemon favoritado', 200, $created);
        }
    
        return $this->error('Pokemon não favoritado', 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ModelPokemon $name)
    {
        return new ModelPokemon($name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelPokemon $pokemon)
    {
        {
            $deleted = $pokemon->delete();
        
            if ($deleted) {
              return $this->response('Pokemon desfavoritado.', 200);
            }
            return $this->error('Não foi possível desfavoritar o pokemon.', 400);
          }
    }
}
