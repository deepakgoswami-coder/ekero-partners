@extends('coach.layouts.main')

@section('title', 'Coach Calendar')

<style>
    #calendar {
        background: white !important;
        padding: 20px;
        border-radius: 10px;
    }

    .fc-daygrid-day-frame {
        min-height: 100px !important;
    }

    .fc-col-header-cell-cushion,
    .fc-daygrid-day-number {
        color: #333 !important;
        text-decoration: none !important;
    }

    .fc-theme-bootstrap5 .fc-scrollgrid {
        border: 1px solid #ddd !important;
    }

    .custom-task-modal .modal-header {
        background: #6a4ee9 !important;
    }

    .custom-task-modal .modal-title {
        color: #ffffff !important;
        font-size: 1.1rem;
    }

    .task-info-item label {
        font-size: 0.75rem;
        color: #888 !important;
    }

    .comment-box {
        border-left: 4px solid #6a4ee9 !important;
        min-height: 60px;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

    .rounded-3 {
        border-radius: 12px !important;
    }

    .avatar-circle {
        color: #6a4ee9;
    }

    .image-preview {
        background: #f1f1f1;
        padding: 10px;
    }

    .task-modal-v2 {
        border-radius: 18px;
        overflow: hidden;
    }

    .task-modal-topbar {
        padding: 16px 18px;
        border-bottom: 1px solid #cccc;
    }

    .task-modal-badge {
        width: 42px;
        height: 42px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #0f00b1;
        background: rgb(108 96 243 / 33%);
        border: 1px solid rgba(255, 255, 255, .18);
    }

    .task-modal-left {
        background: #ffffff;
    }

    .task-modal-right,
    .bg-lights {
        background: #f8fafc;
        border-left: 1px solid rgba(0, 0, 0, .06);
    }

    .task-section-title {
        font-size: .75rem;
        letter-spacing: .10em;
        text-transform: uppercase;
        color: #6c757d;
        font-weight: 700;
        margin-bottom: .5rem;
    }

    .task-avatar {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #0d6efd;
        background: rgba(13, 110, 253, .10);
        border: 1px solid rgba(13, 110, 253, .20);
    }

    .task-comment {
        box-shadow: 0 .35rem 1rem rgba(0, 0, 0, .04);
    }

    .task-image-wrap {
        background: #eef2f7;
        padding: 10px;
    }

    .task-image {
        width: 100%;
        max-height: 320px;
        object-fit: contain;
        border-radius: 12px;
        background: #fff;
    }

    .task-empty-state {
        height: 100%;
        min-height: 260px;
        border: 1px dashed rgba(0, 0, 0, .18);
        border-radius: 16px;
        background: rgba(255, 255, 255, .7);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 18px;
        gap: 6px;
    }

    .task-empty-icon {
        width: 54px;
        height: 54px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(13, 110, 253, .08);
        color: #0d6efd;
        font-size: 22px;
    }
</style>

@section('content')
    <div class="app-content content ">

        <div class="page-titles mx-0 px-1 mb-1">
            <h3>Coach Calendar</h3>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-sm">
                        <div class="card-body p-0">
                            {{-- Calendar element --}}
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Task Modal --}}
        <div class="modal fade" id="taskModal" tabindex="-1" aria-hidden="true" style="z-index: 9999;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="d-flex justify-content-between align-items-center task-modal-topbar">
                        <!-- <h5 class="modal-title">Add Task for <span id="selected-date-text"></span></h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button> -->
                        <div class="d-flex align-items-center justify-content-between gap-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="task-modal-badge">
                                    <i class="bi bi-arrow-left-right"></i>
                                </span>
                                <div class="lh-sm">
                                    <h5 class="modal-title">Add Task for <span id="selected-date-text"></span></h5>
                                    <small class="text-black">View details</small>
                                </div>
                            </div>

                        </div>
                        <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form id="taskForm" method="POST" action="{{ route('coach.calendar.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="date" id="input-date">

                            <div class="mb-3">
                                <label class="form-label fw-bold">Select Leader</label>
                                <select name="leader_id" class="form-control border-primary" required>
                                    <option value="">-- Choose Leader --</option>
                                    @isset($leaders)
                                        @foreach($leaders as $leader)
                                            <option value="{{ $leader->id }}">{{ $leader->name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Comment</label>
                                <textarea name="comment" class="form-control border-primary" rows="3" required
                                    placeholder="Type task details..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Attachment (Optional)</label>
                                <input type="file" name="image" class="form-control border-primary" accept="image/*">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="viewTaskModal" tabindex="-1" aria-hidden="true" style="z-index: 9999;">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow-lg task-modal-v2">
                    <div class="task-modal-topbar">
                        <div class="d-flex align-items-center justify-content-between gap-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="task-modal-badge">
                                    <i class="bi bi-arrow-left-right"></i>
                                </span>
                                <div class="lh-sm">
                                    <h5 class="mb-0 text-black fw-semibold">Task Information</h5>
                                    <small class="text-black">View details</small>
                                </div>
                            </div>

                            <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                    </div>

                    <div class="modal-body p-0">
                        <div class="row g-0">
                            <div class="col-12 col-lg-7 p-3 py-2 px-sm-4 task-modal-left">
                                <div class="task-section">
                                    <div class="task-section-title">Leader</div>

                                    <div class="d-flex align-items-center gap-2 p-1 rounded-4 border bg-lights">
                                        <div class="task-avatar">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div id="view-leader-name" class="fw-semibold text-dark text-break">Member 3
                                            </div>
                                            <div class="small text-muted">Assigned by team lead</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="task-section mt-3">
                                    <div class="task-section-title">Comment</div>

                                    <div class="d-flex align-items-center gap-2 p-1 rounded-4 border bg-lights">
                                        <p id="view-comment" class="mb-0 text-dark text-break" style="line-height: 1.75;">
                                        </p>
                                    </div>
                                </div>
                                <!-- Footer -->
                                <div class="modal-footer border-0 pt-0 pb-0 mt-1 px-0 justify-content-start">
                                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>

                            <div class="col-12 col-lg-5 p-3 p-sm-4 task-modal-right">
                                <div id="view-image-container" class="d-none">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="task-section-title mb-0">Attachment</div>
                                        <span class="badge rounded-pill text-bg-light border">Preview</span>
                                    </div>

                                    <div class="rounded-4 border overflow-hidden bg-body">
                                        <div class="task-image-wrap">
                                            <img id="view-image" src="" class="img-fluid task-image"
                                                alt="Attachment preview">
                                        </div>
                                    </div>

                                    <div class="small text-muted mt-2">
                                        Tip: Click and hold to zoom (if enabled in browser).
                                    </div>
                                </div>

                                <div id="no-attachment-ui" class="task-empty-state">
                                    <div class="task-empty-icon">
                                        <i class="far fa-image"></i>
                                    </div>
                                    <div class="fw-semibold text-dark">No attachment</div>
                                    <div class="small text-muted">This task doesn’t include a file.</div>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>

@endsection

@section('script')
    {{-- FullCalendar CSS & JS --}}
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

    <script>
        $(document).ready(function () {
            var calendarEl = document.getElementById('calendar');

            if (calendarEl) {
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek'
                    },
                    height: 'auto',
                    selectable: true,
                    events: @json($tasks),
                    dateClick: function (info) {
                        $('#selected-date-text').text(info.dateStr);
                        $('#input-date').val(info.dateStr);
                        var myModal = new bootstrap.Modal(document.getElementById('taskModal'));
                        myModal.show();
                    },

                    eventClick: function (info) {
                        $('#view-leader-name').text(info.event.title);
                        $('#view-comment').text(info.event.extendedProps.comment || 'No comment added');

                        const imageUrl = info.event.extendedProps.image;
                        const hasImage = !!(imageUrl && String(imageUrl).trim().length);

                        $('#view-image-container').toggleClass('d-none', !hasImage);
                        $('#no-attachment-ui').toggleClass('d-none', hasImage);
                        $('#view-image').attr('src', hasImage ? imageUrl : '');

                        // Open Modal
                        var viewModal = new bootstrap.Modal(document.getElementById('viewTaskModal'));
                        viewModal.show();
                    }

                });

                calendar.render();

               
                setTimeout(function () {
                    calendar.updateSize();
                }, 300);
            }
        });

        $('#taskForm').on('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                method: "POST",
                data: formData,
                processData: false, // Zaroori hai file ke liye
                contentType: false, // Zaroori hai file ke liye
                success: function (response) {
                    location.reload(); // Calendar update karne ke liye
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    alert("Error: " + Object.values(errors)[0]);
                }
            });
        });

    </script>
@endsection