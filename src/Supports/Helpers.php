<?php

if ( ! function_exists('slug') ) {

    /**
     * Create a collection from the given value.
     *
     * @param $user_id
     * @param $name
     * @return \Illuminate\Support\Collection
     * @internal param mixed $value
     */


    function slug($user_id, $name)
    {
        $slug = Str::slug($name);

        $slugCount = count( $this::whereRaw("user_id = ' {$user_id} ' and slug REGEXP '^{$slug}(-[0-9]*)?$'")->get() );

        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }
}