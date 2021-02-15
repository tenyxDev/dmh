<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Validation\Rule;
use App\Models\Ticket;

/**
 * Class TicketRequest
 */
class TicketRequest extends BaseTicketRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();

//        $rules += [
//            'type'             => ['required', Rule::in(array_column(config('presets.asset_types'), 'id'))],
//            'subtype'          => 'required_if:type,' . Ticket::ASSET_TYPE_FURNITURE . '|exists:subtypes,id',
//            'preview'          => 'required_without:uploaded_preview|image|max:2000',
//            'uploaded_preview' => 'nullable',
//            'action_type_id'   => 'nullable|integer',
//        ];

        return $rules;
    }
}
