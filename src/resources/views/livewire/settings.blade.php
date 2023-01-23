<div class="row mt-3">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <div class="col-12 col-md-8">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">
                {{ $isEditing ? 'Edit' : 'Create' }}
                a Connection</h2>
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <label for="address">
                            Name
                            <span class="text-danger">*</span>
                        </label>
                        <input @class(['form-control', 'is-invalid' => $errors->has('name')]) wire:model.defer="name" type="text"
                            placeholder="Localhost" @readonly($tested)>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <label for="address">
                            ClientID
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <input type="text" wire:model.defer="clientId" @class(['form-control', 'is-invalid' => $errors->has('clientId')]) readonly>
                            <span class="input-group-text" id="basic-addon3" wire:click="generateClientId"
                                role="button" @readonly($tested)>
                                <svg class="icon icon-xs text-gray-600" fill="none" stroke="currentColor"
                                    stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99">
                                    </path>
                                </svg>
                            </span>
                            @error('clientId')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 mb-3">
                    <div class="form-group">
                        <label for="address">
                            Host
                            <span class="text-danger">*</span>
                        </label>
                        <input @class(['form-control', 'is-invalid' => $errors->has('host')]) wire:model.defer="host" type="text"
                            placeholder="broker.hivemq.com" @readonly($tested)>
                        @error('host')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="form-group">
                        <label for="number">
                            Port
                            <span class="text-danger">*</span>
                        </label>
                        <input @class(['form-control', 'is-invalid' => $errors->has('port')]) wire:model.defer="port" type="number" placeholder="8000"
                            @readonly($tested)>
                        @error('port')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input @class(['form-control', 'is-invalid' => $errors->has('username')]) wire:model.defer="username" type="text"
                            placeholder="mqttclient2023" @readonly($tested)>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input @class(['form-control', 'is-invalid' => $errors->has('password')]) wire:model.defer="password" placeholder="●●●●●●●●"
                            type="password" @readonly($tested)>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-3">
                @if ($tested || $isEditing)
                    <button class="btn btn-primary mt-2 animate-up-2" wire:click="saveConnection">Save</button>
                @else
                    <button class="btn btn-secondary mt-2 animate-up-2" wire:click="testConnection">Test
                        <div wire:loading wire:target="testConnection" class="spinner-border spinner-border-sm"
                            role="status">
                        </div>
                    </button>
                @endif
                @if ($isEditing)
                    <button class="btn btn-danger mt-2 animate-up-2" wire:click="resetConnectionForm">Reset</button>
                @endif
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-header border-bottom">
                <h2 class="fs-5 fw-bold mb-0">Connections
                    <span @class([
                        'badge',
                        'bg-warning' => $left <= 2,
                        'bg-success' => $left > 2,
                    ])>
                        {{ $left }} left
                    </span>
                </h2>
            </div>
            <div class="card-body py-0">
                <ul class="list-group list-group-flush">
                    @forelse (auth()->user()->connections as $connection)
                        <li @class([
                            'list-group-item',
                            'bg-transparent',
                            'py-3',
                            'px-0',
                            'border-bottom' => !$loop->last,
                        ])>
                            <div class="row align-items-center animate-up-3">
                                <div class="col-auto">
                                    <h4 class="fs-6 text-dark mb-0" role="button"
                                        wire:click="setConnectionForm({{ $connection->id }})">
                                        {{ $connection->name }}
                                    </h4>
                                    <span class="small">
                                        ws://{{ $connection->host }}:{{ $connection->port }}/
                                    </span>
                                </div>
                                <div class="col text-end">
                                    <svg role="button" wire:click="confirmDelete({{ $connection->id }})"
                                        class="icon icon-md text-danger ms-1" fill="none" stroke="currentColor"
                                        stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li @class([
                            'list-group-item',
                            'bg-transparent',
                            'py-3',
                            'px-0',
                            'border-bottom',
                        ])>
                            <h1 class="text-muted text-center h3">
                                <em>No Connections Yet</em>
                            </h1>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    @push('settings')
        <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
        <script>
            notyf = new Notyf({
                position: {
                    x: 'right',
                    y: 'top',
                }
            });

            window.addEventListener('confirm-delete', event => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('deleteConfirmed', event.detail.id);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });

            window.addEventListener('attempt-connect', event => {
                const host = 'ws://' + event.detail.host + ':' + event.detail.port + '/mqtt '

                const options = {
                    clientId: event.detail.clientId,
                    username: event.detail.username,
                    password: event.detail.password,
                    protocolId: 'MQTT',
                    connectTimeout: 500,
                    protocolVersion: 4,
                    clean: true,
                    reconnectPeriod: 0
                }

                console.log('Connecting mqtt client')

                const client = mqtt.connect(host, options)

                client.stream.on('error', (err) => {
                    console.log('Connection failed' + err.type + " " + err.message);
                });

                client.on('connect', () => {
                    notyf.success("Connection Succeeded!");
                    Livewire.emit('connectionSucceeded');
                    console.log('Client connected:' + event.detail.clientId);
                });

                client.on('close', () => {
                    notyf.error("Connection Failed!");
                    client.end();
                });

                client.on('end', () => {
                    console.log("connection ended");
                });
            });

            window.addEventListener('connection-updated', event => {
                notyf.success(event.detail.msg);
            });
        </script>
    @endpush
</div>
