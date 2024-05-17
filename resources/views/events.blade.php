@extends('adminlte::page')

@vite(['resources/css/eventos_fullcalendar.css'])

@section('content_header')
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <h1 class="m-0 text-dark">Eventos</h1>
@stop

@section('content')
<section class="content">
<div class="container-fluid">
    <div class="row">

        <div class="col-md-3">
            <div class="sticky-top mb-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Eventos Arrastrables</h4>
                    </div>
                    <div class="card-body">

                        <div id="external-events">
                            <div class="external-event bg-success ui-draggable ui-draggable-handle"
                                style="position: relative;">Lunch</div>
                            <div class="external-event bg-warning ui-draggable ui-draggable-handle"
                                style="position: relative;">Go home</div>
                            <div class="external-event bg-info ui-draggable ui-draggable-handle"
                                style="position: relative;">Do homework</div>
                            <div class="external-event bg-primary ui-draggable ui-draggable-handle"
                                style="position: relative;">Work on UI design</div>
                            <div class="external-event bg-danger ui-draggable ui-draggable-handle"
                                style="position: relative;">Sleep tight</div>
                            <div class="checkbox">
                                <label for="drop-remove">
                                    <input type="checkbox" id="drop-remove">
                                    Eliminar despues de usar
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cumpleaños</h3>
                    </div>
                    <div class="card-body">
                        <div class="btn-group" style="width: 100%; margin-bottom: 10px;">

                            @php
                            $config = ['format' => 'DD/MM/YYYY'];
                        @endphp
                        <x-adminlte-input-date name="idLabel" :config="$config" placeholder="DD/MM/YYYY" label="Fecha Cumpleaños"
                            label-class="text-primary">
                            <x-slot name="appendSlot">
                                <x-adminlte-button theme="outline-primary" icon="fas fa-lg fa-birthday-cake" title="Set to Birthday" />
                            </x-slot>
                        </x-adminlte-input-date>

                        </div>

                        <div class="input-group">
                                <button id="add-new-event" type="button" class="btn btn-primary">Añadir</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- calendario --}}
        <div class="col-md-9">
            <div class="card">
                <div class="card-body p-0">
                    <div id="calendar"></div>
                </div>
            </div>

            <div id="modal-action" data-target="#exampleModalCenter" class="modal" tabindex="-1"></div>

        </div>
    </div>
</div>
</section>
@stop

@push('js')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script> {{-- Se recomienda quitar --}}
    <script src="{{ asset('vendor/fullcalendar/locales/es.js') }}"></script>
    <script src="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}"></script>
    <script src="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.css') }}"></script>
    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/locales/es.js'></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script>
        const modal = $('#modal-action')
        const csrfToken = $('meta[name=csrf_token]').attr('content')

        document.addEventListener('DOMContentLoaded', function() {
            const Draggable = FullCalendar.Draggable;
            const containerEl = document.getElementById('external-events');
            const checkbox = document.getElementById('drop-remove');

            new Draggable(containerEl, {
                itemSelector: '.external-event',
                eventData: function(eventEl) {
                    return {
                        title: eventEl.innerText
                    };
                }
            });

            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'America/Bogota',
                locale: 'es',
                themeSystem: 'bootstrap5',
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay,multiMonthYear'
                },
                slotMinTime: '07:30',
                events: `{{ route('events.list') }}`,
                editable: true,
                droppable: true,
                drop: function(info) {
                    if (checkbox.checked) {
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                },
                dateClick: function(info) {
                    // console.log(info);
                    // $('#modal-action').modal('show')
                    $.ajax({
                        url: `{{ route('events.create') }}`,
                        data: {
                            start_date: info.dateStr,
                            end_date: info.dateStr
                        },
                        success: function(res) {
                            // console.log(res);
                            modal.html(res).modal('show')
                            // modal.html(res).modal('show').on('shown.bs.modal', function() {

                            $('#datetimepicker5').datetimepicker({
                                todayHighlight: true,
                                format: 'YYYY-MM-DD',
                                useCurrent: false,
                            });
                            $('#datetimepicker6').datetimepicker({
                                todayHighlight: true,
                                format: 'YYYY-MM-DD',
                                useCurrent: false
                            });
                            const startDate = $('#start_date').val();
                            const endDate = $('#end_date').val();
                            $('#datetimepicker5').datetimepicker('date', startDate);
                            $('#datetimepicker6').datetimepicker('date', endDate);

                            $('#form-action').on('submit', function(e) {
                                e.preventDefault()
                                const form = this
                                const formData = new FormData(form)
                                // console.log(this);
                                $.ajax({
                                    url: form.action,
                                    method: form.method,
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(res) {
                                        // console.log(res);
                                        modal.modal('hide')
                                        calendar.refetchEvents()
                                    },
                                    error: function(res) {}
                                })
                            })
                        }
                    })
                },
                eventClick: function({
                    event
                }) {
                    // console.log(info);
                    $.ajax({
                        url: `{{ url('events') }}/${event.id}/edit`,
                        success: function(res) {
                            modal.html(res).modal('show')

                            $('#datetimepicker5').datetimepicker({
                                todayHighlight: true,
                                format: 'YYYY-MM-DD',
                                useCurrent: false
                            });
                            $('#datetimepicker6').datetimepicker({
                                todayHighlight: true,
                                format: 'YYYY-MM-DD',
                                useCurrent: false
                            });

                            $('#form-action').on('submit', function(e) {
                                e.preventDefault()
                                const form = this
                                const formData = new FormData(form)
                                $.ajax({
                                    url: form.action,
                                    method: form.method,
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(res) {
                                        modal.modal('hide')
                                        calendar.refetchEvents()
                                    }
                                })
                            })
                        }
                    })
                },
                eventDrop: function(info) {
                    // console.log(info);
                    const event = info.event

                    const newEndDate = moment(event.end).format('YYYY-MM-DD');
                    $.ajax({
                        url: `{{ url('events') }}/${event.id}`,
                        method: 'PUT',
                        data: {
                            id: event.id,
                            start_date: event.startStr,
                            // end_date: event.end.toISOString().substring(0, 10),
                            end_date: newEndDate,
                            title: event.title,
                            category: event.extendedProps.category
                        },
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            accept: 'application/json'
                        },
                        success: function(res) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave',
                                        Swal
                                        .resumeTimer)
                                }
                            })
                            Toast.fire({
                                icon: 'success',
                                title: 'Cambios guardados.',
                            })
                        },
                        error: function(res) {
                            const message = res.responseJSON.message
                            info.revert()
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave',
                                        Swal
                                        .resumeTimer)
                                }
                            })
                            Toast.fire({
                                icon: 'error',
                                title: message ?? 'Something wrong',
                            })
                        }
                    })
                },
                eventResize: function(info) {
                    const {
                        event
                    } = info;
                    const newEndDate = moment(event.end).format('YYYY-MM-DD');

                    console.log(newEndDate);

                    $.ajax({
                        url: `{{ url('events') }}/${event.id}`,
                        method: 'put',
                        data: {
                            id: event.id,
                            start_date: event.startStr,
                            // start_date: adjustedStartDate.format('YYYY-MM-DD'), ANTES
                            //end_date: event.endStr, //CREOO QUE ESTA
                            end_date: newEndDate,
                            title: event.title,
                            category: event.extendedProps.category
                        },
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            accept: 'application/json'
                        },
                        success: function(res) {

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave',
                                        Swal
                                        .resumeTimer)
                                }
                            })
                            Toast.fire({
                                icon: 'success',
                                title: 'Cambios guardados.',
                            })
                        },
                        error: function(res) {
                            const message = res.responseJSON.message
                            info.revert()
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave',
                                        Swal
                                        .resumeTimer)
                                }
                            })
                            Toast.fire({
                                icon: 'error',
                                title: message ?? 'Something wrong',
                            })
                        }
                    })
                }
            });
            calendar.render();
        });
    </script>
@endpush
