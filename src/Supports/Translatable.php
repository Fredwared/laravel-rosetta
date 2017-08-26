<?php

namespace Fredwared\Translatable\Supports;



use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Pagination\LengthAwarePaginator;
use Input;

trait Translatable{

    /*
     * Translations table
     */





    protected $translations = 'translations';


    /**
     * @return mixed getting Locale by code
     */
    private function getCode(){
        $code =  \App::getLocale();

        return \DB::table('locales')->where('code', $code)->first()->id;
    }




    /**
     * @return \Illuminate\Support\Collection   SELECTS all translation_id from translation table
     */
    private function getType(){
//        return \DB::table($this->translations)->where('locale_id', $this->getCode())->where('type', $this->getTable())->get(['translation_id']);



        return \DB::table($this->translations)->where('locale_id', $this->getCode())->where('type', $this->getTable())->get(['translation_id']);
    }




    /**
     * @return \Illuminate\Support\Collection
     */
    private function TranslationId(){
        $array = collect();
        foreach ( $this->getType() as $data ) {
           $array->push(  $data->translation_id );
        }

//        $sorted = collect($array)->sortByDesc();
        return $array->sortBy('id');
    }


    /**
     * @param int $perpage by default 50 items per Page
     * @return mixed
     */
    public static function translated($perpage = 50){
            $self = new self;
            $data = self::whereIn( 'id' , $self->TranslationId() )->latest()->paginate( $perpage );
            return $data;
    }







    public function locale($id){
       return \DB::table($this->translations)->insert([
            'locale_id' => $this->getCode(),
            'type'  => $this->getTable(),
            'translation_id' => $id
        ]);
    }




    

}