<?php

namespace App\Http\Livewire;

use App\Models\Connection;
use App\Models\Payload;
use App\Models\Topic;
use Livewire\Component;
use Livewire\WithPagination;

class UserLogs extends Component
{
    use WithPagination;

    public $topicId;
    public $topicSearch   = '';
    public $payloadSearch = '';

    public function deletePayload($id)
    {
        return Payload::findOrFail($id)->delete();
    }

    public function deleteTopic($id)
    {
        return Topic::findOrFail($id)->delete();
    }

    public function setPayloads($id)
    {
        if ($this->topicId == $id) {
            return $this->reset('topicId');
        }

        return $this->topicId = $id;
    }

    public function render()
    {
        return view('livewire.user-logs', [
            'payloads' => Payload::query()
                ->where('data', 'like', '%' . $this->payloadSearch . '%')
                ->when(!is_null($this->topicId), function ($query) {
                    return $query->where('topic_id', $this->topicId);
                })
                ->latest()
                ->paginate(10),
            'topics'           => Topic::where('topic', 'like', '%' . $this->topicSearch . '%')->latest()->paginate(10),
            'payloadsCount'    => Payload::count(),
            'topicsCount'      => Topic::count(),
            'connectionsCount' => Connection::count()
        ])->layout('layouts.auth');
    }
}
