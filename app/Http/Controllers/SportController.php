<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport as Sport;
class SportController extends Controller
{
    private $_sport;

    public function __construct(Sport $sport)
    {
        $this->_sport = $sport;
    }

    public function index()
    {

    }

    public function create($result)
    {
        $sport_id = $this->_sport->insert($result);
        return $sport_id;
    }


    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
