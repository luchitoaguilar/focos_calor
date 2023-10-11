<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestDocumentacion extends FormRequest
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
        if (!$this->hasFile('archivo')) {
            return [
                'id' => 'exists:documentacion,id',
                'descripcion'   => 'required|max:255',
                'tipo'      => 'required',
                'fecha'        => 'required',
                'archivo'       => 'nullable',
            ];
        } else {
            return [
                'id' => 'exists:documentacion,id',
                'descripcion'   => 'required|max:255',
                'tipo'      => 'required',
                'fecha'        => 'required',
                'archivo'       => 'mimes:pdf,doc|max:5120',
            ];
        }
    }
}
