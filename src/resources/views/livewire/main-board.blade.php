<div class="row mt-3">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <div class="col-12 col-xl-4 mb-3">
        <div class="card border-0 shadow">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                <h2 class="fs-5 fw-bold mb-0">
                    Subscriptions
                    <span @class([
                        'badge',
                        'bg-danger' => !$connected,
                        'bg-success' => $connected,
                    ])>
                        {{ $connected ? 'Connected' : 'Not connected' }}
                    </span>
                </h2>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <label>
                        Topic
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" @class(['form-control', 'is-invalid' => $errors->has('topic')]) placeholder="testtopic2"
                        wire:model.defer="topic" @disabled(!$hasAtLeastOneConnection || $connected)>
                    @error('topic')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="my-1 me-2" for="country">
                        Connection
                        <span class="text-danger">*</span>
                    </label>
                    <select @class(['form-select', 'is-invalid' => $errors->has('connection')]) wire:model.defer="connection" @disabled(!$hasAtLeastOneConnection || $connected)>
                        @forelse (auth()->user()->connections as $connection)
                            <option value="{{ $connection->id }}">{{ $connection->name }}</option>
                        @empty
                            <option selected>No Connections Found</option>
                        @endforelse
                    </select>
                    @error('connection')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="my-1 me-2" for="country">
                        Quality Of Service
                        <span class="text-danger">*</span>
                    </label>
                    <select @class(['form-select', 'is-invalid' => $errors->has('qos')]) wire:model.defer="qos" @disabled(!$hasAtLeastOneConnection || $connected)>
                        <option value="0">0 - At most once</option>
                        <option value="1">1 - At least once</option>
                        <option value="2">2 - Exactly once</option>
                    </select>
                    @error('qos')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-3">
                    @if ($hasAtLeastOneConnection)
                        <button class="btn btn-gray-800 mt-2 animate-up-2" wire:click="subscribeToTopic"
                            @disabled($connected)>
                            Subscribe
                        </button>
                    @else
                        <a href="{{ route('settings') }}" class="btn btn-danger mt-2 animate-up-2">
                            Create Connection
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-8 mb-3">
        <div class="task-wrapper border bg-white shadow border-0 rounded">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between bg-white">
                <h2 class="fs-5 fw-bold mb-0">
                    Updates
                    @if ($currentTopic && $currentTopic->payloads?->count() > 0)
                        <span class="badge bg-success">
                            {{ $currentTopic->payloads->count() }}
                        </span>
                    @endif
                </h2>
                @if ($currentTopic && $currentTopic->payloads?->count() > 0)
                    <div class="col text-end">
                        <a href="{{ route('logs') }}" class="btn btn-sm btn-primary">See all</a>
                    </div>
                @endif
            </div>
            @if ($currentTopic)
                @forelse ($currentTopic->payloads->take(5) as $payload)
                    <div class="card hover-state border-bottom rounded-0 py-3" wire:key="item-{{ $payload->id }}">
                        <div
                            class="card-body d-sm-flex align-items-center justify-content-center flex-wrap flex-lg-nowrap py-0">
                            <div class="col-12 col-lg-10 px-0 mb-4 mb-md-0">
                                <div class="mb-2">
                                    <h3 class="h5">Topic: {{ $payload->topic->topic }}</h3>
                                    <div class="d-block d-sm-flex">
                                        <div>
                                            <h4 class="h6 fw-normal text-gray d-flex align-items-center mb-3 mb-sm-0">
                                                <svg class="icon icon-xxs text-gray-500 me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                {{ $payload->created_at->diffForHumans() }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <span class="fw-normal text-gray">
                                        {{ $payload->data }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-2 text-end">
                                <svg role="button" wire:click="deletePayload({{ $payload->id }})"
                                    class="icon icon-md text-danger ms-1" fill="none" stroke="currentColor"
                                    stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                @empty
                    <div
                        class="card-body d-sm-flex align-items-center justify-content-center flex-wrap flex-lg-nowrap py-0">
                        <div class="col-12 p-3 mb-4 mb-md-0 text-center">
                            <div class="mb-2">
                                <h3 class="h3 text-muted">
                                    <em>No Updates Yet</em>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforelse
            @else
                <div
                    class="card-body d-sm-flex align-items-center justify-content-center flex-wrap flex-lg-nowrap py-0">
                    <div class="col-12 p-3 mb-4 mb-md-0 text-center">
                        <div class="mb-2">
                            <h3 class="h3 text-muted">
                                <em>No Updates Yet</em>
                            </h3>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        notyf = new Notyf({
            position: {
                x: 'right',
                y: 'top',
            }
        });

        window.addEventListener('sub-topic', event => {
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
                console.log('Client connected:' + event.detail.clientId);
                client.subscribe(event.detail.topic, {
                    qos: Number(event.detail.qos)
                });
                Livewire.emit('subbedToTopic');
            });

            client.on('message', (topic, message, packet) => {
                console.log('Received Message: ' + message.toString() + '\nOn topic: ' + topic)
                Livewire.emit('messageReceived', message.toString());
            })

            client.on('close', () => {
                notyf.error("Connection Failed!");
                client.end();
            });

            client.on('end', () => {
                console.log("connection ended");
            });
        });

        window.addEventListener('connection-error', event => {
            notyf.error("Could not connect!");
        });
    </script>
</div>
