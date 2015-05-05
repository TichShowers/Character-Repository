<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Auth\Guard;

class CreateImageRequest extends Request {

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->auth->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'artist' => 'required',
            'credit' => 'required',
            'image' => 'required|mimes:jpeg,gif,bmp,png'
        ];
    }

}
