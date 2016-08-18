<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Models\Bulletin as BulletinModel;

/**
 * Class Bulletin
 *
 * @package App\Http\Requestss
 */
class Bulletin extends Request
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
            'bulletin-name' => 'required|max:120',
            'bulletin-start_at' => 'required|max:120',
            'bulletin-subject' => 'required|max:80',
            'bulletin-body' => 'required|max:80',
        ];
    }

    /**
     * Fill a Bulletin model from request values
     *
     * @param BulletinModel $model
     *
     * @return BulletinModel
     */
    public function fill(BulletinModel $model)
    {
        $request_values = $this->all();

        foreach ($model->getFillable() as $property) {
            $key = sprintf('bulletin-%s', $property);
            if (isset($request_values[$key])) {
                $model->$property = $request_values[$key];
            }
        }

        return $model;
    }
}
