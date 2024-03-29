<?php

namespace App\Http\Requests\Forum;

use Illuminate\Foundation\Http\FormRequest;

class ForumRequests extends FormRequest
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
			//
			'judul-thread' => 'required|max:112',
			'konten' => 'required',
			'g-recaptcha-response' => 'required|recaptcha',
		];
	}

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'judul-thread.required' => 'Judul thread tidak boleh kosong',
			'judul-thread.max' => 'Judul thread maksimal 112 karakter',
			'konten.required' => 'Konten thread tidak boleh kosong',
			'g-recaptcha-response.required'  => 'Google Captcha tidak boleh kosong',
		];
	}
}
