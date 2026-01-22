@extends('coach.layouts.main')

@section('title', 'Leader Chat')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    /* UI Structure */
    .chat-shell { border: 1px solid rgba(0,0,0,.06); }
    .chat-topbar { background: #fff; }
    .chat-header { background: #dedbff; box-shadow: rgba(149, 157, 165, 0.2) 4px 20px 24px; }
    .chat-status-dot { width: 10px; height: 10px; border-radius: 999px; background: #22c55e; box-shadow: 0 0 0 4px rgba(34,197,94,.18); }
    .chat-bg { background: radial-gradient(circle at 10% 15%, rgba(106,78,233,.10) 0%, rgba(106,78,233,0) 35%), radial-gradient(circle at 85% 20%, rgba(13,110,253,.08) 0%, rgba(13,110,253,0) 40%), #f8f9fa; }
    .chat-avatar { width: 44px; height: 44px; border-radius: 14px; display:flex; align-items:center; justify-content:center; background: rgba(106,78,233,.10); border: 1px solid rgba(106,78,233,.18); color: #6a4ee9; }
    .chat-icon-btn { width: 42px; height: 42px; }
    .chat-input { border-radius: 999px; padding: 10px 14px; border-color: rgba(0,0,0,.12); }
    .chat-input:focus { border-color: rgba(106,78,233,.55); box-shadow: 0 0 0 .2rem rgba(106,78,233,.15); }

    /* Message Styling */
    .leader-item.active { background-color: #f0edff !important; border-left: 4px solid #7367f0; }
    .message { max-width: 75%; margin-bottom: 15px; padding: 8px 12px; border-radius: 12px; font-size: 0.95rem; position: relative; }
    .message-outgoing { align-self: flex-end; background: #dedbff; border: 1px solid #c5c1f5; color: #333; border-bottom-right-radius: 2px; }
    .message-incoming { align-self: flex-start; background: white; border: 1px solid #ddd; color: #333; border-bottom-left-radius: 2px; }
    
    /* Bold Utility */
    .fw-bold-custom { font-weight: 700 !important; }

    /* Media & Download Icon Styling */
    .media-container { position: relative; display: inline-block; margin-top: 5px; border-radius: 8px; overflow: hidden; }
    .media-msg { display: block; max-width: 250px; height: auto; border-radius: 8px; border: 1px solid rgba(0,0,0,0.05); }
    
    .download-icon-btn {
        position: absolute; top: 8px; right: 8px;
        background: rgba(255, 255, 255, 0.9);
        color: #7367f0; width: 30px; height: 30px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 50%; text-decoration: none;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2); transition: 0.3s; z-index: 5;
    }
    .download-icon-btn:hover { background: #7367f0; color: #fff; transform: scale(1.1); }

    /* Preview */
    #preview-wrapper .preview-item { position: relative; width: 80px; height: 80px; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; }
    #preview-wrapper img { width: 100%; height: 100%; object-fit: cover; }
    .remove-preview { position: absolute; top: 0; right: 0; background: red; color: white; border: none; font-size: 10px; cursor: pointer; }

    @media (max-width: 991.98px){ .chat-shell .chat-topbar{ position: sticky; top: 0; z-index: 5; } }
</style>

@section('content')
<div class="app-content content">
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <div class="chat-shell rounded-4 overflow-hidden bg-white shadow-sm">
                <div class="chat-topbar px-3 py-2 border-bottom d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-light border p-1 d-lg-none rounded-circle chat-icon-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#leadersOffcanvas">
                            <i class="bi bi-list"></i>
                        </button>
                        <div class="lh-sm">
                            <div class="fw-bold-custom">Chat</div>
                            <small class="text-muted">Leaders & messages</small>
                        </div>
                    </div>
                    <span class="badge rounded-pill text-bg-light border">Online</span>
                </div>

                <div class="row g-0">
                    <aside class="col-lg-3 d-none d-lg-block border-end chat-sidebar" style="height: 600px;">
                        <div class="p-2 border-bottom bg-white">
                            <div class="fw-bold-custom">Leaders</div>
                        </div>
                        <div class="leader-list-container" style="height: 540px; overflow-y:auto;">
                            <ul class="list-group list-group-flush" id="leader-list-desktop">
                                @forelse($leaders as $leader)
                                    <li class="list-group-item list-group-item-action leader-item p-2 border-bottom" data-id="{{ $leader->id }}" data-name="{{ $leader->name }}" style="cursor:pointer;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="chat-avatar">
                                                <span class="fw-bold-custom">{{ strtoupper(substr($leader->name, 0, 1)) }}</span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="fw-bold-custom text-black">{{ $leader->name }}</div>
                                                <small class="text-muted d-block">Tap to view messages</small>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="list-group-item text-center py-5 text-muted">No leaders assigned</li>
                                @endforelse
                            </ul>
                        </div>
                    </aside>

                    <main class="col-12 col-lg-9 d-flex flex-column" style="height: 600px;">
                        <div id="chat-header-info" class="chat-header px-3 py-2 border-bottom d-none">
                            <div class="d-flex align-items-center gap-2">
                                <div class="chat-status-dot"></div>
                                <div class="lh-sm">
                                    <div class="text-black fw-bold-custom" id="active-leader-name">Select a Leader</div>
                                    <small class="text-black">Active conversation</small>
                                </div>
                            </div>
                        </div>

                        <div id="chat-box" class="flex-grow-1 p-3 overflow-auto d-flex flex-column chat-bg">
                            <div class="text-center empty-chat mt-5">
                                <div class="chat-avatar mx-auto mb-3"><i class="fas fa-comments"></i></div>
                                <p class="text-secondary">Please select a leader to start chatting</p>
                            </div>
                        </div>

                        <div id="file-preview-container" class="px-3 py-2 bg-white border-top d-none">
                            <div id="preview-wrapper" class="d-flex flex-wrap gap-2"></div>
                        </div>

                        <div id="chat-footer-area" class="p-2 bg-white border-top d-none">
                            <form id="chat-form" class="d-flex align-items-center gap-2 mb-0" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="leader_id" id="active-leader-id">
                                <input type="file" id="file-input" name="files[]" multiple class="d-none" accept="image/*,video/*,audio/*">
                                
                                <button type="button" class="btn btn-light border rounded-circle chat-icon-btn p-1" onclick="$('#file-input').click()">
                                    <i class="fas fa-paperclip"></i>
                                </button>

                                <input type="text" name="message" id="message" class="form-control chat-input" placeholder="Type your message..." autocomplete="off">

                                <button type="submit" id="send-btn" class="btn btn-primary rounded-pill px-4">
                                    Send <i class="fas fa-paper-plane ms-1"></i>
                                </button>
                            </form>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="leadersOffcanvas">
    <div class="offcanvas-header border-bottom">
        <h6 class="fw-bold-custom mb-0">Leaders</h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-0">
        <ul class="list-group list-group-flush" id="leader-list-mobile">
            @foreach($leaders as $leader)
                <li class="list-group-item leader-item" data-id="{{ $leader->id }}" data-name="{{ $leader->name }}">
                    {{ $leader->name }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    let selectedFiles = [];

    // Leader Selection
    $(document).on('click', '.leader-item', function() {
        const leaderId = $(this).data('id');
        const leaderName = $(this).data('name');
        $('.leader-item').removeClass('active');
        $(this).addClass('active');
        $('#chat-header-info, #chat-footer-area').removeClass('d-none');
        $('#active-leader-name').text(leaderName);
        $('#active-leader-id').val(leaderId);
        loadMessages(leaderId);
        
        // Hide offcanvas on mobile
        if($("#leadersOffcanvas").hasClass('show')) {
            bootstrap.Offcanvas.getInstance(document.getElementById('leadersOffcanvas')).hide();
        }
    });

    function loadMessages(leaderId) {
        $('#chat-box').html('<div class="text-center mt-5"><div class="spinner-border text-primary"></div></div>');
        $.ajax({
            url: "{{ route('coach.chat.leaderList') }}",
            type: 'GET',
            data: { leader_id: leaderId },
            success: function(response) {
                $('#chat-box').empty();
                if(response.messages && response.messages.length > 0) {
                    response.messages.forEach(msg => appendMessage(msg));
                } else {
                    $('#chat-box').html('<div class="text-center text-muted mt-5">No messages yet.</div>');
                }
                scrollChatToBottom();
            }
        });
    }

    function appendMessage(msg) {
        let isMe = (msg.sender_id == "{{ Auth::id() }}");
        let typeClass = isMe ? 'message-outgoing' : 'message-incoming';
        let chatText = msg.chat ? `<div class="mb-1">${msg.chat}</div>` : '';
        let fileHtml = msg.file ? renderFile(msg.file, msg.file_type) : '';

        $('#chat-box').append(`
            <div class="message ${typeClass}">
                ${chatText}
                ${fileHtml}
            </div>
        `);
        scrollChatToBottom();
    }

    function renderFile(path, type) {
        let url = `{{ asset('storage') }}/${path}`;
        let fileName = path.split('/').pop();
        let html = `<div class="media-container">`;

        if(type === 'image') {
            html += `<img src="${url}" class="media-msg">`;
            html += `<a href="${url}" download="${fileName}" class="download-icon-btn"><i class="fas fa-download"></i></a>`;
        } else if(type === 'video') {
            html += `<video controls class="media-msg"><source src="${url}"></video>`;
            html += `<a href="${url}" download="${fileName}" class="download-icon-btn"><i class="fas fa-download"></i></a>`;
        } else {
            html += `<a href="${url}" target="_blank" class="btn btn-sm btn-light border">View File</a>`;
        }

        html += `</div>`;
        return html;
    }

    // File Preview Handling
    $('#file-input').on('change', function(e) {
        const files = Array.from(e.target.files);
        files.forEach(file => {
            selectedFiles.push(file);
            const reader = new FileReader();
            reader.onload = function(f) {
                let html = `<div class="preview-item" data-name="${file.name}">
                                <button type="button" class="remove-preview">×</button>
                                ${file.type.startsWith('image/') ? `<img src="${f.target.result}">` : `<div class="p-2 small">Media</div>`}
                            </div>`;
                $('#preview-wrapper').append(html);
            }
            reader.readAsDataURL(file);
        });
        $('#file-preview-container').removeClass('d-none');
    });

    $(document).on('click', '.remove-preview', function() {
        const name = $(this).parent().data('name');
        selectedFiles = selectedFiles.filter(f => f.name !== name);
        $(this).parent().remove();
        if(selectedFiles.length === 0) $('#file-preview-container').addClass('d-none');
    });

    // Send Logic
    $('#chat-form').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        selectedFiles.forEach((file, i) => formData.append('files['+i+']', file));

        if(!$('#message').val().trim() && selectedFiles.length === 0) return;

        $('#send-btn').prop('disabled', true);
        $.ajax({
            url: "{{ route('coach.send.message') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function() {
                loadMessages($('#active-leader-id').val());
                $('#message').val('');
                selectedFiles = [];
                $('#preview-wrapper').empty();
                $('#file-preview-container').addClass('d-none');
                $('#send-btn').prop('disabled', false);
            }
        });
    });

    function scrollChatToBottom() {
        const cb = $('#chat-box');
        if(cb[0]) cb.scrollTop(cb[0].scrollHeight);
    }
});
</script>
@endsection