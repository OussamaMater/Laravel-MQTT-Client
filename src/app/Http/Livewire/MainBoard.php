<?php

namespace App\Http\Livewire;

use App\Models\Connection;
use App\Models\Payload;
use Livewire\Component;

class MainBoard extends Component
{
    protected $listeners = [
        'subbedToTopic'    => 'updateStatus',
        'messageReceived'  => 'updatePayloads',
        'refreshComponent' => '$refresh'
    ];

    public $connection;
    public $topic;
    public $currentTopic;
    public $qos                     = 0;
    public $connected               = false;
    public $hasAtLeastOneConnection = false;

    protected $rules = [
        'connection' => ['required'],
        'topic'      => ['required'],
        'qos'        => ['required', 'numeric', 'between:0,2']
    ];

    public function mount()
    {
        $this->hasAtLeastOneConnection = auth()->user()->connections?->count() > 0 ? true : false;
        $this->connection = auth()->user()->connections?->first()->id ?? null;
    }

    public function subscribeToTopic()
    {
        $this->validate();

        $connection = Connection::findOrFail($this->connection);

        if ($connection) {
            $this->currentTopic = $connection->topics()->updateOrCreate(
                ['topic' => $this->topic],
                ['qos' => $this->qos]
            );

            return $this->dispatchBrowserEvent('sub-topic', [
                'host'     => $connection->host,
                'port'     => $connection->port,
                'username' => $connection->username ?? "",
                'password' => $connection->password ?? "",
                'qos'      => $connection->qos,
                'clientId' => $connection->client_id,
                'topic'    => $this->topic,
            ]);
        }

        return $this->dispatchBrowserEvent('connection-error');
    }

    public function updateStatus()
    {
        $this->connected = true;
    }

    public function updatePayloads($message)
    {
        $this->currentTopic->payloads()->create([
            'data' => $message
        ]);

        $this->emit('refreshComponent');
    }

    public function deletePayload($id)
    {
        Payload::findOrFail($id)->delete();

        $this->emit('refreshComponent');
    }

    public function render()
    {
        return view('livewire.main-board')
            ->layout('layouts.auth');
    }
}
