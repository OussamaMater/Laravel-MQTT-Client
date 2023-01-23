<?php

namespace App\Http\Livewire;

use App\Models\Connection;
use Livewire\Component;
use Illuminate\Support\Str;

class Settings extends Component
{
    const MAX_CONNECTIONS = 5;

    protected $listeners = [
        'deleteConfirmed'     => 'deleteConnection',
        'connectionSucceeded' => 'updateTested'
    ];

    public $clientId;
    public $name;
    public $host;
    public $port;
    public $username;
    public $password;
    public $left;
    public $tested = false;
    public $isEditing = false;

    protected $rules = [
        'clientId' => ['required'],
        'host'     => ['required'],
        'port'     => ['required'],
        'name'     => ['required', 'unique:connections'],
        'username' => ['nullable', 'string'],
        'password' => ['nullable', 'string']
    ];

    public function calculateLeft()
    {
        $this->left = self::MAX_CONNECTIONS - auth()->user()->connections->count();
    }

    public function mount()
    {
        $this->generateClientId();
        $this->calculateLeft();
    }

    public function generateClientId()
    {
        $this->clientId = "clientId_" . Str::random(20);
    }

    private function resetState()
    {
        $this->reset();
        $this->calculateLeft();
        $this->generateClientId();
    }

    public function saveConnection()
    {
        if (config('mqtt.max_connections') <= self::MAX_CONNECTIONS) {
            $connection = auth()->user()->connections()->updateOrCreate(
                [
                    "client_id" => $this->clientId,
                ],
                [
                    "name"      => $this->name,
                    "host"      => $this->host,
                    "port"      => $this->port,
                    "username"  => $this->username,
                    "password"  => $this->password
                ]
            );

            if ($connection->wasChanged()) {
                $this->dispatchBrowserEvent('connection-updated', [
                    'msg' => 'Connection Updated!'
                ]);
            }

            return $this->resetConnectionForm();
        }
    }

    public function setConnectionForm($id)
    {
        $connection = Connection::findOrFail($id);

        $this->clientId = $connection->client_id;
        $this->name     = $connection->name;
        $this->host     = $connection->host;
        $this->port     = $connection->port;
        $this->username = $connection->username;
        $this->password = $connection->password;

        return $this->isEditing = true;
    }

    public function resetConnectionForm()
    {
        $this->resetState();
        return $this->isEditing = false;
    }

    public function confirmDelete($id)
    {
        return $this->dispatchBrowserEvent('confirm-delete', ['id' => $id]);
    }

    public function deleteConnection($id)
    {
        Connection::findOrFail($id)->delete();

        return $this->calculateLeft();
    }

    public function testConnection()
    {
        $this->validate();
        $this->resetErrorBag();

        return $this->dispatchBrowserEvent('attempt-connect', [
            'host'     => $this->host,
            'port'     => $this->port,
            'clientId' => $this->clientId,
            'username' => $this->username ?? "",
            'password' => $this->password ?? ""
        ]);
    }

    public function updateTested()
    {
        return $this->tested = true;
    }

    public function render()
    {
        return view('livewire.settings')
            ->layout('layouts.auth');
    }
}
