<?php namespace App\Http\Requests\Broadcasts;

use App\Http\Requests\Request;

class CreateBroadcastRequest extends Request
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
			'contacts' => 'required',
			'message' => 'required_without_all:file_uploaded,video_uploaded,audio_uploaded',
			'file_uploaded' => 'required_without_all:message,video_uploaded,audio_uploaded',
			'video_uploaded' => 'required_without_all:file_uploaded,message,audio_uploaded',
			'audio_uploaded' => 'required_without_all:file_uploaded,message,video_uploaded',
			
		];
    }

}
