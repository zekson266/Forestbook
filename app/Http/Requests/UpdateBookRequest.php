<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'goods' => ['required','array'],
            'goods.*.barcode'=>['nullable'],
            'goods.*.barcode2'=>['nullable'],
            'goods.*.barcode3'=>['nullable'],
            'goods.*.guid'=>['nullable'],
            'goods.*.name'=>['nullable'],
            'goods.*.qtty'=>['nullable'],
            'goods.*.p1'=>['nullable'],
            'goods.*.dopprop1'=>['nullable'],
            'goods.*.dopprop2'=>['nullable'],
            'goods.*.dopprop3'=>['nullable'],
            'goods.*.dopprop4'=>['nullable'],
            'goods.*.dopprop5'=>['nullable'],
        ];
    }
}
