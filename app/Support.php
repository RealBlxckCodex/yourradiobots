<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = ['priority', 'support_category_id', 'title', 'description'];

    public function getSupportCategory()
    {
        return SupportCategory::all()->where('id', $this->support_category_id)->first();
    }

    public function getPriority()
    {
        switch ($this->priority) {
            case 'low':
                return 'Nedrig';
            case 'medium':
                return 'Mittel';
            case 'high':
                return 'Hoch';
        }
        return '';
    }

    public function getStatus()
    {
        switch ($this->state) {
            case 'open':
                return 'Offen';
            case 'support_answer':
                return 'Supportantwort';
            case 'closed':
                return 'Geschlossen';
        }
        return '';
    }
}
