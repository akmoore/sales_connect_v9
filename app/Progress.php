<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $fillable = [
        'project_id', 'initialized', 'sent_to_csm', 'assigned_to_csp',
        'acknowledged_by_csp', 'scheduled_pre_pro_meeting', 'scheduled_shoot',
        'scheduled_edit', 'first_edit_done', 'script_approved', 'approved_by_client',
        'approved_by_lsm', 'sent_to_incoming'
    ];

    //Relationships
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
