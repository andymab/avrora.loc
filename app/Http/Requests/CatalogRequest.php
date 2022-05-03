<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatalogRequest extends FormRequest
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

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'id1c' =>'required|min:6|max:50|unique:catalogs',
                    'articul' =>'required|max:11|unique:catalogs',
                    'mgroup_id' =>'required|integer',
                    'metal' =>'required|integer',
                    'trymetal' =>'required|integer',
                    'descr' =>'required|max:255',
                    'name' => 'required|max:255',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [                    
                    'mgroup_id' =>'required|integer',
                    'metal' =>'required|integer',
                    'trymetal' =>'required|integer',
                    'descr' =>'required|max:255',
                    'name' => 'required|max:255',
                ];
            }
            default:break;
        }    
    }
}
