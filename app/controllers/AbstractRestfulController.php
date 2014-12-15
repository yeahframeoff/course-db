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
        $response = Response::json([
            'keys' => call_user_func([static::$class, 'keys']), 
            'data' => call_user_func([static::$class, 'get'])
        ]);
        return $response;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Response::json(call_user_func([static::$class, 'find']), $id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        call_user_func([static::$class, 'destroy'], $id);

        return Response::json(['success' => true]);
    }
} 