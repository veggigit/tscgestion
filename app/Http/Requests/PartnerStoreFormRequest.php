<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerStoreFormRequest extends FormRequest
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
        return [
            'rut' => 'required|unique:partners',
            'first_name' => 'required',
            'first_surname' => 'required',
            'second_surname' => 'required',
            'phone' => 'required',
            'personal_email' => 'required|email',
            'birthday' => 'required',
            'social_charges' => 'required|numeric',
            'civil_status_id' => 'numeric|min:1',
            'region_id' => 'numeric|min:1',
            'address' => 'required',
            'corporative_email' => 'required|email',
            'office_id' => 'numeric|min:1',
            'date_admission' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'rut.required' => 'Rut, requerido',
            'rut.unique' => 'Este rut ya está en los registros',
            'first_name.required' => 'Primer nombre, requerido',
            'first_surname.required' => 'Primer apellido, requerido',
            'second_surname.required' => 'Segundo apellido, requerido',
            'phone.required' => 'Fono, requerido',
            'personal_email.required' => 'Email personal, requerido',
            'personal_email.email' => 'Email personal, debe ser un correo válido',
            'birthday.required' => 'Fecha de nacimiento, requerido',
            'social_charges.required' => 'Cargas, requerido',
            'social_charges.numeric' => 'Cargas, debe ser un número',
            'civil_status_id.numeric' => 'Estado civil, formato no válido',
            'civil_status_id.min' => 'Estado civil, favor selecciona un estado civil',
            'region_id.numeric' => 'Region, formato, no válido',
            'region_id.min' => 'Region, favor selecciona una region',
            'address.required' => 'Domicilio, requerido',
            'corporative_email.required' => 'Email corporativo, requerido',
            'corporative_email.email' => 'Email corporativo, debe ser un correo válido',
            'office_id.numeric' => 'Oficina, formato no válido',
            'office_id.min' => 'Oficina, favor selecciona una oficina',
            'date_admission.required' => 'Fecha de ingreso, requerida'
        ];
    }
}
