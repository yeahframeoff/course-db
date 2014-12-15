<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 12.12.14
 * Time: 4:07
 */

abstract class AbstractRestfulController extends \BaseController {

    protected static $class;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = call_user_func([static::$class, 'get']);;
        $keys = call_user_func([static::$class, 'keys']);
        return Response::json(['data' => $data, 'keys' => $keys]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $success = false;
        $id = null;
        try {
            $entry = call_user_func([static::$class, 'create'], Input::all());
            
            $id = $entry->id;
            $success = true;
        } catch (Exception $e) {
            Log::info($e);
            $success = false;
        }

        return Response::json(['success' => $success, 'id' => $id]);
    }


	/**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function update($id)
    {
        try {
            $entry = call_user_func([static::$class, 'find'], $id);
            $entry->update(Input::all());
            $success = true;
        } catch (Exception $e) {
            
            $success = false;
        }
        
        return Response::json(['success' => $success]);
    }


	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            call_user_func([static::$class, 'destroy'], $id);
            $success = true;
        } catch (Exception $e) {
            $success = false;
        }
        
        return Response::json(['success' => $success]);
    }
} 