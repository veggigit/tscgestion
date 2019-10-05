<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterFormRequest extends FormRequest
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
            'sender_name' => 'required',
            'sender_email' => 'required',
            'to' => 'numeric|min:1|max:3',
            'subject' => 'required',
            'title' => 'required',
            'body' => 'required',
            'img' => 'required|image',
            'link' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'sender_name.required' => 'Remitente requerido',
            'sender_email.required' => 'Email remitente requerido',
            'to.numeric' => 'El valor del destinatario debe ser un número',
            'to.min' => 'Valor destinatario no válido, min 1',
            'to.max' => 'Valor destinatario no válido, max 3',
            'subject.required' => 'Asunto requerido',
            'title.required' => 'Titulo requerido',
            'body.required' => 'Mensaje requerido',
            'img.required' => 'Imagen requerida',
            'img.image' => 'Formato no válido. Sólo puedes subir imagenes'
        ];
    }
}
