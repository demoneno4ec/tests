<?php
declare(strict_types=1);

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PhonesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'numbers.*' => 'bail|distinct|number',
        ];
    }

    public function messages(): array
    {
        return [
            'numbers.*.distinct' => ':attribute не уникален',
            'numbers.*.number'   => ':attribute не число',
        ];
    }

}
