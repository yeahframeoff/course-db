<?php

class TeacherController extends AbstractRestfulController {

    protected static $class = 'Teacher';

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        Teacher::create(Input::all());

        return Response::json(['success' => true]);
    }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        Teacher::find($id)->update(Input::all());

        return Response::json(['success' => true]);
	}

}
