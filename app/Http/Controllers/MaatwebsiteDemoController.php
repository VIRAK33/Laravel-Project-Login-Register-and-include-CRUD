<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Excel;

class MaatwebsiteDemoController extends Controller
{

	/**
     * Return View file
     *
     * @var array
     */
	public function importExport()
	{
		return view('importExport');
	}

	/**
     * File Export Code
     *
     * @var array
     */
	public function downloadExcel(Request $request, $type)
	{
		$data = Item::get()->toArray();
		return Excel::create('Data Dosen', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}

	/**
     * Import file into database Code
     *
     * @var array
     */
	public function importExcel(Request $request)
	{

		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
							$insert[] = ['nama' => $value->nama, 'username' => $value->username, 'xxx' => $value->xxx, 'password' => $value->password, 'attribute' => $value->attribute = "Cleartext-Password", 'op' => $value->op = ":="];
						}
					}
				}

				
				if(!empty($insert)){
					Item::insert($insert);
					return back()->with('success','Import Data Berhasil.');
				}

			}










			
		}
	

