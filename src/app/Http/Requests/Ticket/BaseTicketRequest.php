<?php

namespace App\Http\Requests\Ticket;

use App\Http\Requests\FormRequest;
use App\Models\Ticket;
use Carbon\Carbon;

/**
 * Class BaseTicketRequest
 */
abstract class BaseTicketRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ticket_name' => 'required|string|max:100',
            'ticket_type' => 'required|integer',
            'status'      => 'nullable|integer',
            'timer'       => 'required|date|after:tomorrow',// . Carbon::now()->format('Y-m-d'),
            'description' => 'nullable|string',
            'user_id'     => 'nullable|integer',
            'changed_by'  => 'nullable|integer',
        ];
    }

    /**
     * Get all of the input and files for the request.
     *
     * @param array|mixed $keys Keys
     *
     * @return array
     */
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['timer'] = implode(' ', $data['timer']);

//        $type = $this->get('status');
//        switch ($status) {
//            case Ticket::STATUS_NEW:
//                $data['timer'] = null; // example htu
//                break;
//        }

        return $data;
    }

    /**
     * Get custom error messages
     *
     * @return array
     */
//    public function messages(): array
//    {
//        $messages = parent::messages();
//
//        $messages['status'] = __('Set status'); // example htu
//
//        return $messages;
//    }
}
