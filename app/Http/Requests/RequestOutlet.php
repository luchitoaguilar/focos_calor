<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestOutlet extends FormRequest
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
        if (!$this->hasFile('foto') || !$this->hasFile('video') || !$this->hasFile('archivo')) {
            return [
                'id' => 'exists:outlets,id',
                'name'          => 'required|max:60',
                'latitude'      => 'nullable|required_with:longitude|max:15',
                'longitude'     => 'nullable|required_with:latitude|max:15',
                'descripcion'   => 'required|max:255',
                'division'      => 'required|max:2',
                'unidad'        => 'required|max:2',
                'nivel'         => 'required|max:15',
                'acciones'      => 'required|max:15',
                'rrhh'          => 'nullable',
                'rr_log'        => 'nullable',
                'apoyo'         => 'required',
                'efectivo'      => 'required',
                'fecha'         => 'required',
                'encargado'     => 'required',
                'video'         => 'nullable',
                'foto'          => 'nullable',
                'archivo'       => 'nullable',
            ];
        } else {
            return [
                'id' => 'exists:outlets,id',
                'name'          => 'required|max:60',
                'latitude'      => 'nullable|required_with:longitude|max:15',
                'longitude'     => 'nullable|required_with:latitude|max:15',
                'descripcion'   => 'required|max:255',
                'division'      => 'required|max:2',
                'unidad'        => 'required|max:2',
                'nivel'         => 'required|max:15',
                'acciones'      => 'required|max:15',
                'rrhh'          => 'nullable',
                'rr_log'        => 'nullable',
                'apoyo'         => 'required',
                'efectivo'      => 'required',
                'fecha'         => 'required',
                'encargado'     => 'required',
                'video'         => 'mimes:mp4,ogx,oga,ogv,ogg,webm,mpg4,mpg|max:10000',
                'foto'          => 'image|mimes:jpeg,png,bmp,jpg,gif|max:5120',
                'archivo'       => 'mimes:pdf,doc|max:5120',
            ];
        }
    }
}
