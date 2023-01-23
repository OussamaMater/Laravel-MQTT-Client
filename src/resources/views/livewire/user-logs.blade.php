<div class="row mt-3 mb-3">
    <div class="col-12 cold-lg-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div
                        class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                            <svg class="icon icon-md" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418">
                                </path>
                            </svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="h5">Connections</h2>
                            <h3 class="fw-extrabold mb-1">{{ $connectionsCount }}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h5">Connections</h2>
                            <h3 class="fw-extrabold mb-1">{{ $connectionsCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 cold-lg-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div
                        class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                            <svg class="icon icon-md fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5"></path>
                            </svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="fw-extrabold h5">Topics</h2>
                            <h3 class="mb-1">{{ $topicsCount }}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h5">Topics</h2>
                            <h3 class="fw-extrabold mb-1">{{ $topicsCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 cold-lg-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row d-block d-xl-flex align-items-center">
                    <div
                        class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                        <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                            <svg class="icon icon-md" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z">
                                </path>
                            </svg>
                        </div>
                        <div class="d-sm-none">
                            <h2 class="fw-extrabold h5">Payloads</h2>
                            <h3 class="mb-1">{{ $payloadsCount }}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 px-xl-0">
                        <div class="d-none d-sm-block">
                            <h2 class="h5">Payloads</h2>
                            <h3 class="fw-extrabold mb-1">{{ $payloadsCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 mb-4">
        <div class="table-settings mb-4">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 d-md-flex">
                    <div class="input-group me-2 me-lg-3 fmxw-300">
                        <span class="input-group-text">
                            <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <input type="text" wire:model.debounce.500ms="payloadSearch" class="form-control"
                            placeholder="Search payloads">
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-body shadow border-0 table-wrapper table-responsive">
            <table class="table user-table table-hover align-items-center">
                <thead>
                    <tr>
                        <th class="border-bottom">Connection</th>
                        <th class="border-bottom">Payload</th>
                        <th class="border-bottom">Date</th>
                        <th class="border-bottom">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payloads as $payload)
                        <tr wire:key="item-{{ $payload->id }}">
                            <td @class([
                                'border-0' => $loop->last,
                            ])>
                                <span class="fw-normal">
                                    {{ $payload->topic->connection->name }}
                                </span>
                            </td @class([
                                'border-0' => $loop->last,
                            ])>
                            <td @class([
                                'border-0' => $loop->last,
                            ])>
                                <span class="fw-normal" role="button" data-bs-toggle="modal"
                                    data-bs-target="#modalNotification-{{ $payload->id }}">
                                    {{ Str::of($payload->data)->limit(20) }}
                                </span>
                            </td>
                            <td @class([
                                'border-0' => $loop->last,
                            ])>
                                <span class="fw-normal">{{ $payload->created_at->diffForHumans() }}</span>
                            </td>
                            <td @class([
                                'border-0' => $loop->last,
                            ])>
                                <svg role="button" class="icon icon-md text-danger ms-1" fill="none"
                                    wire:click="deletePayload({{ $payload->id }})" stroke="currentColor"
                                    stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                    </path>
                                </svg>
                            </td>
                        </tr>
                        <div class="modal fade" id="modalNotification-{{ $payload->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title" id="modalTitleNotify">
                                            Topic: {{ $payload->topic->topic }}
                                        </p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="py-3 text-center">
                                            <p>
                                                {{ $payload->data }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="5" class="border-0">
                                <h1 class="h2 text-muted text-center p-3">
                                    <em>No Payloads Yet</em>
                                </h1>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $payloads->links('livewire.paginations.custom-pagination') }}
        </div>
    </div>

    <div class="col-12 col-lg-6 mb-4">
        <div class="table-settings mb-4">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 d-md-flex">
                    <div class="input-group me-2 me-lg-3 fmxw-300">
                        <span class="input-group-text">
                            <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <input type="text" wire:model.debounce.500ms="topicSearch" class="form-control"
                            placeholder="Search topics">
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-body shadow border-0 table-wrapper table-responsive">
            <table class="table user-table table-hover align-items-center">
                <thead>
                    <tr>
                        <th class="border-bottom">Connection</th>
                        <th class="border-bottom">Topic</th>
                        <th class="border-bottom">Date</th>
                        <th class="border-bottom">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($topics as $topic)
                        <tr wire:key="item-{{ $topic->id }}" @class([
                            'table-primary' => $topic->id == $topicId,
                        ])>
                            <td @class([
                                'border-0' => $loop->last,
                            ])>
                                <span class="fw-normal">
                                    {{ $topic->connection->name }}
                                </span>
                            </td @class([
                                'border-0' => $loop->last,
                            ])>
                            <td @class([
                                'border-0' => $loop->last,
                            ])>
                                <span class="fw-bold" role="button" wire:click="setPayloads({{ $topic->id }})">
                                    {{ $topic->topic }}
                                </span>
                            </td>
                            <td @class([
                                'border-0' => $loop->last,
                            ])>
                                <span class="fw-normal">{{ $topic->created_at->diffForHumans() }}</span>
                            </td>
                            <td @class([
                                'border-0' => $loop->last,
                            ])>
                                <svg role="button" class="icon icon-md text-danger ms-1" fill="none"
                                    wire:click="deleteTopic({{ $topic->id }})" stroke="currentColor"
                                    stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                    </path>
                                </svg>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border-0">
                                <h1 class="h2 text-muted text-center p-3">
                                    <em>No Topics Yet</em>
                                </h1>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $topics->links('livewire.paginations.custom-pagination') }}
        </div>
    </div>

</div>
